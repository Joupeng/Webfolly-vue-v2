<template>
    <frontnav></frontnav>

    <section class="home">

        <!-- banner -->
        <section class="banner">
            <img src="/src/assets/images/home/home_Banner.png" alt="">
        </section>




        <div class="outerBlock">


            <!-- 你曾經在網路上看過這些新聞嗎？ -->
            <div class="titleBlock">
                <div class="titleBlockA">
                    <p class="titleText">你曾經在網路上看過這些新聞嗎</p>
                </div>

                <div class="titleBlockB">

                    <div class="block_column">
                        <div>
                            <div class="image_block"><img src="/src/assets/images/home/home_blacky.svg" alt=""></div>
                            <div class="titleBlockB_inner">
                                <p class="titleText2">網傳:登山時隨身帶一瓶殺蟲劑，遇到虎頭蜂群可以噴殺救命?</p>
                            </div>

                        </div>

                        <div>
                            <div class="image_block"><img src="/src/assets/images/home/home_bluey.svg" alt=""></div>
                            <div class="titleBlockB_inner">
                                <p class="titleText2">XXX勝訴！圈因女方一個舉動？匿名陪審團揭全案四個關鍵！</p>
                            </div>
                        </div>
                    </div>
                    <div class="titleBlockC">
                        <p class="contentText">
                            你知道嗎？你看的新聞可能有毒！當人們開始仰賴網路媒體做為獲取知識及生活資訊的管道時，網路媒體卻成為製造假訊息的溫床，甚至濫用誘餌式標題誘騙讀者點擊、提高自身點閱率，這樣糟糕的媒體環境卻潛移默化地影響著我們的生活。我們漸漸地被包覆在充滿錯誤訊息的泡泡裡，導致對部分的事情抱持著錯誤認知，也開始不信任媒體；我們漸漸習慣「重口味」的新聞標題，點擊這些標題後才發現實質內容與自己期待看到的差距很遠，滑到最後才發現自己被標題騙進來了！
                            可是這樣的媒體環境是你想要的嗎？我們仰賴網路媒體，卻無法信任媒體。</p>
                    </div>

                </div>

            </div>

            <!-- 網中愚可以提供什麼服務 -->
            <div class="titleBlock">
                <div class="titleBlockA">
                    <p class="titleText">網中愚可以提供什麼服務</p>
                </div>

                <div class="three_block">
                    <div class="three_block_inner">
                        <div class="three_block_yellow">
                            <p>認識假訊息</p>
                        </div>
                        <div><img src="/src/assets/images/home/home_bluey_small.svg" alt=""></div>
                    </div>
                    <div class="three_block_inner">
                        <div class="three_block_yellow">
                            <p>趣味小測驗</p>
                        </div>
                        <div><img src="/src/assets/images/home/home_yellow_small.svg" alt=""></div>

                    </div>
                    <div class="three_block_inner">
                        <div class="three_block_yellow">
                            <p>媒體識讀資源</p>
                        </div>

                        <div><img src="/src/assets/images/home/home_ligBlue_small.svg" alt=""></div>

                    </div>
                </div>
            </div>

            <!-- 你也可以加入這場改變 -->

            <div class="base_BG">
                <div class="lamp">
                    <div class="line"></div>
                    <div class="half_circle">
                        <p>click me!</p>
                    </div>
                    <!-- <img src="/src/assets/images/home/home_lamp.svg" alt=""> -->
                </div>
                <div class="text_area_change">
                    <p>你也可以加入這場改變</p>
                    <p>改變的路上，網中愚努力的從零走到一，
                        現在需要你一起推動我們持續前進。
                        邀請你成為網中愚的捐款人，
                        推動團隊繼續行動，實踐改變。</p>
                </div>
                <!-- 按鈕 -->
                <router-link :to="{ name: 'donate' }" @click="closeNav" class="donate_btn"><span
                        :class="{ 'frontheader_menu-on': $route.name == 'donate' }">捐款支持</span>
                </router-link>

                <div class="lamp_man_block">
                    <img src="/src/assets/images/home/home_lamp_man.svg" alt="">
                </div>
            </div>








        </div>
        <frontfooter></frontfooter>

    </section>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import frontfooter from '@/components/front_footer.vue'

export default {
    methods: {
        toDonate() {
            let donate = document.getElementById("donate");
            alert("fff")
            donate.checked = false;
        }
    },
    components: {
        frontnav,
        frontfooter,
    }
}
</script>