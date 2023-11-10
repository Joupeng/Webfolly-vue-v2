<template>
  <frontnav></frontnav>

  <div class="ImgSection">

    <img src="./images/donate-BN.svg" alt="小額捐款圖片" width="1520">

    <span>
      <p class="partone">小額捐款一起</p>
      <p class="parttwo">改善閱聽環境</p>
    </span>

  </div>

  <div class="TextSection">

    <!--網站文案(左)---------------------------------------------------->
    <div class="WebsiteText">
      <h1>
        網中愚致力於傳播正確資訊
        <br>及相關教育資源
      </h1>
      <h3>
        我們正在募集2024年的運營經費，
        <br>以協助閱聽者收到更好的報導與網站服務，
      </h3>
      <p>
        在經營多年識讀媒體平台當中，我們發現閱聽者時常閱讀到誘餌式標題
        <br>、假訊息內容並非個人意願刻意去閱讀；而是這社會充斥者過多的不良
        <br> 媒體訊息，單靠個人辨認是有一定難度。
      </p>

      <p>
        我們將協助您提升媒體識讀能力—
        <br>［媒體識讀資源］: 提供好媒體資源，讓閱聽者有更多好的閱聽平台。
        <br>［關於假訊息］: 讓閱聽者認識假訊息及防範對策。
        <br>［關於誘餌式標題］: 閱聽者從中了解誘餌式標題內容。
      </p>

      <p>
        也持續優化網頁與閱聽者保持良好互動—
        <br>［趣味小測驗］: 透過遊戲化的方式讓閱聽人更瞭解議題。
        <br>［確認謠言］: 閱聽者透過查證，來確認資訊的真偽。
      </p>

      <p>
        透過線上議題說明與遊戲化的教育，我們想與閱聽者相互分享，並一同
        <br> 試著改變這社會媒體的結構，讓未來有更正確的媒體內容。每個人「擁
        <br> 有良好媒體素養」並非不可能，我們都有正面互相影響的力量，
        <br>一同推廣議題 ，來推動現今媒體的改變。
      </p>
    </div>

    <!--垂直線------------------------------------------------------->
    <div class="VerticalLine"></div>

    <!--捐款方案(右)------------------------------------------------->
    <div class="DonationPlan">
      <h1>捐款方案</h1>

      <div class="DonationSteps">

        <div class="item">
          <h2>1</h2>
          <p>捐款內容</p>
        </div>

        <div class="RightArrow">
          <img src="./images/donate-rightarrow.svg" alt="右邊指示">
        </div>

        <div class="item">
          <h2>2</h2>
          <p>填寫資料</p>
        </div>

        <div class="RightArrow">
          <img src="./images/donate-rightarrow.svg" alt="右邊指示">
        </div>

        <div class="item">
          <h2>3</h2>
          <p>線上付款</p>
        </div>

        <div class="RightArrow">
          <img src="./images/donate-rightarrow.svg" alt="右邊指示">
        </div>

        <div class="item">
          <h2>4</h2>
          <p>付款狀態</p>
        </div>

      </div>

      <div class="DonationCategory">
        <h3>捐款類別</h3>
        <div class="item">
          <div></div>
          <p>單筆捐款</p>
        </div>
      </div>

      <div class="DonationAmount">
        <h3>捐款金額</h3>
        <div class="AmountItem">
          <p>100</p>
          <p>500</p>
          <p>1000</p>
          <p>2000</p>
        </div>
      </div>

      <a href="./shop_list.html">
        <button class="btn">
          <span>
            確認送出
          </span>
        </button>
      </a>

    </div>

  </div>

  <!--水平線---------------------------------------------------------->
  <hr>

  <!--連結區塊-------------------------------------------------------->
  <div class="linkBlock">
    <div class="PageLink">
      <a href="#">
        <p>捐款FAQ</p>
      </a>
      <a href="#">
        <p>捐款徵信紀錄</p>
      </a>
      <a href="#">
        <p>關於我們</p>
      </a>
      <a href="#">
        <p>隱私保護政策</p>
      </a>
    </div>

    <div class="lnformation">
      <p>網中愚是一個獨立的媒體報導組織，致力於傳播正確資訊及相關教育資源，您的捐款將用於支持媒體識讀推廣議題的工作，
        <br>為廣大的閱聽者擁有良好的閱讀體驗。
      </p>
      <ul>
        <li>財團法人網中愚基金會為台灣註冊公益組織 / 許可文號：衛部醫字第1111888961號。</li>
        <li>勸募核准字號：衛部救字第1111888961號。</li>
        <li>您提供的資料絕對保密，所有資料的使用均嚴格遵守我們的隱私與個人資料保護政策。</li>
        <li>依財團法人法第25條規定，除捐贈者事先以書面表示反對外，本會需主動公開捐贈者姓名及金額。如不同意公開，請與本會聯繫。</li>
        <li>如有疑問或需要聯繫，請來信ziolin@gmial.com，或致電(02)xxxx-xxxx。</li>
      </ul>
    </div>
  </div>

  <frontfooter></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import frontfooter from '@/components/front_footer.vue'

export default {
  components: {
    frontnav,
    frontfooter,
  }
}
</script>