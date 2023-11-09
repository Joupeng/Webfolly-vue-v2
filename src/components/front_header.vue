
import router from '../router';
<template>
    <div>
        <div class="frontheader">
            <div class="frontheader_frame">
                <router-link :to="{ name: 'home' }"><img src="../images/common/logo.svg" alt="網中愚商標"></router-link>
                <input type="checkbox" class="frontheader_menubtn" id="menuBtn" />
                <label class="frontheader_menuicon" for="menuBtn"><span class="frontheader_menuline"></span></label>
                <ul class="frontheader_menu">
                    <li><router-link :to="{ name: 'home' }" @click="closeNav"><span
                                :class="{ 'frontheader_menu-on': $route.name == 'home' }">HOME</span></router-link>
                    </li>
                    <li><router-link :to="{ name: 'fakenews' }" @click="closeNav"><span
                                :class="{ 'frontheader_menu-on': $route.name == 'fakenews' }">關於假訊息</span></router-link>
                    </li>
                    <li><router-link :to="{ name: 'clickbait' }" @click="closeNav"><span
                                :class="{ 'frontheader_menu-on': $route.name == 'clickbait' }">關於誘餌式標題</span></router-link>
                    </li>
                    <li><router-link :to="{ name: 'game' }" @click="closeNav"><span
                                :class="{ 'frontheader_menu-on': $route.name == 'game' }">趣味小測驗</span></router-link>
                    </li>
                    <li><router-link :to="{ name: 'medialiteracy' }" @click="closeNav"><span
                                :class="{ 'frontheader_menu-on': $route.name == 'medialiteracy' }">媒體識讀資源</span></router-link>
                    </li>
                    <li><router-link :to="{ name: 'donate' }" @click="closeNav"><span
                                :class="{ 'frontheader_menu-on': $route.name == 'donate' }">捐款支持</span></router-link>
                    </li>
                    <li><router-link :to="{ name: 'aboutus' }" @click="closeNav"><span
                                :class="{ 'frontheader_menu-on': $route.name == 'aboutus' }">關於我們</span></router-link></li>
                </ul>
            </div>
        </div>
        <div class="frontheader-background"></div>
    </div>
</template>

<script>
export default {
    methods: {
        closeNav() {
            let menuBtn = document.getElementById("menuBtn");
            menuBtn.checked = false;
        }
    }
}
</script>