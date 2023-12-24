<template>
  <router-link to="/home">home</router-link>
  <br />

  <router-link to="/profile">profile</router-link>
  <br />
  <router-link to="/profile/shehab">1st Profile</router-link>
  <br />
  <router-link to="/profile/mehedi">2nd Profile</router-link>
  <br />
  <!-- <router-link to="./nsl">NSL</router-link>
  <br /> -->
  <!-- <login msg="hello child!!" /> -->
  <router-link to="/login" :msg="hello">login</router-link>
  <Child />
  <!-- <list></list> -->
  <table-list :data="example_object"></table-list>

  <router-view></router-view>

  <!-- <router-view></router-view> -->
</template>
<script>
import router from "./route";
import { provide } from "vue";
// import list from "./components/List.vue";
import home from "./components/home.vue";
import Nsl from "./components/Nsl.vue";

import Child from "./components/Child.vue";
provide("msg", "hello world");
export default {
  name: "app",
  components: { router, home, Nsl, Child },
  data() {
    return {
      name: "shehab",
    };
  },
  provide() {
    return {
     name: this.name,
    };
  },
};
</script>
