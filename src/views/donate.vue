<template>
  <frontnav></frontnav>

  <section class="donate">
    <!-- banner -->
    <!-- <div class="ImgSection">
      <div class="p_block">
        <p class="partone">小額捐款</p>
        <p class="parttwo">一起改善閱聽環境</p>
      </div>
    </div> -->
    <!-- banner -->

    <!-- bannerNew -->
    <div class="banner">
      <img src="../assets/images/donate/donate_finish_banner.svg" alt="">
    </div>
    <!-- bannerNew -->

    <div class="TextSection">

      <!--網站文案(左)---------------------------------------------------->
      <div class="black_line_left">
        <div class="WebsiteText">
          <h1>
            網中愚致力於傳播正確資訊及相關教育資源
          </h1>
          <h3>
            我們正在募集2024年的運營經費，
            以協助閱聽者收到更好的報導與網站服務，
          </h3>
          <p>
            在經營多年識讀媒體平台當中，我們發現閱聽者時常閱讀到誘餌式標題
            、假訊息內容並非個人意願刻意去閱讀；而是這社會充斥者過多的不良
            媒體訊息，單靠個人辨認是有一定難度。
          </p>

          <p>
            我們將協助您提升媒體識讀能力:
            <br>［媒體識讀資源］: 提供好媒體資源，讓閱聽者有更多好的閱聽平台。
            <br>［關於假訊息］: 讓閱聽者認識假訊息及防範對策。
            <!-- <br>［關於誘餌式標題］: 閱聽者從中了解誘餌式標題內容。 -->
          </p>

          <p>
            也持續優化網頁與閱聽者保持良好互動:
            <br>［趣味小測驗］: 透過遊戲化的方式讓閱聽人更瞭解議題。
            <br>［確認謠言］: 閱聽者透過查證，來確認資訊的真偽。
          </p>

          <p>
            透過線上議題說明與遊戲化的教育，我們想與閱聽者相互分享，並一同
            試著改變這社會媒體的結構，讓未來有更正確的媒體內容。每個人「擁
            有良好媒體素養」並非不可能，我們都有正面互相影響的力量，
            一同推廣議題 ，來推動現今媒體的改變。
          </p>
        </div>
      </div>


      <!--捐款方案(右)------------------------------------------------->
      <div class="black_line_right">
        <div class="DonationPlan">
          <h1>捐款方案</h1>

          <div class="DonationSteps">

            <div class="item">
              <h2 class="h2_yellow">1</h2>
              <p class="p_bold">捐款內容</p>
            </div>

            <div class="RightArrow">
              <img src="../assets/images/donate/donate_rightarrow.svg" alt="右邊指示">
            </div>

            <div class="item">
              <h2>2</h2>
              <p>填寫資料</p>
            </div>

            <div class="RightArrow">
              <img src="../assets/images/donate/donate_rightarrow.svg" alt="右邊指示">
            </div>

            <div class="item">
              <h2>3</h2>
              <p>線上付款</p>
            </div>

            <div class="RightArrow">
              <img src="../assets/images/donate/donate_rightarrow.svg" alt="右邊指示">
            </div>

            <div class="item">
              <h2>4</h2>
              <p>付款狀態</p>
            </div>

          </div>

          <div class="DonationCategory">
            <h3>捐款類別</h3>

            <div class="custom-checkbox">
              <div class="checkbox_img"></div>
              <p>單筆捐款</p>
            </div>

          </div>

          <div class="DonationAmount">
            <h3>捐款金額</h3>

            <div class="donateOption">
              <input class="number" type="text" value="100" readonly :class="{ '-on': isChoose === 100 }"
                @click="handleIsChoose(100)">
              <input class="number" type="text" value="500" readonly :class="{ '-on': isChoose === 500 }"
                @click="handleIsChoose(500)">
              <input class="number" type="text" value="1000" readonly :class="{ '-on': isChoose === 1000 }"
                @click="handleIsChoose(1000)">
              <input class="number" type="text" value="2000" readonly :class="{ '-on': isChoose === 2000 }"
                @click="handleIsChoose(2000)">
            </div>

          </div>
          <!-- 查詢捐款按鈕 -->
          <button class="donate_btn" @click="handleDonation()">確認送出</button>
        </div>
      </div>
    </div>


    <front_donate_subfooter></front_donate_subfooter>

  </section>
  <frontfooter></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import front_donate_flow from '@/components/front_donate_flow.vue'
import front_donate_subfooter from '@/components/front_donate_subfooter.vue'

import frontfooter from '@/components/front_footer.vue'




export default {
  components: {
    frontnav,
    frontfooter,
    front_donate_flow,
    front_donate_subfooter
  },

  data() {
    return {
      isChoose: 100,
    }
  },

  methods: {
    // 設定選取金額的style加上-on
    handleIsChoose(value) {
      this.isChoose = this.isChoose === value ? null : value;
    },
    handleDonation() {
      document.cookie = '';
      document.cookie = `donationAmt=${this.isChoose}`;
      console.log(this.isChoose)
      this.$router.push(`/donate_basicinformation`)
    }
  }
}
</script>