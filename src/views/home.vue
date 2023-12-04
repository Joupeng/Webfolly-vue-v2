<template>
    <section class="home">
        <frontnav></frontnav>
        <!-- banner -->
        <!-- <section class="banner">
            <img src="../assets/images/home/home_Banner.png" alt="">
        </section> -->

        <!-- grid_test -->
        <div class="grid_container">

            <div class="wrapper">

                <div class="banner_card" id="banner_card1" :class="{ '-clicked1': isClicked1 }">
                    ＯＯＯ被讚逆生長「露肚裝」大秀性感螞蟻腰！
                    <button class="close_button" @click="toggleOpacity1()" :class="{ '-clicked1': isClicked1 }">X</button>
                </div>

                <div class="banner_card" id="banner_card2" :class="{ '-clicked2': isClicked2 }">
                    【快報】網傳「水梨7月中旬前上市，代表有用生長激素，會影響生育」？
                    <button class="close_button" @click="toggleOpacity2()" :class="{ '-clicked2': isClicked2 }">X</button>

                </div>

                <div class="banner_card" id="banner_card3" :class="{ '-clicked3': isClicked3 }">
                    竟然從這個地方找翻倍股？億級大戶ＯＯＯ不看盤選股秘訣大公開！
                    <button class="close_button" @click="toggleOpacity3()" :class="{ '-clicked3': isClicked3 }">X</button>

                </div>

                <div class="banner_card" id="banner_card4" :class="{ '-clicked4': isClicked4 }">
                    【快報】網傳「千萬別打美國研發新型的新冠疫苗， 美國人自己都沒有人打，台灣居然領先全球」？
                    <button class="close_button" @click="toggleOpacity4()" :class="{ '-clicked4': isClicked4 }">X</button>

                </div>

                <div class="banner_card" id="banner_card5" :class="{ '-clicked5': isClicked5 }">
                    【震驚】網傳「最近千萬不要去全家、7-11買茶葉蛋，昨晚電視名嘴他們說了，現在超商的茶葉蛋是進口的巴西毒蛋」？
                    <button class="close_button" @click="toggleOpacity5()" :class="{ '-clicked5': isClicked5 }">X</button>

                </div>
                <!-- <br> -->
                <div class="img_block">
                    <img v-if="showHand" src="../assets/images/home/home_banner_hand.svg" alt="" class="the_hand">
                    <img v-else src="../assets/images/home/Yellowy_Gif01.gif" alt="" class="good_job">

                </div>


            </div>

        </div>




        <div class="outerBlock">


            <!-- 你曾經在網路上看過這些新聞嗎？ -->
            <div class="titleBlock">
                <div class="titleBlockA">
                    <p class="titleText">你曾經在網路上看過這些新聞嗎</p>
                </div>

                <div class="titleBlockB">

                    <div class="block_column">
                        <div>
                            <div class="image_block"><img src="../assets/images/home/Black_Gif_bugKiller.gif" alt="">
                            </div>
                            <div class="titleBlockB_inner">
                                <p class="titleText2">網傳:登山時隨身帶一瓶殺蟲劑，遇到虎頭蜂群可以噴殺救命?</p>
                            </div>

                        </div>

                        <div>
                            <div class="image_block"><img src="../assets/images/home/Blue_Gif_guilty.gif" alt=""></div>
                            <div class="titleBlockB_inner">
                                <p class="titleText2">XXX勝訴！全因女方一個舉動？匿名陪審團揭全案四個關鍵！</p>
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
                    <div class="three_block_inner1">

                        <router-link :to="{ name: 'fakenews' }" @click="closeNav" :class="{ '-clicked': isClicked }"
                            class="router_btn "><span
                                :class="{ 'frontheader_menu-on': $route.name == 'fakenews' }">關於假訊息</span>
                        </router-link>

                        <div><img src="../assets/images/home/home_bluey_small.svg" alt=""></div>
                    </div>
                    <div class="three_block_inner2">
                        <router-link :to="{ name: 'game' }" @click="closeNav" :class="{ '-clicked': isClicked }"
                            class="router_btn "><span :class="{ 'frontheader_menu-on': $route.name == 'game' }">趣味小測驗</span>
                        </router-link>
                        <div><img src="../assets/images/home/home_yellow_small.svg" alt=""></div>

                    </div>
                    <div class="three_block_inner3">
                        <router-link :to="{ name: 'medialiteracy' }" @click="closeNav" :class="{ '-clicked': isClicked }"
                            class="router_btn "><span
                                :class="{ 'frontheader_menu-on': $route.name == 'medialiteracy' }">媒體釋讀資源</span>
                        </router-link>


                        <div><img src="../assets/images/home/home_ligBlue_small.svg" alt=""></div>

                    </div>
                </div>
            </div>

            <!-- 你也可以加入這場改變 -->

            <div class="base_BG" :class="{ '-clicked': isClicked }" ref="backgroundImage">
                <div class="lamp">
                    <div class="line"></div>
                    <div class="half_circle" @click="changeBackground">
                        <p>click me!</p>
                    </div>
                </div>
                <div class="text_area_change" :class="{ '-clicked': isClicked }">
                    <p>你也可以加入這場改變</p>
                    <p>改變的路上，網中愚努力的從零走到一，
                        現在需要你一起推動我們持續前進。
                        邀請你成為網中愚的捐款人，
                        推動團隊繼續行動，實踐改變。</p>
                </div>
                <!-- 按鈕 -->
                <router-link :to="{ name: 'donate' }" @click="closeNav" class="donate_btn"
                    :class="{ '-clicked': isClicked }"><span
                        :class="{ 'frontheader_menu-on': $route.name == 'donate' }">捐款支持</span>
                </router-link>

                <div class="lamp_man_block">
                    <img v-if="isSad" src="../assets/images/home/home_lamp_man_sad.svg" alt="">
                    <img v-else src="../assets/images/home/home_lamp_man.svg" alt="">
                    <!-- <img src="../assets/images/home/home_lamp_man_sad.svg" alt=""> -->
                    <!-- <img src="../assets/images/home/home_lamp_man.svg" alt=""> -->

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
    data() {
        return {
            isClicked: false,
            isClicked1: false,
            isClicked2: false,
            isClicked3: false,
            isClicked4: false,
            isClicked5: false,
            showHand: true,
            isSad: true,


        };
    },
    methods: {

        toDonate() {
            let donate = document.getElementById("donate");
            donate.checked = false;
        },

        changeBackground() {
            this.isClicked = !this.isClicked;
            // 根據 isClicked 狀態來切換背景圖片
            this.isSad = !this.isSad;
            if (this.isClicked) {
                // 如果 isClicked 為 true，使用第一張背景圖片
                this.$refs.backgroundImage.style.backgroundImage = url("../assets/images/home/home_lamp_bg1.png");
            } else {
                // 如果 isClicked 為 false，使用第二張背景圖片
                this.$refs.backgroundImage.style.backgroundImage = url("../assets/images/home/home_lamp_bg2.png");
            }
        },

        toggleOpacity1() {
            this.isClicked1 = !this.isClicked1;
            this.checkShowHand();
        },
        toggleOpacity2() {
            this.isClicked2 = !this.isClicked2;
            this.checkShowHand();
        },
        toggleOpacity3() {
            this.isClicked3 = !this.isClicked3;
            this.checkShowHand();
        },
        toggleOpacity4() {
            this.isClicked4 = !this.isClicked4;
            this.checkShowHand();
        },
        toggleOpacity5() {
            this.isClicked5 = !this.isClicked5;
            this.checkShowHand();
        },
        checkShowHand() {
            this.showHand = !(this.isClicked1 && this.isClicked2 && this.isClicked3 && this.isClicked4 && this.isClicked5);
        }

    },


    components: {
        frontnav,
        frontfooter,
    }
}
</script>