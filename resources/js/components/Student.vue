<template>
  <body>
    <div>
      <h1>Student Form</h1>
      <form method="post" @submit.prevent="submitform" id="form">
        <div>
          <label for="name">Name:</label
          ><input
            v-model="student_form.name"
            type="text"
            name="name"
            id="name"
            placeholder="Enter  your name"
          />
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input
            name="email"
            v-model="student_form.email"
            type="email"
            class="form-control"
            id="email"
            placeholder="enter your email"
          />
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01" name="Address"
              >Address</label
            >
          </div>
          <select
            class="custom-select"
            id="Address"
            v-model="student_form.address"
            name="address"
          >
            <option value="">Choose.</option>
            <option value="Dhaka">Dhaka</option>
            <option value="chittagong">chittagong</option>
            <option value="shylet">shylet</option>
          </select>
        </div>

        <div class="input-group mb-3">
          <label for="gender">Gender</label> <br />
          <input
            v-model="student_form.gender"
            type="radio"
            id="gender1"
            name="gender"
            value="male"
          />
          <label for="gender">Male</label><br />
          <input
            v-model="student_form.gender"
            type="radio"
            id="gender2"
            name="gender"
            value="female"
          />
          <label for="gender">Female</label><br />
        </div>
        <div>
          <label for="">phone:</label>
          <input v-model="student_form.phone" type="tel" id="phone" name="phone" />
        </div>

        <div>
          <label for="birthday">Birthday:</label>
          <input
            v-model="student_form.birthday"
            type="date"
            id="birthday"
            name="birthday"
            class="form-control"
          />
        </div>
        <div>
          <label for="image" class="form-control">Image:</label>
          <input type="file" name="image" value="" />
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
        
      </form>
    </div>
  </body>
</template>

<script>
import axios from "axios";
// import student_list from "student_list.vue";
export default {
  name: "Student",
  // components: [student_list],
  data() {
    return {
      student_form: {
        name: "",
        email: "",
        image: "",
        gender: "",
        birthday: "",
        address: "",
        phone: "",
      },
    };
  },
  methods: {
    submitform() {
      var form = document.getElementById("form");
      var formData = new FormData(form);
      axios.post("laravel10-vue3/public/save", formData).then((res) => {
        console.log(res);
        alert("Data stored");
      });
    
    
      //   console.log(this.student_form);
      //   console.log(this.student_form.phone);
    },
  },
};
</script>
