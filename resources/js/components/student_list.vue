<template>
  <div>
    <!-- {{ list }} -->
    <center>
      <h1>Student list</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>

            <th scope="col">Email</th>

            <th scope="col">Phone</th>

            <th scope="col">Birthday</th>
            <th scope="col">address</th>

            <th scope="col">Gender</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in list" :key="index">
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.email }}</td>
            <td>{{ item.phone }}</td>
            <td>{{ item.dob }}</td>
            <td>{{ item.address }}</td>
            <td>{{ item.gender }}</td>
            <td>
              <router-link :to="{path: '/student/' + item.id + '/edit'}" 
                >Edit</router-link
              >
              <button type="submit" @click="deleteStudent(item.id)" class="btn btn-primary btn-block mb-4">Delete</button>
            </td>
            <!-- <td><router-link to="">delete</router-link></td> -->
          </tr>
        </tbody>
      </table>
    </center>
  </div>
</template>
<script>
// import student from "./Student.vue";
import axios from "axios";
import student_edit from './student_edit.vue'
export default {
  name: "student_list",
  components:[student_edit],
  data() {
    return {
      list: [],
    };
  },
  mounted() {
    this.studentList();
  },

  methods: {
    studentList() {
      axios.get("laravel10-vue3/public/getdata").then((res) => {
        this.list = res.data;
        // console.log(this.list);
      });
    },
    // deleteStudent(updateid){
    //     console.log('ok',updateid);
    //   }
  },
};
</script>
