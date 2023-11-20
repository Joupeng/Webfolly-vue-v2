<template>
  <div class="game_fakenews">
    <!-- 監聽腳色走到橋中間之後才觸發題目出現-->
    <div class="yellow" :class="{ '-on': isCharacterWalking }"><img
        src="../assets/images/game_fakenews/game_fakenews_yellow.svg" class="yellow_img" alt="">
    </div>
    <!-- 包覆兩層一層控制長高一層控制往下倒 -->
    <div class="bridge" :class="bridgeSizeClass">
      <div class="bridge__inner" :class="bridgeSizeClass"></div>
    </div>
    <div class="pillar_left" @click="createGrowRectangle"></div>
    <div class="pillar_right">
      <div class="black"><img src="../assets/images/game_fakenews/game_fakenews_stand.svg" alt=""></div>
    </div>
    <!-- 手機板 -->
    <!-- 改用transition -->
    <div class="window" id="window" :class="{ '-start': start_animation }">
      <div class="outer_box_text">
        <div class="text_window">
          <p>{{ text_small }}</p>
        </div>
      </div>
      <div class="stand_circle_photo"><img src="../assets/images/game_fakenews/game_fakenews_circle_stand.svg" alt="">
      </div>
    </div>

    <div class="black_background" id="black_background" :class="{ '-on': isVisible, '-qs_hidden': isCharacterWalking }">
    </div>
    <!-- 觸發關主手機板出現+class -on再次出現會有問題 -->
    <!-- <div class="black_background_phone" id="black_background_phone" :class="{'-start':start_animation,'-qs_hidden': isCharacterWalking}"></div>-->
    <div class="black_background_phone" id="black_background_phone" :class="{ '-start': start_animation }"></div>
    <div class="return"><router-link :to="{ name: 'game' }" @click="closeNav"><span
          :class="{ 'frontheader_menu-on': $route.name == 'game' }"> <img
            src="../assets/images/game_fakenews/game_fakenews_return.svg" class="return_photo"></span></router-link></div>
    <div class="show_text" id="show_text" :class="{ '-on': isVisible }">
      <p>{{ text_big }}</p>
      <button type="button" @click="skipButton" id="button">略過</button>
    </div>
    <div class="img_container" id="img_container" :class="{ '-on': isVisible }">
      <img src="../assets/images/game_fakenews/game_fakenews_big_stand.svg" class="big_stand">
      <img src="../assets/images/game_fakenews/game_fakenews_medium_stand.svg" class="medium_stand" alt="">
    </div>
    <!-- 題目======================================================= -->

    <div id="app_qs" class="card_show" :class="{ '-on': isCharacterWalking }">
      <div class="outside_container">
        <div class="score_bar">

          <div class="qs_number">第{{ questionNumber }}題</div>
          <div class="score">Score:{{ score }}</div>
        </div>
        <div class="container_qs">
          <div class="left_QA">
            <p class="title_qs">選項一</p>
            <div class="inner_qs">
              <div class="content_qs" v-for="(item1, index) in questionText1">
                <div v-if="current_question === index"></div>
                {{ item1.text }}
              </div>
              <p class="content_qs"></p>
              <!-- <p class="content_qs">{{ questionText1 }} </p> -->
              <p class="ans_qs">預留詳解位置，但是是要用觸發的方式才會出現,此種毒性，即使高溫加熱也無法去除。</p>
            </div>
            <button type="button" @click="addScore(index, '1')">確認</button>
          </div>
          <div class="right_QA">
            <p class="title_qs">選項二</p>
            <div class="inner_qs">
              <p class="content_qs" v-for="(item2, index) in questionText2">
                {{ item2.text }}
              </p>
              <p class="content_qs"></p>
              <!-- <p class="content_qs">{{ questionText2 }} </p> -->
              <p class="ans_qs"></p>
            </div>
            <button type="button" @click="addScore(index, '2')">確認</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 可以搭配v-if跟else -->
    <!-- <div class="correct_box">
      <div class="img_character"><img src="../assets/images/game_fakenews/correct.svg" alt=""></div>
      <div class="correct_text">
        <div class="text">
          <p>答對囉!!</p>
        </div>
        <button type="button">下一題</button>
      </div>
    </div> -->
  </div>
</template>
<script>

import { gsap } from 'gsap';
export default {
  data() {
    return {
      // 設定初始值是flase
      start_animation: false,
      bridgeSizeClass: '',  //初始化橋的
      isCharacterWalking: false, //初始化腳色的
      text_small: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的 ?",
      text_big: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的 ?",
      isVisible: false,

      // 左側的題庫
      questionText1: [
        {
          text: "馬鈴薯發芽時會產生毒素，聽說只要把發芽的芽眼切除，其他部位還是可以吃，這是真的嗎？",
          ans: "2",
          // 是否有選擇，到時候判斷式要確認不能選第二個
          choosed: null,//尚未被選擇的初始值，選了會放入值，我是給左右各代表true跟false

        },
        {
          text: "日本排放核廢水引起恐慌，食用碘鹽抗輻射可以抗輻射?",
          ans: "1",
          // 是否有選擇，到時候判斷式要確認不能選第二個
          choosed: null,
        }
      ],
      // 右側的題庫
      questionText2: [
        {
          text: "澱粉類食物，例如馬鈴薯，經過攝氏120度以上高溫炒炸，容易產生致癌物?",
          ans: "1",
          choosed: null,
        },
        {
          text: "碘如果攝取不足，成年人的話會使甲狀腺腫大，出現疲倦、代謝下降等問題?",
          ans: "2",
          choosed: null,
        }
      ],
      // 關於題目整體的預設值
      questionNumber: 1,   //題號
      current_question: 0,//每動一題要加一
      score: 0,    //分數初始
      isAnswered: false,//答案未被確認的初始值
      showNextButton: false,   //下一題的按鈕
      showAnswerBoardContent: false   //詳解   



    }
  },
  // // 讓題目下一頁會出現
  // computed: {
  //   questionText1() {
  //     return this.questionText1[this.questionNumber - 1].text;
  //   },
  //   questionText2() {
  //     return this.questionText2[this.questionNumber - 1].text;
  //   }

  // },
  methods: {
    // 點選略過鈕
    skipButton(e) {
      // alert(123);
      this.isVisible = true;
    },

    // 造橋
    createGrowRectangle() {
      // alert(123);
      this.bridgeSizeClass = '-on';
      this.isCharacterWalking = true;
      // console.log(this.bridgeSizeClass);
      // console.log(this.character_walkClass);
    },
    addScore(index, ans) {
      if (this.questionText1[this.questionNumber - 1].choosed || this.questionText2[this.questionNumber - 1] === null) {

      }
      // console.log(ans);
      // console.log(this.questionText1[0].ans);
      if (this.questionText1[this.questionNumber - 1].ans == ans || this.questionText2[this.questionNumber - 1].ans == ans) {
        console.log(this.questionText1[this.questionNumber - 1].ans)
        console.log(this.questionNumber - 1)
        alert("答對囉");
        this.questionText1[this.questionNumber - 1].ans =
          console.log(this.questionText1[this.questionNumber - 1].ans)
        // console.log(ans)
        // console.log(this.questionText2[this.questionNumber - 1].ans)
      } else {
        alert("答錯囉");
      }

    },
    // choose_answer(answer,value) {
    // if (this.questionText1[this.questionNumber - 1].choosed === null) {

    // this.questionText1[this.questionNumber - 1].choosed = answer;
    // console.log( this.questionText1[this.questionNumber - 1].choosed);
    // } else if (this.questionText2[this.questionNumber - 1].choosed === null) {
    // this.questionText2[this.questionNumber - 1].choosed = answer;
    // }

    // },


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
    // 啟動一開始的關主說明
    setTimeout(() => {
      this.start_animation = true

    }, 3000);
    // gsap.to("#window", {
    //   scaleY: 0,
    //   delay: 5,
    //   duration: 1,
    //   y: 50,
    //   ease: "power1.out"
    // });
    // gsap.to("#black_background_phone", {
    //   scaleY: 0,
    //   delay: 5,
    //   duration: 1,
    //   y: 50,
    //   ease: "power1.out"
    // });

  }
}

</script>

