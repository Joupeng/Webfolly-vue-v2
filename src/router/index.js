import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '@/views/home.vue'

const routes = [

    //--------------------------  frontside --------------------------
    {
        // 前台 首頁
        path: '/',
        name: 'home',
        component: Home
    },
    {
        // 前台 關於假訊息
        path: '/fakenews',
        name: 'fakenews',
        component: () => import('../views/fakenews.vue')
    },

    {
        // 前台 趣味小測驗
        path: '/game',
        name: 'game',
        component: () => import('../views/game.vue')
    },
    {
        // 前台 假訊息追擊
        path: '/game_fakenews',
        name: 'game_fakenews',
        component: () => import('../views/game_fakenews.vue')
    },

    {
        // 前台 媒體識讀資源
        path: '/medialiteracy',
        name: 'medialiteracy',
        component: () => import('../views/medialiteracy.vue')
    },
    {
        // 前台 捐款支持
        path: '/donate',
        name: 'donate',
        component: () => import('../views/donate.vue')
    },
    {
        // 前台 捐款支持＿填寫基本資料
        path: '/donate_basicinformation',
        name: 'donate_basicinformation',
        component: () => import('../views/donate_basicinformation.vue')
    },
    {
        // 前台 捐款完成     
        path: '/donate_finish',
        name: 'donate_finish',
        component: () => import('../views/donate_finish.vue')
    },
    {
        // 前台 捐款失敗    
        path: '/donate_unfinish',
        name: 'donate_unfinish',
        component: () => import('../views/donate_unfinish.vue')
    },
    {
        // 前台 捐款徵信紀錄查詢
        path: '/donate_log',
        name: 'donate_log',
        component: () => import('../views/donate_log.vue')
    },
    {
        // 前台 捐款徵信紀錄結果
        path: '/donate_record_result',
        name: 'donate_record_result',
        component: () => import('../views/donate_record_result.vue')
    },

    {
        // 前台 捐款常見問題
        path: '/donate_faq',
        name: 'donate_faq',
        component: () => import('../views/donate_faq.vue')
    },
    // {
    //     // 前台 隱私權政策
    //     path: '/donate_privacypolicy',
    //     name: 'donate_privacypolicy',
    //     component: () => import('../views/donate_privacypolicy.vue')
    // },
    {
        // 前台 關於我們
        path: '/aboutus',
        name: 'aboutus',
        component: () => import('../views/aboutus.vue')
    },
    {
        // 前台 捐款管理_捐款者資訊頁面
        path: '/back_donate_basicinformation_02',
        name: 'back_donate_basicinformation_02',
        component: () => import('../views/back_donate_basicinformation_02.vue')
    },

    //--------------------------  backside --------------------------

    {
        // 後台 登入頁
        path: '/back_login',
        name: 'back_login',
        component: () => import('../views/back_login.vue')
    },
    {
        // 後台 管理員帳號
        path: '/back_account',
        name: 'back_account',
        component: () => import('../views/back_account.vue')
    },
    {
        // 後台 忘記密碼
        path: '/back_password',
        name: 'back_password',
        component: () => import('../views/back_password.vue')
    },


    {
        // 後台 外網連結
        path: '/back_medianetwork',
        name: 'back_medianetwork',
        component: () => import('../views/back_mediaNetwork.vue')
    },
    {
        // 後台 媒體識讀
        path: '/back_mediaclass',
        name: 'back_mediaclass',
        component: () => import('../views/back_mediaClass.vue')
    },

    {
        // 後台 測驗管理(假訊息追擊題庫)
        path: '/back_fakenews',
        name: 'back_fakenews',
        component: () => import('../views/back_fakeNews.vue')
    },
    {
        // 後台 捐款管理
        path: '/back_donatemanage',
        name: 'back_donatemanage',
        component: () => import('../views/back_donateManage.vue')
    },

    {
        // 後台 捐款FAQ
        path: '/back_donatefaq',
        name: 'back_donatefaq',
        component: () => import('../views/back_donateFAQ.vue')
    },


]


const router = createRouter({
    history: createWebHashHistory(),
    routes
})



export default router






// 1. Define route components.
// These can be imported from other files
// const Home = { template: '<div>Home</div>' }
// const About = { template: '<div>About</div>' }

// // 2. Define some routes
// // Each route should map to a component.
// // We'll talk about nested routes later.
// const routes = [
//     { path: '/', component: Home },
//     // { path: '/about', component: About },
















// ]

// // 3. Create the router instance and pass the routes option
// // You can pass in additional options here, but let's
// // keep it simple for now.
// const router = VueRouter.createRouter({
//     // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
//     history: VueRouter.createWebHashHistory(),
//     routes, // short for routes: routes
// })

// // 5. Create and mount the root instance.
// const app = Vue.createApp({})
// // Make sure to use the router instance to make the
// // whole app router-aware.
// app.use(router)

// app.mount('#app')