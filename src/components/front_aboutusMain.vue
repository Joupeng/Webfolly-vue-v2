

<template>
  <div class="front_aboutusMain">
    <!-- banner -->
    <div class="banner">
      <img class="img" src="@/assets/images/aboutus/aboutus_banner.svg" alt="aboutus_banner">
      <div class="divLeft"><img src="@/assets/images/aboutus/aboutus_blue.svg" alt="aboutus_blue"
          :class="{ '-disappear': isDisappeared }" @click="disappear">
      </div>
      <div class="divRight"><img src="@/assets/images/aboutus/aboutus_happy.svg" alt="aboutus_happy"
          :class="{ '-appear': !isDisappeared }" @click="disappear"></div>
    </div>
    <!-- description -->
    <div class="description">
      <!-- purpose -->
      <div class="purpose">
        <div class="title">
          源起
        </div>
        <div class="text">
          <div class="subtitle">我們是一群在意媒體環境的未來工程師</div>
          <div class="para">
            在成為工程師的路上，我們七個人相遇了，我們發現我們都仰賴網路媒體獲取新知，但都無法信任媒體。我們決定用自己的力量改變，希望透過一個人人都可以輕鬆操作、兼具教育及趣味性的網站，讓媒體、平台、閱聽人意識到假訊息與誘餌式標題的嚴重性，還網路世界一個客觀公正的樣貌。我們相信，你我的每一次點擊，都是改變媒體環境的契機。
          </div>
        </div>
      </div>


      <!-- action -->
      <div class="action">
        <div class="title">
          行動
        </div>
        <div class="text">
          <div class="subtitle">「網中愚」誕生 —— 呼籲閱聽人不傳播假訊息、拒絕點擊誘餌式標題</div>
          <div class="para">
            不太喜歡現今嗜血的新聞環境的我們，集眾人之力開發了「網中愚」，致力於傳播正確資訊及相關教育資源。網中愚彙整了假訊息、誘餌式標題的完整資訊與因應對策。除了有確認謠言的功能幫助閱聽人查證訊息，還有趣味小測驗讓閱聽人在遊戲中學習。未來，我們會持續經營，歡迎滑到網站最下方點選「捐款支持」幫助我們繼續擴大服務量能。
          </div>
        </div>
      </div>
      <!-- memberIntroduction -->
      <div class="member">
        <div class="title">團隊介紹</div>
        <div class="memberCard">
          <div class="leftBox">
            <div class="person">
              <div class="name colorOne">范芯瑜
                <img class="img  colorOne" src="@/assets/images/aboutus/aboutus_mascot1.svg" alt="mascot1">

              </div>
              <div class="motto">想要每天都能好好吃飯!</div>
            </div>
            <div class="task">
              擔任團體專題副組長<br>
              管理員帳號管理：功能規劃、介面設計<br>
              測驗管理：功能規劃、介面設計、前端開發<br>
              捐款管理：功能規劃、介面設計、前端開發<br>
              後端：資料庫建置、撰寫API、資料串接與測試<br>

            </div>
          </div>
          <div class="rightBox">
            <div class="tasks colorOne ">
              <div class="item">前端開發</div>
              <div class="item">後端開發</div>
              <div class="item">介面設計</div>
              <div class="item">後台規劃</div>

            </div>
            <div class="memberImg"><img src="@/assets/images/aboutus/member1.png" alt="member1"></div>
          </div>

        </div>

        <div class="memberCard">
          <div class="leftBox">
            <div class="person">
              <div class="name colorTwo">彭柔芝
                <img class="img" src="@/assets/images/aboutus/aboutus_mascot2.svg" alt="mascot2">

              </div>
              <div class="motto">專注於前方！</div>
            </div>
            <div class="task">
              擔任團體專題組長<br>
              趣味小測驗：介面設計<br>
              假訊息測驗：內容規劃、介面設計、前端開發<br>
              全站動態特效：特效規劃、前端開發<br>
              後端：資料庫建置、撰寫API、資料串接與測試<br>
            </div>
          </div>
          <div class="rightBox">
            <div class="tasks colorTwo">
              <div class="item">專案管理</div>
              <div class="item">前端開發</div>
              <div class="item">後端開發</div>
              <div class="item">介面設計</div>

            </div>
            <div class="memberImg "><img class="img" src="@/assets/images/aboutus/member2.png" alt="member2"></div>
          </div>

        </div>
        <div class="memberCard">
          <div class="leftBox">
            <div class="person">
              <div class="name colorthree">謝佳真
                <img class="img" src="@/assets/images/aboutus/aboutus_mascot3.svg" alt="mascot3">

              </div>
              <div class="motto">Honest, Passion, Learning, Creative.</div>
            </div>
            <div class="task">

              後台管理員帳號管理：前端開發<br>
              後端：資料庫建置、撰寫API、資料串接與測試<br>
              關於我們：前端開發<br>
              假訊息測驗：內容規劃<br>
              媒體識讀：內容規劃<br>
            </div>
          </div>
          <div class="rightBox">
            <div class="tasks colorthree">
              <div class="item">前端開發</div>
              <div class="item">後端開發</div>
              <div class="item">介面設計</div>
              <div class="item">後台規劃</div>

            </div>
            <div class="memberImg"><img class="img" src="@/assets/images/aboutus/member3.png" alt="member3"></div>
          </div>

        </div>
        <div class="memberCard">
          <div class="leftBox">
            <div class="person">
              <div class="name colorFour">郭泓鈞
                <img class="img" src="@/assets/images/aboutus/aboutus_mascot4.svg" alt="mascot4">

              </div>
              <div class="motto">To be or not to be. That is a question.</div>
            </div>
            <div class="task">
              關於假訊息：介面設計、前端開發<br>
              捐款支持：介面設計、前端開發<br>
              媒體識讀資源：介面設計、前端開發<br>
              全站動態特效：特效規劃、前端開發<br>
              後端：資料庫建置、撰寫API、資料串接與測試<br>
            </div>
          </div>
          <div class="rightBox">
            <div class="tasks colorFour">
              <div class="item">前端開發</div>
              <div class="item">後端開發</div>
              <div class="item">介面設計</div>
              <div class="item">後台規劃</div>

            </div>
            <div class="memberImg"><img src="@/assets/images/aboutus//member4.jpg" alt="member4"></div>
          </div>

        </div>



      </div>

    </div>



  </div>
</template>

<script>
export default {
  data() {
    return {
      isDisappeared: false,
    }
  },
  methods: {
    disappear() {
      this.isDisappeared = !this.isDisappeared;
    },
  }

}
</script>