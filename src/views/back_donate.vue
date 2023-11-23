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

    <!-- 捐款管理 -->

    <!-- <donteManage v-if="showDonateFAQOpen"></donteManage> -->


    <!-- 捐款faq -->
    <!-- <donteFAQ v-if="showDonateFAQOpen"></donteFAQ> -->

    <!-- <pagination></pagination> -->




  </div>
  <backfooter></backfooter>
</template>

<script>
import backfooter from '@/components/back_footer.vue'
import backaside from '@/components/back_aside.vue'
import pagination from '@/components/pagination.vue'
import donteManage from '@/components/back_donateManage.vue'
import donteFAQ from '@/components/back_donateFAQ.vue'

export default {
  components: {
    backfooter,
    backaside,
    donteManage,
    donteFAQ,
    pagination,
  },


}
</script>