<template>
    <div class="container">
        <h1>Hello {{ form.name }}</h1>
    </div>
    <body class="container">
        <div>
            <h1>Employee Create Form</h1>
            <form method="post" @submit.prevent="submitform" id="form">
                <!-- NAME -->
                <div>
                    <strong for="name">Name:</strong
                    ><input
                        class="form-control"
                        type="text"
                        v-model="form.name"
                        name="name"
                        id="name"
                        placeholder="Enter  your name"
                    />
                </div>
                <!-- <small v-if="error.name" class="text-danger">{{
                        error.name
                        
                    }}</small> -->

                <!-- ADDRESS -->
                <div class="form-group">
                    <strong for="address">Address</strong>
                    <input
                        type="text-area"
                        class="form-control"
                        id="address"
                        placeholder="Enter address"
                        name="address"
                    />
                </div>
                <!-- EMAIL -->
                <div class="form-group">
                    <strong for="">Email Address</strong>
                    <input
                        name="email"
                        v-model="form.email"
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="enter your email"
                    />
                    <!-- <small v-if="error.name" class="text-danger">{{
                        error.email
                    }}</small> -->
                </div>

                <!-- PHONE -->

                <div>
                    <strong for="phone">phone:</strong
                    ><input
                        class="form-control"
                        type="number"
                        v-model="form.phone"
                        name="phone"
                        id="phone"
                        placeholder="Enter your phone number"
                    />
                </div>
                <!-- Age -->
                <div>
                    <strong for="age">Age:</strong
                    ><input
                        class="form-control"
                        type="number"
                        v-model="form.age"
                        name="age"
                        id="age"
                        placeholder="Enter your age "
                    />
                </div>

                <!-- gender -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <strong
                            class="input-group-text"
                            for="gender"
                            name="gender"
                            >gender</strong
                        >
                    </div>
                    <select
                        class="custom-select"
                        id="gender"
                        v-model="form.gender"
                        name="gender"
                    >
                        <option value="">Choose.</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <!-- <small v-if="error.name" class="text-danger">{{
                    error.Skills
                }}</small> -->

                <!-- image -->
                <div>
                    <strong for="image" class="form-group">Image:</strong>

                    <input type="file" name="image" value="" />
                </div>
                <!-- cv -->
                <div>
                    <strong for="cv" class="form-group">CV:</strong>

                    <input type="file" name="cv" value="" />
                </div>

                <div class="row">
                    <strong>SKILL:</strong>
                    <div class="form-group">
                        <label for="PHP">
                            <input
                                v-model="form.Skill"
                                type="checkbox"
                                id="PHP"
                                value="PHP"
                                name="Skill[]"
                            />PHP
                        </label>
                        <br />
                        <label for="HTML">
                            <input
                                v-model="form.Skill"
                                type="checkbox"
                                id="HTML"
                                value="HTML"
                                name="Skill[]"
                            />HTML
                        </label>
                        <br />
                        <label for="laravel">
                            <input
                                v-model="form.Skill"
                                type="checkbox"
                                id="laravel"
                                value="laravel"
                                name="Skill[]"
                            />Laravel
                        </label>
                        <br />
                        <label for="vue">
                            <input
                                v-model="form.Skill"
                                type="checkbox"
                                id="vue"
                                value="vue"
                                name="Skill[]"
                            />vue
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4">
                    Submit
                </button>
            </form>
        </div>
    </body>
   
</template>
<script>
import axios from "axios";
export default {
    name: "create",

    data() {
        return {
            form: {
                name: "",
                email: "",
                image: "",
                gender: "",
                Skill: [],
                address: "",
                age: "",
                phone: "",
                cv: "",
            },
            // error: {},
        };
    },
    methods: {
        submitform() {
            console.log("ok");
            var form = document.getElementById("form");
            var formData = new FormData(form);

            axios
                .post(
                    "http://localhost/laravel10-vue3/public/employee_create",
                    formData
                )
                .then((res) => {
                    console.log("ache", res.data);
                    alert(" created successfully");
                    // console.log('ok',res.data.user_form.Degree);
                    // /userlist
                    // this.$router.push({ path: "/userlist" });
                    // this.$router.push({ path: "/user" });
                });
            //     .catch(error => {
            //     this.errors = error.res.data;
            //     console.log('ok');

            // });

            // this.validate();
        },
        // validate() {
        //     if (this.user_form.name == "") {
        //         this.error.name = "name is required";
        //     }
        //     if (this.user_form.email == "") {
        //         this.error.email = "email is required";
        //     }
        //     if (this.user_form.Skills == "") {
        //         this.error.Skills = "Skills is required";
        //     }
        //     if (this.user_form.gender == "") {
        //         this.error.gender = "Gender is required";
        //     }
        //     if (this.user_form.Degree == "") {
        //         this.error.Degree = "Degree is required";
        //     }
        // },
    },
};
</script>
