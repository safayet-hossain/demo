import {createApp} from 'vue'

import App from './App.vue'

// import Hello from './hello.vue'
// import practice from './practice.vue'
import router from './route.js'
// import {  } from 'vue-router'

createApp(App).use(router).mount("#app")
// createApp(practice).mount("#practice")

// createApp(Hello).mount("#hello")
