<template>
    <div class="container">
        <h1>User List Page</h1>
    </div>
    <div class="container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <hr />
                    <th scope="col">Name</th>
                    <hr />
                    <th scope="col">Email</th>
                    <hr />
                    <th scope="col">PHONE</th>
                    <hr />
                    <th scope="col">Gender</th>
                    <hr />
                    <th scope="col">Address</th>
                    <hr />
                    <th scope="col">Age</th>
                    <hr />
                    <th scope="col">Skill</th>
                    <hr />

                    <th scope="col">Image</th>
                    <hr />
                    <th scope="col">CV</th>
                    <hr />

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in form" :key="index">
                    <td>{{ item.id }}</td>
                    <hr />
                    <td>{{ item.name }}</td>
                    <hr />
                    <td>{{ item.email }}</td>
                    <hr />
                    <td>{{ item.phone }}</td>
                    <hr />
                    <td>{{ item.gender }}</td>
                    <hr />
                    <td>{{ item.address }}</td>
                    <hr />
                    <td>{{ item.age }}</td>
                    <hr />
                    <td>
                        <div
                            v-for="(item, index) in JSON.parse(item.Skill)"
                            :key="index"
                        >
                            {{ item }}
                        </div>
                    </td>
                    <hr />
                    <td>
                        <img
                            :src="
                                'http://localhost/laravel10-vue3/public/storage/uploads/' +
                                item.image
                            "
                            width="100"
                        />
                    </td>
                    <hr />
                    <td>
                        <a
                            :href="
                                'http://localhost/laravel10-vue3/public/storage/uploads/' +
                                item.cv
                            " 
                            class="btn btn-success"
                            >Click here</a
                        >
                    </td>
                    <hr />
                    <td>
                        <router-link
                            :to="{ path: '/employee/' + item.id + '/edit' }"
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
                    <hr />
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            form: [],
        };
    },
    mounted() {
        this.userlist();
        // console.log('ok');
    },

    methods: {
        userlist() {
            // console.log('ache');
            axios
                .get("http://localhost/laravel10-vue3/public/get_employee_data")
                .then((res) => {
                    console.log("ok");
                    this.form = res.data;
                    // console.log(this.user_list);
                    // this.$router.push({ path: '/userlist' });
                });
        },
        deleteuser(updateid) {
            // console.log("ok", updateid);
            axios
                .get(
                    "http://localhost/laravel10-vue3/public/employee_delete/" +
                        updateid
                )
                .then((res) => {
                    console.log("deleted", res.data);
                    alert("want to delete?");
                    this.$router.push({ path: "/employee/create" });
                });
        },
    },
};
</script>
