<template>
    <center>
    <div>hello users</div>
    <body>
        <div>
            <h1>User Create Form</h1>
            <form method="post" @submit.prevent="submitform" id="form">
                <div>
                    <label for="name">Name:</label><input type="text" v-model="user_form.name" name="name" id="name"
                        placeholder="Enter  your name" required />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input name="email" v-model="user_form.email" type="email" class="form-control" id="email"
                        placeholder="enter your email" required />
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="Skills" name="Skills">Skills</label>
                    </div>
                    <select class="custom-select" id="Skills" v-model="user_form.Skills" name="Skills" required>
                        <option value="">Choose.</option>
                        <option value="laravel">laravel</option>
                        <option value="vue">vue</option>
                        <option value="api">api</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label for="gender">Gender</label> <br />
                    <input type="radio" v-model="user_form.gender" id="gender1" name="gender" value="male" />
                    <label for="gender">Male</label><br />
                    <input type="radio" v-model="user_form.gender" id="gender2" name="gender" value="female" />
                    <label for="gender">Female</label><br />
                </div>
                <!-- <div>
          <label for="image" class="form-control">Image:</label>
          <input type="file" name="image" value="" />
        </div> -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                    Submit
                </button>
            </form>
        </div>
    </body>
</center>
</template>
<script>
import axios from "axios";
export default {
    name: "user",
    data() {
        return {
            user_form: {
                name: "",
                email: "",
                // image: "",
                gender: "",
                Skills: "",
            },
        };
    },
    methods: {
        submitform() {
            var form = document.getElementById("form");
            var formData = new FormData(form);
       console.log('ache');
            axios.post("laravel10-vue3/public/customer_create", formData).then((res) => {
                console.log(res.data);
                alert("Customer created successfully");
                // /userlist
                this.$router.push({ path: '/userlist' });
            });
        },
    },
};
</script>
