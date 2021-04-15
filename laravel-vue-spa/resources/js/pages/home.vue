<template>
  <div v-if="user.role == 4">
    <view-for-members />
  </div>
  <div v-else>
    <view-for-admin />
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import ViewForMembers from "~/components/ViewForMembers";
import ViewForAdmin from "~/components/ViewForAdmin";
export default {
  components: {
    ViewForMembers,
    ViewForAdmin,
  },
  middleware: "auth",

  computed: mapGetters({
    user: "auth/user",
  }),
  metaInfo() {
    return { title: this.$t("home") };
  },
};
</script>
