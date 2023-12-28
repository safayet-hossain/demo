<template>
  <div>
    <h1>{{ profilename }}'s Profile page</h1>
    <h1>Welcome to{{ profilename }}'s worlds</h1>
    <h1>Injected Name:{{ name }}</h1>
    <strong>Injected email:{{ Email }}</strong>
  </div>
</template>

<script>
import {useRoute} from "vue-router";
export default {
  name: "profile",
  data() {
    return {
      profilename: "",
    };
  },
  inject: ["name", "Email"],

  mounted() {
    const route = useRoute();
    // console.log(route.params.name);
    this.profilename = route.params.name;
  },
};
</script>
