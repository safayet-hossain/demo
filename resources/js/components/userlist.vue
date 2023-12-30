<template>
    <center>
        <div>
            <h1>User List Page</h1>
        </div>
        <div>
            <!-- {{ user_list }} -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th> <hr>
                        <th scope="col">Name</th> <hr>
                        <th scope="col">Email</th> <hr>
                        <th scope="col">Gender</th> <hr>
                        <th scope="col">Skills</th> <hr>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in user_list" :key="index">
                        <td>{{ item.id }}</td> <hr>
                        <td>{{ item.name }}</td> <hr>
                        <td>{{ item.email }}</td> <hr>
                        <td>{{ item.gender }}</td> <hr>
                        <td>{{ item.Skills }}</td> <hr>
                        <td>
                            <router-link
                                :to="{ path: '/user/' + item.id + '/edit' }"
                                >Edit</router-link
                            >
                            <button
                                type="submit"
                                @click.prevent="deleteuser(item.id)"
                                class="btn btn-primary btn-block mb-4"
                            >
                                Delete
                            </button>
                        </td>
                        <!-- <td><router-link to="">delete</router-link></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</template>
<script>
import axios from "axios";
export default {
    name: "user_edit",
    data() {
        return {
            user_list: [],
        };
    },
    mounted() {
        this.userlist();
        // console.log('ok');
    },

    methods: {
        userlist() {
            // console.log('ache');
            axios.get("laravel10-vue3/public/get_customer_data").then((res) => {
                // console.log('ok');
                this.user_list = res.data;
                // console.log(this.user_list);
            });
        },
        deleteuser(updateid) {
            // console.log("ok", updateid);
            axios
                .get("laravel10-vue3/public/Customer_delete/" + updateid)
                .then((res) => {
                    console.log("deleted", res.data);
                    alert("want to delete?");
                });
        },
    },
};
</script>
