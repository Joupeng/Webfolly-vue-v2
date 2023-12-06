
<template>
  <donate_success class="donateSuccess">

    <img class="finishBanner" src="@/assets/images/donate/donate_finish_banner.svg" alt="finish_banner">
    <front_donate_flow class="donateFlow"></front_donate_flow>
    <img class="successImg" src="@/assets/images/donate/donate_success.svg" alt="donate_success">
    <div class="thanksContainer">
      <p class="p1">親愛的捐款人 你好:</p>
      <p class="p2">感謝您的捐款支持! 您的慷慨捐助，讓我們可以在媒體識讀推廣更加有信心。</p>
      <p class="p3">稍後我們將寄送付款成確認信至您的信箱(如未收到，建議可至您的垃圾信件匣
        裡查看)。若有任何問題，歡迎至電(02)xxxx-xxxx，或來信ziolin@gmial.com 與我們聯絡，或參考捐款Q&A。</p>

    </div>
  </donate_success>
</template>

<script>

import front_donate_flow from '@/components/front_donate_flow.vue'


export default {
  components: {
    front_donate_flow,
  }
}
</script>
