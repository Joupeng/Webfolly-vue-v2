<template>
  <div class="game_fakenews">
    <div class="pillar_left" @click="createGrowRectangle">
      <div class="bridge"></div>
      <div class="yellow"><img src="../assets/images/game_fakenews/game_fakenews_yellow.svg" class="yellow_img" alt="">
      </div>
    </div>
    <div class="pillar_right">
      <div class="black"><img src="../assets/images/game_fakenews/game_fakenews_stand.svg" alt=""></div>
    </div>
    <!-- 手機板 -->
    <div class="window" id="window">
      <div class="outer_box_text">
        <div class="text_window">
          <p>{{ text_small }}</p>
        </div>
      </div>
      <div class="stand_circle_photo"><img src="../assets/images/game_fakenews/game_fakenews_circle_stand.svg" alt="">
      </div>
    </div>
    <div v-if="isVisible" class="black_background" id="black_background"></div>
    <div class="black_background_phone" id="black_background_phone">
    </div>

    <div class="return"><img src="../assets/images/game_fakenews/game_fakenews_return.svg" class="return_photo"></div>
    <div v-if="isVisible" class="show_text" id="show_text">
      <p>{{ text_big }}</p>
      <button type="button" @click="skipButton" id="button">略過</button>
    </div>
    <div v-if="isVisible" class="img_container" id="img_container">
      <img src="../assets/images/game_fakenews/game_fakenews_big_stand.svg" class="big_stand">
      <img src="../assets/images/game_fakenews/game_fakenews_medium_stand.svg" class="medium_stand" alt="">
    </div>

    <div id="app" class="card_show">
      <div class="outside_container">
        <div class="score_bar">
          <p>分數:{{ score }}</p>
        </div>
        <div class="container_qs">
          <div class="left_QA">
            <p class="title_qs">選項一</p>
            <div class="inner_qs">
              <p class="content_qs" v-for="(item1, index) in questionText1">
                {{ item1.text }}
              </p>
              <p class="ans_qs">預留詳解位置，但是是要用觸發的方式才會出現,當馬鈴薯發芽時，整顆馬鈴薯產生大量的茄鹼，此種毒性，即使高溫加熱也無法去除。</p>
            </div>
            <!-- <button type="button" value="true" @click="message">確認</button> -->
            <button type="button" @click="addScore(index, 'true')">確認</button>
          </div>
          <div class="right_QA">
            <p class="title_qs">選項二</p>
            <div class="inner_qs">
              <p class="content_qs" v-for="(item2, index) in questionText2">
                {{ item2.text }}
              </p>
              <p class="ans_qs"></p>
            </div>
            <!-- 按鈕各自代表false跟true -->
            <button type="button" @click="addScore(index, 'false')">確認</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

import { gsap } from 'gsap';
export default {
  data() {
    return {
      text_small: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的 ?",
      text_big: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的 ?",
      isVisible: true,
      score: 0,
      questionText1: [
        {
          text: "馬鈴薯發芽時會產生毒素，聽說只要把發芽的芽眼切除，其他部位還是可以吃，這是真的嗎？",
          ans: "false",
        }
      ],

      questionText2: [
        {
          text: "澱粉類食物，例如馬鈴薯，經過攝氏120度以上高溫炒炸，容易產生致癌物?",
          ans: "false",
        }
      ],
    }
  },
  methods: {
    // 點選略過鈕
    skipButton(e) {
      // alert(123);
      this.isVisible = false;
    },
    // 造橋
    createGrowRectangle() {
      // alert(123);
      let bridge = document.getElementsByClassName("bridge")[0];
      if (window.innerWidth <= 667) {
        bridge.classList.add("-bridge-small");
      } else if (window.innerWidth <= 992) {
        bridge.classList.add("-bridge-medium");
      } else if (window.innerWidth <= 1200) {
        bridge.classList.add("-bridge-large");
      } else {
        bridge.classList.add("-bridge-largest");

      }

      let character_walk = document.getElementsByClassName("yellow")[0];
      character_walk.classList.add("-on");
    },
    addScore(index, ans) {
      // console.log(ans);
      // console.log(this.questionText1[0].ans);
      if (this.questionText1[0].ans == ans || this.questionText2[0].ans == ans) {
        // const currentQuestion = index === 0 ? this.questionText1[0] : this.questionText2[0];
        // if (currentQuestion.ans === ans) {
        alert("答對囉");
        console.log(ans)
        this.score++;
      } else {
        alert("答錯囉");
      }
    },
    checkOrientation() {
      if (window.matchMedia("(orientation: portrait)").matches) {
        alert("請將螢幕轉向橫向以顯示內容！");
      }
    },
  },
  mounted() {
    // 頁面加載後立即檢查螢幕方向
    this.checkOrientation();
    //監聽視窗改變即會跳出提醒
    window.addEventListener('resize', this.checkOrientation);
    gsap.to("#window", {
      scaleY: 0,
      delay: 5,
      duration: 1,
      y: 50,
      ease: "power1.out"
    });
    gsap.to("#black_background_phone", {
      scaleY: 0,
      delay: 5,
      duration: 1,
      y: 50,
      ease: "power1.out"
    });
  }

}

</script>

