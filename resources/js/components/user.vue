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
                    <div>
                        <label for="image" class="form-control">Image:</label>
                        <input type="file" name="image" value="" />
                    </div>
                     <div class="row">
                        <label>Degree:</label>
                        <div class="form-group">
                            <label for="SSC">
                                <input
                                    v-model="user_form.Degree"
                                    type="checkbox"
                                    id="SSC"
                                    value="SSC"
                                    name="Degree[]"
                                />SSC
                            </label>
                            <label for="HSC">
                                <input
                                    v-model="user_form.Degree"
                                    type="checkbox"
                                    id="HSC"
                                    value="HSC"
                                    name="Degree[]"
                                />HSC
                            </label>
                            <br />
                            <label for="BSC">
                                <input
                                    v-model="user_form.Degree"
                                    type="checkbox"
                                    id="BSC"
                                    value="BSC"
                                    name="Degree[]"
                                />BSC
                            </label>
                            <label for="MSC">
                                <input
                                    v-model="user_form.Degree"
                                    type="checkbox"
                                    id="MSC"
                                    value="MSC"
                                    name="Degree[]"
                                />MSC
                            </label>
                        </div>
                    </div> 
                    <br />

                    <!-- <strong>Degree:</strong>
                    <div v-for="(item, index) in user_form.Degree" :key="index">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="Degree[]" id="inlineCheckbox1"
                                v-model="item.check" :value="item.check" :checked="item.check" />
                            <label class="form-check-label" for="inlineCheckbox1">{{ item.name }}</label>
                        </div>
                    </div> -->
                    <br />

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
import { stringifyQuery } from "vue-router";
export default {
    name: "user",
    data() {
        return {
            user_form: {
                name: "",
                email: "",
                image: "",
                gender: "",
                Skills: "",
                Degree: [
                    // { name: "SSC", check: false },
                    // { name: "HSC", check: false },
                    // { name: "BSC", check: false },
                    // { name: "MSC", check: false },
                ],
            },
            // error: {},
        };
    },
    methods: {
        submitform() {
            // console.log('ok')
            var form = document.getElementById("form");
            var formData = new FormData(form);
            // formData.append(Degree,JSON.stringify(this.user_form.Degree))
            axios
                .post("laravel10-vue3/public/customer_create", formData)
                .then((res) => {
                    // console.log('ache',res.data);
                    alert("Customer created successfully");
                    // console.log('ok',res.data.user_form.Degree);
                    // /userlist
                    this.$router.push({ path: "/userlist" });
                });
        },
    },
};
</script>
