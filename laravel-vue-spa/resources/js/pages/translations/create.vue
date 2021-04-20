<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="create"  @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('Created')" />
      <!-- Title -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Title') }}</label>
        <div class="col-md-7">
          <input v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }" class="form-control" type="text" placeholder="Title" name="title">
          <has-error :form="form" field="title"  />
        </div>
      </div>
       <!-- Status -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Status') }}</label>
        <div class="col-md-7">
       <select name="status" v-model="form.status" :class="{ 'is-invalid': form.errors.has('status') }" class="form-control">
         <option value="">Choose status</option>
         <option value="1">Open</option>
         <option value="2">Inprogress</option>
         <option value="3">Done</option>
       </select>
        </div>
      </div>
       <!-- Type -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Type') }}</label>
        <div class="col-md-7">
       <select name="type" v-model="form.type" :class="{ 'is-invalid': form.errors.has('type') }" class="form-control">
         <option value="">Choose type</option>
         <option value="1">Normal</option>
         <option value="2">Avarage</option>
         <option value="3">Secret</option>
       </select>
        </div>
      </div>
       <!-- Assignee -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Assignee ') }}</label>
        <div class="col-md-7">
          <select name="user_id" v-model="form.assignee_id" :class="{ 'is-invalid': form.errors.has('assignee_id') }" class="form-control">
          <option value="">Choose Assignee</option>
          <option v-for="(user) in users" :key="user.id" :value="user.id">{{ user.email }}</option>
          </select>
        </div>
      </div>
       <!-- Start date -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Start Date') }}</label>
        <div class="col-md-7">
          <input v-model="form.start_date" :class="{ 'is-invalid': form.errors.has('start_date') }" class="form-control" type="date" name="start_date">
          <has-error :form="form" field="start_date" />
        </div>
      </div>
       <!-- End date -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('End Date') }}</label>
        <div class="col-md-7">
          <input v-model="form.end_date" :class="{ 'is-invalid': form.errors.has('end_date') }" class="form-control" type="date" name="end_date">
          <has-error :form="form" field="end_date" />
        </div>
      </div>
       <!-- Content Default -->
        <div class="form-group row">
          <label class="col-md-3 col-form-label text-md-right"> <strong>{{ $t('Content Default') }}</strong></label>
          <div>
            <quill-editor ref="myQuillEditor" v-model="form.content_default" :options="editorOption" :class="{ 'is-invalid': form.errors.has('content_default') }"  type="text" name="content_default"/>
            <has-error :form="form" field="content_default" />
          </div>
        </div>
       <!-- Content Translated -->
       <div class="form-group row">
          <label class="col-md-3 col-form-label text-md-right"><strong>{{ $t('Content Translated') }}</strong></label>
          <div>
            <quill-editor ref="myQuillEditor" v-model="form.content_translated" :options="editorOption" :class="{ 'is-invalid': form.errors.has('content_translated') }"  type="text" name="content_translated"/>
            <has-error :form="form" field="content_translated" />
          </div>
        </div>

      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">
            {{ $t('create') }}
          </v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
import Form from 'vform'
import axios from "axios"
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import { quillEditor } from 'vue-quill-editor'
export default {
  components: {
    quillEditor
  },

  scrollToTop: false,
  metaInfo () {
    return { title: this.$t('Create User') }
  },
  data: () => ({
    form: new Form({
      title             : '',
      assignee_id       : '',
      status            : '',
      type              : '',
      start_date        : '',
      end_date          : '',
      content_default   : '',
      content_translated: '',
    }),
    users: {},
    editorOption: {},
  }),
   created() {
    this.getUser();
  },
  methods: {
      getUser() {
        axios.get("/api/users/list").then((response) => {
          this.users = response.data.data;
        });
      },
      async create () {
        const { data } = await this.form.patch('/api/translations/create/');
        this.scrollToTop();
      },
      scrollToTop() {
              window.scrollTo(0,0);
          }
  },

}
</script>
