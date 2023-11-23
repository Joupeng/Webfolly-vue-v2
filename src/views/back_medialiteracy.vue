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
    <!-- <mediaNetwork></mediaNetwork> -->
    <!-- <mediaClass></mediaClass>
    <fackNews></fackNews>  -->



  </div>

  <backfooter></backfooter>
</template>

<script>
// 載入元件
import backfooter from '@/components/back_footer.vue'
import backaside from '@/components/back_aside.vue'
// import mediaNetwork from '@/components/back_mediaNetwork.vue'



export default {
  components: {
    backfooter,
    backaside,
    // mediaNetwork,


  },



};

</script> 