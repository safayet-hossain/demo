<template>
  <router-link to="/hello">hello</router-link><br />

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
import list from "./components/List.vue";

export default {
  name: "app",
  components: { router, "table-list": list },
  data() {
    return {
      example_object: [
        {
          name: "shehab",
          id: "1",
          email: "shehab@gmail.com",
        },
        {
          name: "mehedi",
          id: "2",
          email: "mehedi@gmail.com",
        },
        {
          name: "rimi",
          id: "3",
          email: "rimi@gmail.com",
        },
        {
          name: "mouly",
          id: "4",
          email: "mouly@gmail.com",
        },
      ],
    };
  },
};
</script>
