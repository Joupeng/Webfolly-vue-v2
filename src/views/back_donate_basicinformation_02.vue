<template>
  <frontnav></frontnav>
  <section class="back_donate_basicinformation">
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
      <img src="/src/assets/images/donate/donate_finish_banner.svg" alt="">
    </div>
    <!-- bannerNew -->
    <front_donate_flow></front_donate_flow>

    <div class="main_block">
      <div class="inner_block">
        <h1>線上付款</h1>
        <div class="all_block">
          <!-- 左邊欄位 -->
          <div class="left_block">

            <!-- 聯絡人資料 -->
            <div>
              <p class="p_main_title">聯絡人資料</p>

              <div>
                <p class="p_title_1">姓氏</p>
                <p class="p_content">郭</p>
              </div>

              <div>
                <p class="p_title">名字</p>
                <p class="p_content">泓鈞</p>
              </div>

              <div>
                <p class="p_title">電子信箱</p>
                <p class="p_content">handsomejim1022@gmail.com</p>
              </div>

              <div>
                <p class="p_title">手機電話</p>
                <p class="p_content">0988881802</p>
              </div>
              <div>
                <p class="p_title">通訊地址</p>
                <p class="p_content">高雄市左營區崇德路103號九樓之一</p>
              </div>

            </div>


            <!-- 收據資訊 -->
            <div class="Receipt-options">
              <p class="Receipt_main_title">收據資訊</p>
              <div class="Receipt-inner">
                <p class="p_title_1">收據寄發方式</p>
                <label class="Receipt-option">
                  <input type="radio" name="Receipt" value="male" checked> 直接上傳至國稅局，免寄紙本收據
                  (為節省資源建議選此項，需填身分證字號)
                </label>
              </div>

              <div>
                <p class="p_title">收據抬頭</p>
                <p class="p_content">高雄市左營區崇德路103號九樓之一</p>
              </div>
              <div>
                <p class="p_title">身分證資料/統一編號</p>
                <p class="p_content">高雄市左營區崇德路103號九樓之一</p>
              </div>

            </div>


          </div>
          <!-- 右邊欄位 -->
          <div class="right_block">
            <p class="visa_main_title">信用卡支付與須知</p>
            <div>
              <p class="p_border">*信用卡捐款僅適用VISA、MasterCard、JCB</p>
              <p>*我們會即時進行首次信用卡款，如為定期定額捐款，次月起扣款日為每月25號。</p>
              <p>*此刷卡系統使用國際發卡組織EMV代碥規格，將自動與發卡行更新卡片有效期限。</p>
              <p>*本頁面採用喬睿科技TapPay SSL 2048 bit交易系統，直接在系統端交易，卡號不會留存本站。</p>
            </div>

            <!-- 每月捐款 -->
            <div class="donate_account">
              <div class="donate_account_inner">每月捐款NTD100</div>
            </div>


            <!-- 信用卡卡號 -->
            <div class="visa_detail_01">
              <div>
                <p>*信用卡卡號</p>
                <div class="visaImg_block"></div>
              </div>
              <input type="text" placeholder="請輸入" class="PostalCode">
            </div>
            <div class="visa_detail_column">

              <div class="visa_detail_02">
                <p>*有效期限</p>
                <input type="text" placeholder="MM/YY" class="PostalCode">
              </div>
              <div class="visa_detail_03">
                <p>*卡片背面末3碼</p>
                <input type="text" placeholder="000" class="PostalCode">
              </div>


            </div>


          </div>

        </div>

      </div>

    </div>

    <!-- 查詢捐款按鈕 -->
    <div class="donate_btn_outer">
      <router-link :to="{ name: 'donate_finish' }" class="donate_btn"><span
          :class="{ 'frontheader_menu-on': $route.name == 'donate' }">確認送出</span>
      </router-link>
    </div>





    <front_donate_subfooter></front_donate_subfooter>
  </section>


  <frontfooter></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import frontfooter from '@/components/front_footer.vue'
import front_donate_flow from '@/components/front_donate_flow.vue'
import front_donate_subfooter from '@/components/front_donate_subfooter.vue'


export default {
  components: {
    frontnav,
    frontfooter,
    front_donate_flow,
    front_donate_subfooter
  }
}
</script>