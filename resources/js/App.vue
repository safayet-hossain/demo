<template>
  <router-link to="/home">home</router-link>
  <br />

  <router-link to="/profile">profile</router-link>

  <br />
  <router-link to="/profile/shehab">1st Profile</router-link>
  <br />
  <router-link to="/profile/mehedi">2nd Profile</router-link>
  <br />
  <!-- <login><slot>abc</slot></login> -->

  <login />
  <router-link to="/login">login </router-link>
  <Child />

  <table-list :data="example_object"></table-list>

  <router-view></router-view>
</template>
<script>
import router from "./route";
import {provide} from "vue";
// import list from "./components/List.vue";
import home from "./components/home.vue";
import Nsl from "./components/Nsl.vue";

import Child from "./components/Child.vue";
provide("msg", "hello world");
export default {
  name: "app",
  components: {router, home, Nsl, Child},
  data() {
    return {
      name: "Shehab",
      email: "shehab.shfayet@gmail.com",
      result: "All Subject",
    };
  },
  provide() {
    return {
      name: this.name,
      Email: this.email,
      result: this.result,
    };
  },
};
</script>
