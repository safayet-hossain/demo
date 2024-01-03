<template>
    <div>
        <h1>Welcome {{ user_form.name }}</h1>
    </div>

    <body>
        <div>
            <h1>Employee Edit Form</h1>
            <form method="post" @submit.prevent="updateform" id="form">
                <div>
                    <label for="name">Name:</label><input type="text" v-model="user_form.name" name="name" id="name"
                        placeholder="Enter  your name" />
                    <p v-if="error.name" class="text-danger">{{
                        error.name
                    }}</p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input name="email" v-model="user_form.email" type="email" class="form-control" id="email"
                        placeholder="enter your email" />
                    <p v-if="error.email" class="text-danger">{{
                        error.email
                    }}</p>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="Skills" name="Skills">Skills</label>
                    </div>
                    <select class="custom-select" id="Skills" v-model="user_form.Skills" name="Skills">
                        <option value="">Choose.</option>
                        <option value="laravel">laravel</option>
                        <option value="vue">vue</option>
                        <option value="api">api</option>
                    </select>

                </div>
                <p v-if="error.Skills" class="text-danger">{{
                    error.Skills
                }}</p>
                <div class="input-group mb-3">
                    <label for="gender">Gender</label> <br />
                    <input type="radio" v-model="user_form.gender" id="gender1" name="gender" value="male" checked />
                    <label for="gender">Male</label><br />
                    <input type="radio" v-model="user_form.gender" id="gender2" name="gender" value="female" checked />
                    <label for="gender">Female</label><br />
                </div>

                <div>
                    <label for="image" class="form-control">Image:</label>
                    <img :src="'http://localhost/laravel10-vue3/public/storage/uploads/' +
                        user_form.image
                        " width="200" />
                    <input type="file" name="image" value="" />
                </div>



                <strong>Degree:</strong>
                <!-- {{ degrees }} -->
                <div v-for="(item, index) in degrees" :key="index">
                    <div class="form-check form-check-inline">
                        <span v-if="user_form.Degree.includes(item)">
                            <input class="form-check-input" type="checkbox" name="Degree[]" id="inlineCheckbox1"
                                :value="item" :checked="true" />
                            <label class="form-check-label" for="inlineCheckbox1">{{ item }}</label>
                        </span>
                        <span v-else>
                            <input class="form-check-input" type="checkbox" name="Degree[]" id="inlineCheckbox1"
                                :value="item" :checked="false" />
                            <label class="form-check-label" for="inlineCheckbox1">{{ item }}</label>
                        </span>

                    </div>
                    <p v-if="error.Degree" class="text-danger">
                        {{ error.Degree}}</p> 
                </div>
              

                <button type="submit" class="btn btn-primary btn-block mb-4">
                    Update
                </button>
            </form>
        </div>
    </body>
</template>
<script>
import axios from "axios";
export default {
    name: "student_edit",
    data() {
        return {
            userid: "",

            user_form: {
                name: "",
                email: "",
                image: "",
                gender: "",
                Skills: "", 
                Degree: [],
            },
            error: {},
            degrees: ["MSC", "SSC", "HSC", "BSC"],
        };
    },
    mounted() {
        // console.log("id", this.user_form.Degree);
        this.updatedata(this.$route.params.id);
        // this.updateform(this.$route.params.id);
        this.userid = this.$route.params.id;
        // console.log(updateid);
    },
    methods: {
        updatedata(updateid) {
            // console.log(updateid);
            // const updateid = this.$route.params.id;
            // console.log("ache", updateid);
            axios
                .get(
                    "http://localhost/laravel10-vue3/public/customer/editdata/" +
                    updateid
                )
                .then((res) => {
                    this.user_form = res.data;
                    // console.log("data ache");

                    this.user_form.name = res.data.name;
                    this.user_form.email = res.data.email;
                    this.user_form.gender = res.data.gender;
                    this.user_form.Skills = res.data.Skills;
                    this.user_form.Degree = JSON.parse(res.data.Degree);
                    // console.log("okaa", this.user_form.Degree);
                });
        },

        updateform() {
            // console.log(updateid);
            var form = document.getElementById("form");
            var formData = new FormData(form);

            // console.log("ache");
            axios
                .post(
                    "http://localhost/laravel10-vue3/public/Customer_updatedata/" +
                    this.userid,
                    formData
                )
                .then((res) => {
                    console.log("ok", this.user_form.Degree);
                    alert("profile updated", this.user_form.name);

                    this.$router.push({ path: "/user" });
                }); 
            this.validate();
        },
        validate() {
            if (this.user_form.name == "") {
                this.error.name = "name is required";
            }
            if (this.user_form.email == "") {
                this.error.email = "email is required";
            }
            if (this.user_form.Skills == "") {
                this.error.Skills = "Skills is required";
            }
            if (this.user_form.gender == "") {
                this.error.gender = "Gender is required";
            }
            if (this.user_form.Degree == "") {
                this.error.Degree = "Degree is required";
            }
         
            
        },
    },
};
</script>
