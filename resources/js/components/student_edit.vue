<template>
  <div>
    <h1>update student data</h1>

    <form method="post" @submit.prevent="updateform" id="form">
      <div>
        <label for="name">Name:</label
        ><input
          v-model="student_form.name"
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input
          v-model="student_form.email"
          name="email"
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
          name="address"
          v-model="student_form.address"
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

      <button type="submit" class="btn btn-primary btn-block mb-4">update</button>
    </form>
  </div>
</template>

<script>
// export default {
//   name: "student_edit",
//   methods: {updateform() {}},
// };
//
import axios from "axios";
// import student_list from "student_list.vue";
export default {
  name: "student_edit",
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
  mounted() {
    console.log("id", this.$route.params.id);
    this.updatedata(this.$route.params.id);
  },
  methods: {
    updatedata(updateid) {
        // const updateid = this.$route.params.id;
      //   console.log("ache", updateid);
      axios
        .get("http://localhost/laravel10-vue3/public/editdata/" + updateid)
        .then((res) => {
          //   console.log(res.data);

          this.student_form.name = res.data.name;
          this.student_form.email = res.data.email;
          this.student_form.address = res.data.address;
          this.student_form.gender = res.data.gender;
          this.student_form.birthday = res.data.dob;
          this.student_form.phone = res.data.phone;

          //   alert(this.student_form.name, "profile viewd");
        });
    },
    updateform(updateid) {
      console.log("ache");
      var form = document.getElementById("form");
      var formData = new FormData(form);

      axios
        .post("http://localhost/laravel10-vue3/public/updatedata/" + updateid, formData)
        .then((res) => {
          // console.log(res.data.id);
          
        });
    },
    // deleteStudent(updateid){
    //     console.log('ok',updateid);
    //     // /student_delete/{id}
    //   }
  },
};
</script>
