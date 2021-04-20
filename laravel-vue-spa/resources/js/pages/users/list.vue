<template>
  <card :title="$t('List Users')">
    <div v-if="message != null" class="alert-success">{{ message }}</div>
    <div id="data">
      <table>
        <tr>
          <th>Id</th>
          <th>Fullname</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>

        <tr v-for="(user, index) in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.fullname }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.role }}</td>
          <td>
            <button @click="deleteUser(user.id,index)" class="btn btn-danger">
              <fa icon="user" />
              Delete
            </button>
            <button @click="updateUser(user.id)" class="btn btn-info">
              <fa icon="user" />
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
      users: {},
      message: null,
    };
  },
   //Call method getUser to get data list users
  created() {
    this.getUser();
  },
  methods: {
    getUser() {
      axios.get("/api/users/list").then((response) => {
        this.users = response.data.data;
      });
    },
    deleteUser: function (id,index) {
       axios.get("/api/users/delete/"+id).then((response) => {
       this.message = response.data.message + " " + id;
      });
      this.users.splice(index, 1);
    },
    updateUser: function(id){
      this.$router.push({ name: 'users.update', params:{id: id} });
    }
  },
  metaInfo() {
    return { title: this.$t("Users") };
  },
};
</script>
