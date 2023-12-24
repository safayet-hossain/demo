<template>
  <div>
    <h1>login page</h1>
    <h1>welcome to login page</h1>
    <br />
    {{ name }}
    <Child />
  </div>
</template>

<script>
// import { provide } from "vue";

import Child from "./Child.vue";
export default {
  name: "login",
  //   component: Child,/
  inject: ["name"],
};
</script>
