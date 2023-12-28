<template>
    <div>hello edit page</div>

    <body>
        <div>
            <h1>User edit Form</h1>
            <form method="post" @submit.prevent="updateform" id="form">
                <div>
                    <label for="name">Name:</label><input type="text" v-model="user_form.name" name="name" id="name"
                        placeholder="Enter  your name" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input name="email" v-model="user_form.email" type="email" class="form-control" id="email"
                        placeholder="enter your email" />
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
            userid:"",
            user_form: {
                name: "",
                email: "",
                // image: "",
                gender: "",
                Skills: "",
            },
        };
    },
    mounted() {
        // console.log("id", this.$route.params.id);
        this.updatedata(this.$route.params.id);
        // this.updateform(this.$route.params.id);
        this.userid=this.$route.params.id;
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
                    // console.log("data ache");
                    // console.log("ok",res.data);
                 
                    this.user_form.name= res.data.name;
                      this.user_form.email = res.data.email;
                      this.user_form.gender = res.data.gender;
                      this.user_form.Skills = res.data.Skills;
                    //    alert( "profile viewed",this.user_form.name);
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
                    console.log('ok');
                });
        },
   
    },
};
</script>
