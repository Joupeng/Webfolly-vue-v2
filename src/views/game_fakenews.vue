<template>
  <div class="game_fakenews">
    <!-- 監聽腳色走到橋中間之後才觸發題目出現-->
    <div class="yellow" :class="{ '-on': click_text }" @click="createGrowRectangle"><img
        src="../assets/images/game_fakenews/game_fakenews_yellow.svg" class="yellow_img" alt="">
      <div id="text_for_click" :class="{ '-on': click_text }">請點選吉祥物</div>
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

    <div class="black_background" id="black_background" :class="{ '-on': isVisibleBlack }">
    </div>
    <!-- 觸發關主手機板出現+class -on再次出現會有問題 -->
    <!-- <div class="black_background_phone" id="black_background_phone" :class="{'-start':start_animation,'-qs_hidden': isCharacterWalking}"></div>-->
    <div class="black_background_phone" id="black_background_phone"
      :class="{ '-start': start_animation, '-on': isQsappear }"></div>
    <div class="return"><router-link :to="{ name: 'game' }"><span
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
    <div class="score_bar">
      <div class="qs_number">第{{ questionNumber }}題</div>
      <div class="score">Score:{{ score }}</div>
    </div>
    <div id="app_qs" class="card_show" :class="{ '-on': isCharacterWalking, '-result_correct': isResult }">
      <div class="outside_container">

        <div class="container_qs">
          <div class="left_QA">
            <p class="title_qs">選項一</p>
            <div class="inner_qs">
              <div class="content_qs" v-for="(item1, index) in questionText1">
                <div v-if="current_question === index">
                  {{ item1.text }}
                </div>
              </div>

              <div class="ans_qs" v-for="(item1, index) in questionText1" :class="{ '-on': showAnswerQs }">
                <div v-if="current_question === index">{{ item1.answer }}</div>
              </div>
            </div>
            <!-- <button type="button" @click="nextQs" >下一題</button> -->
            <button type="button" @click="nextQs" v-if="isCorrectFail && questionNumber < totalQuestions">下一題</button>
            <button type="button" @click="addScore(index, '1', '1')" v-if="!isCorrectFail && !isCorrectOk">正確</button>

            <button type="button" @click="showScore"
              v-if="isCorrectFail && questionNumber === totalQuestions">看分數</button>
          </div>
          <div class="right_QA">
            <p class="title_qs">選項二</p>
            <div class="inner_qs">
              <div class="content_qs" v-for="(item2, index) in questionText2">
                <div v-if="current_question === index">
                  {{ item2.text }}
                </div>
              </div>
              <!-- <div class="ans_qs" v-for="(item2, index) in questionText2" :class="{ '-on': showAnswerQs }"></div> -->
              <div class="ans_qs" v-for="(item2, index) in questionText2" :class="{ '-on': showAnswerQs }">
                <div v-if="current_question === index">{{ item2.answer }}</div>
              </div>
            </div>
            <button type="button" @click="addScore(index, '2', '2')" :class="{ '-fail': isCorrectFail }">正確</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 可以搭配v-if跟else -->
    <!-- 故意讓相同的true判斷加上的class相同比較好確認 -->
    <!-- v-if="questionText1[(questionNumber - 1)].choosed || questionText2[(questionNumber - 1)].choosed != null" -->
    <div class="correct_box" :class="{ 'appear': isCorrect }">
      <div v-if="isCorrectOk" class="img_character"><img src="../assets/images/game_fakenews/correct.svg" alt=""></div>
      <div v-else="isCorrectOk" class="img_character"><img src="../assets/images/game_fakenews/fail.svg" alt=""></div>
      <div class="correct_text">
        <div class="text">
          <p v-if="isCorrectOk">答對囉!!</p>
          <p v-else="isCorrectOk">答錯囉!!</p>
        </div>
        <!-- 按鈕吉祥物旁 -->
        <button type="button" @click="nextQs" v-if="questionNumber < totalQuestions">下一題</button>
        <button type="button" @click="showAnswer">看解答</button>
        <button type="button" @click="showScore" v-if="questionNumber == totalQuestions">看分數</button>
      </div>
    </div>
    <div class="score_result" v-if="isEnd">
      <div class="score_best">
        <div class="score_text">
          <div class="title_name">優秀的閱聽者</div>
          <div class="score_total">
            <div class="score_title">你的分數</div>
            <p class="score">{{ score }}</p>
          </div>
          <div class="button_for_again"> <button type="button" @click="playAgain">再玩一次</button></div>
        </div>
        <div class="score_img">
          <!-- 用v-if來做文字 -->
          <div class="champion"><img src="../assets/images/game_fakenews/game_fakenews_champion.svg" alt=""></div>
          <!-- <div class="text_result">錯誤題數:</div> -->
        </div>
      </div>
      <!-- <div class="soce"></div>
    <div></div>
    <div></div> -->
    </div>
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
      text_small: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的，請點選小黃或是小黃站立的柱子，啟動遊戲吧 ?",
      text_big: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的,請點選小黃或是小黃站立的柱子，啟動遊戲吧 ?",
      isVisible: false,
      isVisibleBlack: false,
      isQsappear: false,   //手機黑幕跟qs出現
      click_text: false,
      // 完成遊戲人數
      // people_finish: 0,


      // 可以寫成一兩題為一個的寫法
      // quections: [
      //   {
      //     choosed: null,//尚未被選擇的初始值，選了會放入值，我是給左右各代表true跟false
      //     answers: [
      //       {
      //         text: '馬鈴薯發芽時會產生毒素，聽說只要把發芽的芽眼切除，其他部位還是可以吃，這是真的嗎？',
      //         answer: '"解答:當馬鈴薯發芽時，整顆馬鈴薯產生大量的茄鹼，此種毒性，即使高溫加熱也無法去除。'
      //       },
      //       {
      //         text: '"澱粉類食物，例如馬鈴薯，經過攝氏120度以上高溫炒炸，容易產生致癌物?"',
      //         answer: '"解答:s。'
      //       }
      //     ],
      // 直接定義答案內容
      //     ans: 1
      //   }

      // ],

      // 左側的題庫
      questionText1: [
        // {
        //   text: "馬鈴薯發芽時會產生毒素，聽說只要把發芽的芽眼切除，其他部位還是可以吃，這是真的嗎？",
        //   ans: "2",
        //   // 是否有選擇，到時候判斷式要確認不能選第二個
        //   choosed: null,//尚未被選擇的初始值，選了會放入值，我是給左右各代表true跟false
        //   answer: "解答:當馬鈴薯發芽時，整顆馬鈴薯產生大量的茄鹼，此種毒性，即使高溫加熱也無法去除。"

        // },
        // {
        //   text: "日本排放核廢水引起恐慌，食用碘鹽抗輻射可以抗輻射?",
        //   ans: "2",
        //   // 是否有選擇，到時候判斷式要確認不能選第二個
        //   choosed: null,
        //   answer: "解答:因為碘鹽中的碘元素含量遠低於需要達到防輻射效果的劑量。 且若是要達到防輻射的量，可能會過量，造成高血壓等併發症。"
        // },
        // {
        //   text: "包裝飲用水也會過期? ",
        //   ans: "1",
        //   // 是否有選擇，到時候判斷式要確認不能選第二個
        //   choosed: null,
        // },
        // {
        //   text: "植物肉組成很多元，但幾乎都是植物性蛋白，包含豌豆蛋白、大豆蛋白等 ",
        //   ans: "1",
        //   // 是否有選擇，到時候判斷式要確認不能選第二個
        //   choosed: null,
        //   answer: ""
        // }
      ],
      // 右側的題庫
      questionText2: [
        // {
        //   text: "澱粉類食物，例如馬鈴薯，經過攝氏120度以上高溫炒炸，容易產生致癌物?",
        //   ans: "2",
        //   choosed: null,
        //   answer: ""
        // },
        // {
        //   text: "碘如果攝取不足，成年人的話會使甲狀腺腫大，出現疲倦、代謝下降等問題?",
        //   ans: "2",
        //   choosed: null,
        //   answer: ""
        // },
        // {
        //   text: "純蜂蜜放冰箱會結晶，是一種變質現象?",
        //   ans: "1",
        //   choosed: null,
        //   answer: "解答:市售蜂蜜含水量較低，放冰箱會結晶，但這不是「變質」"
        // },
        // {
        //   text: "美國新上市培育雞肉來自人體細胞?",
        //   ans: "1",
        //   choosed: null,
        //   answer: "解答:據查證，其產品是由雞細胞培育而成，完全沒有人體細胞。"
        // }
      ],
      // 關於題目整體的預設值

      totalQuestions: 4,  //總題數設定
      questionNumber: 1,   //題號
      current_question: 0,//每動一題要加一
      score: 0,    //分數初始
      // isAnswered: false,//答案未被確認的初始值
      showAnswerQs: false, //解答顯現
      isCorrect: false,   //判斷答案已答會出現吉祥物
      isResult: false,  //  QS要出現，因為初始是動畫這個是用來代表直接出現的狀態
      isCorrectOk: false,    //為答對的選項
      isCorrectFail: false,    //為答錯的選項
      isEnd: false,




    }
  },
  methods: {
    // 點選略過鈕
    skipButton(e) {
      // alert(123);
      this.isVisible = true;
      this.isVisibleBlack = true;

      gsap.to('#text_for_click', { x: 15, duration: 1, repeat: -1, yoyo: true })
    },

    // 造橋
    createGrowRectangle() {
      // alert(123);
      this.bridgeSizeClass = '-on';
      this.isCharacterWalking = true;
      this.start_animation = false;
      this.click_text = true;
      // console.log(this.bridgeSizeClass);
      // console.log(this.character_walkClass);
      // 計時讓黑幕在造橋完成然後腳色到位黑幕跟題目一起出現
      setTimeout(() => {
        // alert('123')
        // this.isVisible = false;
        this.isVisibleBlack = false;
        this.isQsappear = true;
      }, 5000)

    },
    // questionSet選左選右
    addScore(index, ans, questionSet) {
      if (questionSet == 1) {

        // alert(typeof (ans))
        // alert(typeof (this.questionNumber))
        if (this.questionText1[this.questionNumber - 1].ans === ans) {
          // console.log(this.questionNumber - 1)

          // alert("答對囉");
          // alert('123');
          this.questionText1[this.questionNumber - 1].choosed = ans
          this.isCorrect = true;
          this.isCorrectOk = true;
          this.isCharacterWalking = false;
          this.score += 25;
          this.isResult = false;


        } else {
          // alert("答錯囉");
          // alert('123');
          //this.questionText1[this.questionNumber -1].an
          //觸發動畫可以透過加上某個class，觸發原因是判定為錯誤
          //然後透過時間差先動畫5秒後才是吉祥物(setTimeout)，
          this.questionText1[this.questionNumber - 1].choosed = ans
          this.isCorrect = true;
          this.isResult = false;
          this.isCharacterWalking = false;
          this.isCorrectFail = true;
        }

      } else {
        if (this.questionText2[this.questionNumber - 1].ans === ans) {
          // console.log(this.questionNumber - 1)
          // alert("答對囉");
          this.questionText2[this.questionNumber - 1].choosed = ans
          this.isCorrect = true;
          this.isCharacterWalking = false;
          this.score += 25;
          // 把初始設定放在答對時，再點選下一題再進行true的觸發，Qs才可以在吉祥物出現的時候消失 this.isResult = false; this.isCharacterWalking = false;
          this.isCorrectOk = true;
          this.isResult = false;
          this.isCorrect = true;
        } else {
          // alert("答錯囉");
          this.questionText2[this.questionNumber - 1].choosed = ans
          this.isCorrect = true;
          this.isResult = false;
          this.isCharacterWalking = false;
          this.isCorrectOk = false;
          this.isCorrectFail = true;
        }
      }
      // console.log(this.questionText2[this.questionNumber - 1].ans)
      // console.log(ans)
      // this.choosed = ans

    },
    nextQs() {
      // 題目判斷要全部回到false
      this.isCorrect = false;
      this.isResult = true;
      this.isCorrectOk = false;
      this.isCorrectFail = false;
      // 題號變成2
      this.questionNumber += 1;
      // 題目變成第二題
      this.current_question += 1;
      this.showAnswerQs = false;
    },
    showAnswer() {
      this.isCorrect = false;
      this.isResult = true;
      this.showAnswerQs = true;
      // 這樣會出現下一題的按鈕
      this.isCorrectFail = true;

    },
    showScore() {
      this.isEnd = true;
      this.isCorrect = false;
      this.isResult = false;
      this.people_finish += 1;
      // this.isQsappear = false;
      // alert('123');
    },
    playAgain() {
      // alert('123');
      // 分數牌消失
      this.isEnd = false;
      this.questionNumber = 1;  //題號
      this.current_question = 0;//每動一題要加一
      this.score = 0;    //分數初始
      // isAnswered: false,//答案未被確認的初始值
      this.showAnswerQs = false; //解答顯現
      this.isCorrect = false;   //判斷答案已答會出現吉祥物
      this.isResult = true;  //  QS要出現，因為初始是動畫這個是用來代表直接出現的狀態
      this.isCorrectOk = false;    //為答對的選項
      this.isCorrectFail = false;   //為答錯的選項
      // 將填入的答案通通拿掉
      this.questionText1.forEach(item => {
        item.choosed = null;
      });

      this.questionText2.forEach(item => {
        item.choosed = null;
      });
    },
    // 螢幕手機限制橫向
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
    // console.log(456);
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

    // 資料庫串接
    //上server要改成相對路徑
    // fetch('http://localhost/API/game_fakenews.php'
    fetch('API/game_fakenews.php', {
      method: 'POST',
      // 非同源
      // mode: 'cors',
      headers: {
        'Content-Type': 'application/json'
      },
    })
      // 處理從伺服器返回的響應（resp 是響應對象），轉成json檔格式
      .then(resp => resp.json())
      // 處理從伺服器接收到的數據（questions 是解析後的 JSON 數據）
      // 要想一下迭代的方式
      .then(qs_items => {
        // console.log(qs_items);
        // console.log(this.questionText1);
        this.questionText1 = qs_items.map(item_qs => {

          return {
            text: item_qs.LTEXT,
            ans: item_qs.ANSWER_LEFT,
            choosed: null,
            answer: item_qs.DESCRIPTION_LEFT
          }
        }),
          this.questionText2 = qs_items.map(item_qs => {

            return {
              text: item_qs.RTEXT,
              ans: item_qs.ANSWER_RIGHT,
              choosed: null,
              answer: item_qs.DESCRIPTION_RIGHT
            }
          })
        // 分兩側可能的寫法
        // this.qs_items = qs_items.map(showItem => {
        //   if (showItem.SIDE === 1) {
        //     this.questionText1.push({
        //       text: showItem.LTEXT,
        //       ans: showItem.ANSWER,
        //       // choosed: null,
        //       answer: showItem.DESCRIPTION
        //     });
        //   } else if (showItem.SIDE === 2) {
        //     this.questionText2.push({
        //       text: showItem.RTEXT,
        //       // ans: showItem.ANSWER,
        //       choosed: null,
        //       // answer: showItem.DESCRIPTION
        //     });
        //   }
        // });
      })

  },
  // 摧毀，這樣其他頁不會因為寬大於長而跳視窗
  beforeUnmount() {
    // console.log(4444);
    window.removeEventListener('resize', this.checkOrientation);

  }

}

</script>