<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="">Navbar</a>
 
  <router-link to="/user">user</router-link><br>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
    </ul>
  </div>
</nav>

  <router-link to="/employee/create">Employee</router-link><br>
  <router-link to="/employee/list">Employee list</router-link><br>

  <!-- <router-link to="/user">user</router-link><br>
  <router-link to="/userlist" >UserList</router-link> -->
  
  <!-- <table-list :data="example_object"></table-list> -->

  <router-view></router-view>
</template>
<script>
import router from "./route";
import {provide} from "vue";
import list from "./components/List.vue";
import home from "./components/home.vue";
import Student from "./components/Student.vue";
import Child from "./components/Child.vue";
import student_list from "./components/student_list.vue";
import student_edit from "./components/student_edit.vue";
provide("msg", "hello world");
export default {
  name: "app",
  components: {router, home, Child, Student, list, student_list, student_edit},
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
