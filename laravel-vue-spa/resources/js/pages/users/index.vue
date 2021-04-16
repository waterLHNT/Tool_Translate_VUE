<template>
  <div class="row">
    <div class="col-md-3">
      <card title="Dashboard" class="settings-card">
        <ul class="nav flex-column nav-pills">
          <li v-for="tab in tabs" :key="tab.name_route" class="nav-item">
            <router-link :to="{ name: tab.name_route }" class="nav-link">
              <fa :icon="tab.icon" fixed-width />
              {{ tab.title }}
            </router-link>
          </li>
        </ul>
      </card>
    </div>
   <div class="col-md-9">
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  computed: {
    user() {
      return this.$store.getters["auth/user"];
    },
    tabs() {
      return [
        {
          icon: "user",
          title: this.$t("Users"),
          name_route: "users.list",
        },
        {
          icon: "newspaper",
          title: this.$t("Create User"),
          name_route: "users.create",
        },
      ];
    },
  },

  data: () => ({
    appName: window.config.appName,
  }),
};
</script>
<style>
.settings-card .card-body {
  padding: 0;
}
</style>

