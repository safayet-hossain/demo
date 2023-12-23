<template>
  <div>
    <!-- <table-list :data="example_object"></table-list> -->
    <List :data="example_object" />
  </div>
</template>
<script>
import List from "./List.vue";
export default {
  name: "home",
  components: { List },
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
