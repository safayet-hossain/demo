
<template>

 <router-link to="/hello">hello</router-link>

<router-view></router-view>

<!-- <router-view></router-view> -->

</template>
<script>
import router from './route';

export default {
    name: 'app',
    components: { router }
}
</script>
