<template>
  <router-link to="/home">home</router-link><br />

  <router-link to="/profile">profile</router-link><br />
  <router-link to="/profile/shehab">1st Profile</router-link><br />
  <router-link to="/profile/mehedi">2nd Profile</router-link><br />

  <router-link to="/login">login</router-link>

  <!-- <list></list> -->
  <table-list :data="example_object"></table-list>

  <router-view></router-view>

  <!-- <router-view></router-view> -->
</template>
<script>
import router from "./route";
// import list from "./components/List.vue";
import home from "./components/home.vue";
// "table-list": list
export default {
  name: "app",
  components: { router, home },
  data() {
    return {};
  },
};
</script>
