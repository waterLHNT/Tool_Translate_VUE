<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="create"  @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('Created')" />
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
      <!-- Password -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
        <div class="col-md-7">
          <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
          <has-error :form="form" field="password" />
        </div>
      </div>
       <!-- Role -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('role') }}</label>
        <div class="col-md-7">
       <select name="role" v-model="form.role" :class="{ 'is-invalid': form.errors.has('role') }" class="form-control">
         <option value="">Choose role</option>
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
export default {
  scrollToTop: false,
  metaInfo () {
    return { title: this.$t('Create User') }
  },
  data: () => ({
    form: new Form({
      fullname: '',
      email   : '',
      password: '',
      role    : '',
    }),
    user  : {},
  }),
  methods: {
    async create () {
      const { data } = await this.form.patch('/api/users/create/')
      console.log(data)
    }
  },
}
</script>
