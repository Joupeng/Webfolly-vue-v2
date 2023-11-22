<template>
  <header class="backheader">
    <div class="right">
      <router-link to="/back_account">帳號設定</router-link>
      <router-link to="/back_login">登出</router-link>
    </div>

  </header>

  <div class="back_container">

    <!-- 側邊欄 -->
    <backaside></backaside>

    <!-- 主要欄目 -->
    <mediaNetwork></mediaNetwork>
    <!-- <mediaClass></mediaClass> -->
    <!-- <fackNews></fackNews> -->


  </div>
  <modal_warning></modal_warning>
  <!-- <category></category>
  <content></content>
  <quiz></quiz> -->




  <backfooter></backfooter>
</template>

<script>
// 載入元件
import backfooter from '@/components/back_footer.vue'
import backaside from '@/components/back_aside.vue'
import mediaNetwork from '@/components/back_mediaNetwork.vue'
import mediaClass from '@/components/back_mediaClass.vue'
import fackNews from '@/components/back_fackNews.vue'
import modal_warning from '@/components/modal/modal_warning.vue'
// import modal_category from '@/components/modal/modal_category.vue'
// import modal_content from '@/components/modal/modal_content.vue'
// import modal_quiz from '@/components/modal/modal_quiz.vue'

export default {
  components: {
    backfooter,
    backaside,
    mediaNetwork,
    mediaClass,
    fackNews,
    modal_warning,
    // modal_category,
    // modal_content,
    // modal_quiz,
  },



};

</script> 