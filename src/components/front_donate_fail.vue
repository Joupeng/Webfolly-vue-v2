<template>
  <donate_fail class="donatefail">

    <img class="finishBanner" src="@/assets/images/donate/donate_finish_banner.svg" alt="finish_banner">
    <front_donate_flow class="donateFlow"></front_donate_flow>
    <img class="failImg" src="@/assets/images/donate/donate_fail.svg" alt="donate_fail">
    <div class="failMessage">
      <p class="p1">"對不起，我們無法完成您的信用卡授權
        1 分鐘後將為您返回信用卡頁面 你好</p>
      <p class="p2">
        失敗原因可能包括：<br>
        1.信用卡餘額不足 2.信用卡過期 3.國際交易被禁用 4.卡片被凍結
        5.銀行或信用卡公司拒絕交易
      </p>
      <p class="p3">請檢查您的信用卡信息，確保所有詳細信息都正確無誤，並確保您
        的帳戶有足夠的餘額來支付此交易。如果問題仍然存在，請聯繫您
        的銀行或信用卡公司以獲得進一步協助。</p>

    </div>

  </donate_fail>
</template>



<script>
import front_donate_flow from '@/components/front_donate_flow.vue'


export default {
  components: {
    front_donate_flow,
  }
}
</script>
