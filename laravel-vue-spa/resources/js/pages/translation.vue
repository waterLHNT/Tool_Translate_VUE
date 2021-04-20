<template>
  <div class="row">
    <div class="col-6 div1">
      <label>{{
        $t("Content Default")
      }}</label>
      <div class="ql-editor form-control" v-html="translation.content_default"></div>
      <!-- <quill-editor
        ref="myQuillEditor"
        v-model="form.content_default"
        :options="editorOption"
        :class="{ 'is-invalid': form.errors.has('content_default') }"
        type="text"
        name="content_default"
      /> -->
    </div>
    <!-- LINE -->
    <div class="vl"></div>
    <!-- End -->
    <div class="col-6 div2">
      <label>{{
        $t("Content Translated")
      }}</label>

      <quill-editor
        ref="myQuillEditor"
        v-model="form.content_translated"
        :options="editorOption"
        :class="{ 'is-invalid': form.errors.has('content_translated') }"
        type="text"
        name="content_translated"
      />
    </div>
  </div>
</template>

<script>

import Form from "vform";
import axios from "axios";
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";
import { quillEditor } from "vue-quill-editor";
export default {
  components: {
    quillEditor,
  },
  data: () => ({
    form: new Form({
      content_default   : '',
      content_translated: '',
    }),
    translation : {},
    editorOption: {},
    auto_save_timeout: null,
  }),
  metaInfo() {
    return { title: this.$t("Translation") };
  },
  created () {
    // Fill the form with user data.
      this.getTranslation();
  },
  methods: {
      getTranslation(){
        // var id = this.$route.params.id;
        axios.get("/api/translations/window/update/3").then((response) => {
        this.translation             = response.data.data;
        // this.form.content_default    = this.translation.content_default;
        this.form.content_translated = this.translation.content_translated;
      });
    },
    async update () {
      var   id       = this.$route.params.id;
      const { data } = await this.form.patch('/api/users/update/'+id)
      this.getUser();
    },
    autoSave(){
      
    }
  },
};
</script>
<style>
.vl {
  border-left: 4px solid black;
  height: 100%;
  position: absolute;
  left: 50%;
  margin-left: -3px;
}
.div1 {
  float: left;
  left: 0;
}
.div2 {
  float: right;
  right: 0;
}
</style>


