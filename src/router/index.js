import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/home.vue'


const routes = [
    {
        // 預設
        path: '/index.html',
        name: 'index',
        component: Home
    },

    /*--------------------------  frontside --------------------------*/
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
        // 前台 關於誘餌式標題
        path: '/clickbait',
        name: 'clickbait',
        component: () => import('../views/clickbait.vue')
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
        // 前台 標題猜一猜
        path: '/game_clickbait',
        name: 'game_clickbait',
        component: () => import('../views/game_clickbait.vue')
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
        // 前台 捐款徵信紀錄
        path: '/donate_log',
        name: 'donate_log',
        component: () => import('../views/donate_log.vue')
    },
    {
        // 前台 捐款常見問題
        path: '/donate_faq',
        name: 'donate_faq',
        component: () => import('../views/donate_faq.vue')
    },
    {
        // 前台 隱私權政策
        path: '/donate_privacypolicy',
        name: 'donate_privacypolicy',
        component: () => import('../views/donate_privacypolicy.vue')
    },
    {
        // 前台 關於我們
        path: '/aboutus',
        name: 'aboutus',
        component: () => import('../views/aboutus.vue')
    },

    /*--------------------------  backside --------------------------*/

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
        // 後台 捐款管理
        path: '/back_donate',
        name: 'back_donate',
        component: () => import('../views/back_donate.vue')
    },
    {
        // 後台 測驗管理
        path: '/back_game',
        name: 'back_game',
        component: () => import('../views/back_game.vue')
    },
    {
        // 後台 忘記密碼
        path: '/back_password',
        name: 'back_password',
        component: () => import('../views/back_password.vue')
    },
    {
        // 後台 媒體識讀管理
        path: '/back_medialiteracy',
        name: 'back_medialiteracy',
        component: () => import('../views/back_medialiteracy.vue')
    },

]


const router = createRouter({
    history: createWebHistory(),
    routes
})



export default router