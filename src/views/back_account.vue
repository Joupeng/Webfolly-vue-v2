<template>
  <!-- <backheader></backheader>   -->
  <backaccountMain></backaccountMain>
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
// import backheader from '@/components/backheader.vue'
import backaccountMain from '@/components/back_accountMain.vue'
// import backfooter from '@/components/back_footer.vue'

export default {
  components: {
    // backheader,
    backaccountMain,
    // backfooter,
  }
}
</script>