<template>
    <footer class="frontfooter">
        <div class="frontfooter_frame">
            <router-link :to="{ name: 'home' }"><img src="../assets/images/common/logo.svg" alt="網中愚商標"></router-link>
            <div class="frontfooter_text">
                <p class="frontfooter_text"> 本網站為緯育TibaMe【第87期】前端工程師專業技術養成班學員作品,僅供學習、展示之用途。<br>
                    參考資源：回收大百科、Stick Hero、MyGoPen、Médecins Sans Frontières</p>
                <router-link :to="{ name: 'back_login' }"><span>- 管理員登入 -</span></router-link>
            </div>
        </div>
        <img class="frontfooter_scrolltop" id="scrollTop" src="../assets/images/common/icon_gotop.svg" alt="回到頂端按鈕"
            @click="scrollTop">
    </footer>
</template>

<script>
export default {
    methods: {
        scrollTop() {
            let scrollTop = document.getElementById('scrollTop');

            document.addEventListener('scroll', function () {
                let scrollHeight = window.scrollY;

                if (scrollHeight > 400) {
                    scrollTop.style.display = 'block';
                } else {
                    scrollTop.style.display = 'none';
                }
            });

            scrollTop.addEventListener('click', function () {
                let html_el = document.getElementsByTagName("html")[0];
                html_el.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        }
    },
    mounted() {
        this.scrollTop();
    }
}
</script>