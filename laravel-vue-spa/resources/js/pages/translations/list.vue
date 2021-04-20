<template>
  <card :title="$t('List Translations')">
    <div v-if="message != null" class="alert-success">{{ message }}</div>
    <div id="data">
      <table>
        <tr>
          <th>Id</th>
          <th>Assignee_id</th>
          <th>Created_by</th>
          <th>Updated_by</th>
          <th>Title</th>
          <th>Content_default</th>
          <th>Content_translated</th>
          <th>Status</th>
          <th>Type</th>
          <th>Start_date</th>
          <th>End_date</th>
          <th>Created_at</th>
          <th>Actions</th>

        </tr>
        <tr v-for="(translation, index) in translations" :key="translation.id">
          <td>{{ translation.id }}</td>
          <td>{{ translation.assignee_id }}</td>
          <td>{{ translation.created_by }}</td>
          <td>{{ translation.updated_by }}</td>
          <td>{{ translation.title }}</td>
          <td>{{ translation.content_default }}</td>
          <td>{{ translation.content_translated }}</td>
          <td>{{ translation.status }}</td>
          <td>{{ translation.type }}</td>
          <td>{{ translation.start_date }}</td>
          <td>{{ translation.end_date }}</td>
          <td>{{ translation.created_at }}</td>
          <td>
            <button @click="deleteTranslation(translation.id,index)" class="btn btn-danger">
              <fa icon="translation" />
              Delete
            </button>
            <button @click="updateTranslation(translation.id)" class="btn btn-info">
              <fa icon="translation" />
              Update
            </button>
          </td>
        </tr>
      </table>
    </div>
  </card>
</template>

<script>
import Form from "vform";
import axios from "axios";
export default {
  scrollToTop: false,
  data() {
    return {
      translations: {},
      message: null,
    };
  },
   //Call method getTranslation to get data list translations
  created() {
    this.getTranslation();
  },
  methods: {
    getTranslation() {
      axios.get("/api/translations/list").then((response) => {
        this.translations = response.data.data;
      });
    },
    deleteTranslation: function (id,index) {
       axios.get("/api/translations/delete/"+id).then((response) => {
       this.message = response.data.message + " " + id;
      });
      this.translations.splice(index, 1);
    },
    updateTranslation: function(id){
      this.$router.push({ name: 'translations.update', params:{id: id} });
    }
  },
  metaInfo() {
    return { title: this.$t("translations") };
  },
};
</script>
