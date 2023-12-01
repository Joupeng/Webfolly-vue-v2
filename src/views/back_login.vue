<template>
  <backloginMain></backloginMain>
  <backfooter></backfooter>
</template>

<script>
// import backheader from '@/components/backheader.vue'
import backloginMain from '@/components/back_loginMain.vue'
import backfooter from '@/components/back_footer.vue'



export default {
  components: {
    backloginMain,
    backfooter,
  },
  mounted() {
    // 接收php資料
    // fetch('http://localhost/webfolly/back_login.php', {
    //   method: 'Post',
    //   mode: 'cors',
    //   headers: {
    //     'Content-Type': 'application/json'
    //   },
    // })
  }
}
</script>