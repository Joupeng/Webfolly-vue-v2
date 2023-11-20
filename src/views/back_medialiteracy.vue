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
  <warning></warning>
  <category></category>
  <content></content>



  <backfooter></backfooter>
</template>

<script>
// 載入元件
import backfooter from '@/components/back_footer.vue'
import backaside from '@/components/back_aside.vue'
import mediaNetwork from '@/components/back_mediaNetwork.vue'
import mediaClass from '@/components/back_mediaClass.vue'
import fackNews from '@/components/back_fackNews.vue'
import warning from '@/components/modal/warning.vue'
import category from '@/components/modal/category.vue'
import content from '@/components/modal/content.vue'

export default {
  components: {
    backfooter,
    backaside,
    mediaNetwork,
    mediaClass,
    fackNews,
    warning,
    category,
    content,
  },



};

</script> 