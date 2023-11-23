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

  <!-- <backfooter></backfooter> -->
  <footer class="backfooter">
    <div class="backfooter_frame">
      <router-link :to="{ name: 'home' }"><img src="../assets/images/common/logo.svg" alt="網中愚商標"></router-link>
      <div class="backfooter_text">
        <p class="backfooter_text"> 本網站為緯育TibaMe【第87期】前端工程師專業技術養成班學員作品,僅供學習、展示之用途。<br>
          參考資源：回收大百科、Stick Hero、MyGoPen、Médecins Sans Frontières</p>
        <router-link :to="{ name: 'home' }"><span>返回前台</span></router-link>
      </div>
    </div>
  </footer>
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