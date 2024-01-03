<template>
    <div class="container">
        <h1>Hello {{ form.name }}</h1>
    </div>
    <body class="container">
        <div>
            <h1>Employee Create Form</h1>
            <form method="post" @submit.prevent="updateform" id="form">
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
                        v-model="form.address"
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
                    <img
                        :src="
                            'http://localhost/laravel10-vue3/public/storage/uploads/' +
                            form.image
                        "
                        width="200"
                    />

                    <input type="file" name="image" value="" />
                </div>
                <!-- cv -->
                <div>
                    <strong for="cv" class="form-group">CV:</strong>

                    <a
                        :href="
                            'http://localhost/laravel10-vue3/public/storage/uploads/' +
                            form.cv
                        "
                        class="btn btn-success"
                    >
                        cv</a
                    >

                    <br />

                    <input type="file" name="cv" value="" />
                </div>

                <br />
                <strong>Skill:</strong>
                <div v-for="(item, index) in Skills" :key="index">
                    <div class="form-check form-check-inline">
                        <span v-if="form.Skill.includes(item)">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="Skill[]"
                                id="inlineCheckbox1"
                                :value="item"
                                :checked="true"
                            />
                            <label
                                class="form-check-label"
                                for="inlineCheckbox1"
                                >{{ item }}</label
                            >
                        </span>
                        <span v-else>
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="Skill[]"
                                id="inlineCheckbox1"
                                :value="item"
                                :checked="false"
                            />
                            <label
                                class="form-check-label"
                                for="inlineCheckbox1"
                                >{{ item }}</label
                            >
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4">
                    update
                </button>
            </form>
        </div>
    </body>
    <employee_list />
</template>
<script>
import axios from "axios";
export default {
    name: "employee_edit",
    data() {
        return {
            userid: "",
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
            Skills: ["PHP", "HTML", "laravel", "vue"],
        };
    },
    mounted() {
        this.updatedata(this.$route.params.id);
        // this.updateform(this.$route.params.id);
        this.userid = this.$route.params.id;
        // console.log(updateid);
    },
    methods: {
        updatedata(updateid) {
            axios
                .get(
                    "http://localhost/laravel10-vue3/public/employee/editdata/" +
                        updateid
                )
                .then((res) => {
                    this.form = res.data;
                    // console.log("data ache");

                    this.form.name = res.data.name;
                    this.form.email = res.data.email;
                    this.form.gender = res.data.gender;
                    this.form.Skill = JSON.parse(res.data.Skills);
                    this.form.address = res.data.address;
                    this.form.age = res.data.age;
                    this.form.phone = res.data.phone;
                });
        },

        updateform() {
            // console.log(updateid);
            var form = document.getElementById("form");
            var formData = new FormData(form);

            console.log("ache");
            axios
                .post(
                    "http://localhost/laravel10-vue3/public/employee_updatedata/" +
                        this.userid,
                    formData
                )
                .then((res) => {
                    // console.log(res.data);

                    alert("profile updated", this.form.name);

                    // this.$router.push({ path: "/user" });
                });
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
