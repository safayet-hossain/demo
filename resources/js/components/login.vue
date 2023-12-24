<template>
  <div>
    <h1>login page</h1>
    <h1>welcome to login page</h1>
    <br />
    <h1>Name: {{ name }}</h1>

    <h2>Email:{{ Email }}</h2>
    <!-- <Child /> -->
    <slot></slot>
  </div>
</template>

<script>
// import { provide } from "vue";

import Child from "./Child.vue";
export default {
  name: "login",
  //   component: Child,/
  inject: ["name", "Email"],
};
</script>
