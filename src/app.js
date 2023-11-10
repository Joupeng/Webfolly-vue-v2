import { createApp } from 'vue'
import App from './App.vue'
import router from './router'


import "bootstrap/dist/css/bootstrap.css"
import 'bootstrap'
import '@/assets/scss/style.scss'

createApp(App).use(router).mount('#app')