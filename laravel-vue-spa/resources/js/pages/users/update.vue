<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="update"  @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('Updated')" />
       <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('ID') }}</label>
        <div class="col-md-7">
          <input readonly v-model="form.id" :class="{ 'is-invalid': form.errors.has('id') }" class="form-control" type="text" name="id">
          <has-error :form="form" field="fullname" />
        </div>
      </div>
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
      id:'',
      fullname:'',
      email: '',
      role:'',
    }),
    user:{},
  }),
   created () {
    // Fill the form with user data.
      this.getUser();
  },
  methods: {
      getUser(){
        var id = this.$route.params.id;
         axios.get("/api/users/update/" + id).then((response) => {
        this.user = response.data.data;
        this.form.id = this.user.id;
        this.form.fullname = this.user.fullname;
        this.form.email = this.user.email;
      });
    },
    async update () {
      var id = this.$route.params.id;
      const { data } = await this.form.patch('/api/users/update/'+id)
      this.getUser();
    }
  },
  
}
</script>
