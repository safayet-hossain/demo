<template>
  <div>
    <h1>{{ profilename }}'s Profile page</h1>
    <h1>Welcome to{{ profilename }}'s worlds</h1>
  </div>
</template>

<script>
import { useRoute } from "vue-router";
export default {
  name: "profile",
  data() {
    return {
      profilename: "",
    };
  },

  mounted() {
    const route = useRoute();
    console.log(route.params.name);
    this.profilename = route.params.name;
  },
};
</script>
