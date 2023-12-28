<template>
  <div>
    <List :data="example_object">
      <template v-slot:result>
        <h2>result section :{{ result }}</h2>
        <h2>NAME :{{ name }}</h2>
        <h2>Email :{{ Email }}</h2>
      </template>
    </List>
    <h1>{{ count }}</h1>
    <h1>
      <button v-on:click="count = count + 1">+</button>
      <button v-on:click="count = count - 1">-</button>
    </h1>
    <input type="text" v-model="phone" />
  </div>
</template>
<script>
import List from "./List.vue";
export default {
  name: "home",
  components: {List},
  inject: ["name", "Email", "result"],
  data() {
    return {
      count: 0,
      phone: "",

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
  // watch: {30%+3day},
  watch: {
    phone(newval, oldvalue) {
      // console.log(newval);
      if (isNaN(newval)) {
        alert("type number only");
        this.mobile = oldvalue;
      }
    },
    count(val) {
      if (val > 5) {
        alert("stop");
      }
    },
  },
};
</script>
