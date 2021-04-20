<template>
  <div>
    <div class="text-center">
      <div class="title mb-4">Welcome to admin</div>
      <div>
        <router-link :to="{ name: 'users.list' }" v-if="user.role == 1 || user.role == 2" class="btn btn-success">
          <fa icon="user" fixed-width />
          Manage Users
        </router-link>
        <router-link
          :to="{ name: 'translations.list' }"
          class="btn btn-success"
        >
          <fa icon="newspaper" fixed-width />
          Manage Translations
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  layout: "basic",

  metaInfo() {
    return { title: this.$t("home") };
  },

  data: () => ({
    title: window.config.appName,
  }),

  computed: {
    user() {
      return this.$store.getters["auth/user"];
    },
  },
};
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
