<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="update"  @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('Updated')" />
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input v-model="form.fullname" :class="{ 'is-invalid': form.errors.has('fullname') }" class="form-control" type="text" name="fullname">
          <has-error :form="form" field="fullname" />
        </div>
      </div>
      <!-- Email -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
        <div class="col-md-7">
          <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
          <has-error :form="form" field="email" />
        </div>
      </div>
       <!-- Role -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('role') }}</label>
        <div class="col-md-7">
       <select name="role" v-model="form.role" :class="{ 'is-invalid': form.errors.has('role') }" class="form-control">
         <option value="1">Master</option>
         <option value="2">Manager</option>
         <option value="3">Leader</option>
         <option value="4">Member</option>
       </select>
        </div>
      </div>
      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button :loading="form.busy" type="success">
            {{ $t('update') }}
          </v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
import Form from 'vform'
import axios from "axios"
export default {
  scrollToTop: false,
  metaInfo () {
    return { title: this.$t('Update User') }
  },
  data: () => ({
    form: new Form({
      fullname: '',
      email   : '',
      role    : '',
    }),
    user  : {},
    select: ''
  }),
   created () {
    // Fill the form with user data.
      this.getUser();
  },
  methods: {
      getUser(){
        var id = this.$route.params.id;
         axios.get("/api/users/update/" + id).then((response) => {
        this.user          = response.data.data;
        this.form.id       = this.user.id;
        this.form.fullname = this.user.fullname;
        this.form.email    = this.user.email;
        this.form.role     = this.user.role;
      });
    },
    async update () {
      var   id       = this.$route.params.id;
      const { data } = await this.form.patch('/api/users/update/'+id)
      this.getUser();
    }
  },
}
</script>
