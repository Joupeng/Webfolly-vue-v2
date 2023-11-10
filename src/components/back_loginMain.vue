<template>
  <backlogin class="backloginMain">
    <div class="header"></div>
    <div class="body">
      <div class="logo"><img class="img" src="../images/common/logo.svg"></div>
      <form class="form" @submit.prevent="handleLogin">
        <!-- 輸入名稱/密碼/ -->
        <input class="unified_input input" type="text" placeholder="請輸入使用者名稱" v-model="userName"><br>
        <!-- 輸入驗證碼 -->
        <input class="unified_input input" type="password" placeholder="請輸入密碼" v-model="password"><br>
        <!-- 輸入驗證碼 -->
        <div class="validation">
          <input class=" unified_input input" type="text" placeholder="請輸入驗證碼(不分大小寫)" v-model="validcode">
          <div class="validcode"> 驗證碼套件還沒放</div>
          <!-- 驗證碼參考 https://codepen.io/ayugioh2003/pen/VwKozNo?editors=1011 -->
        </div><br>
        <!-- 輸入驗證碼 -->
        <input class="btn" type="submit" value="登入"><br>
        <!-- 輸入驗證碼 -->
        <input class=" btn_PW" type="submit" value="忘記密碼" @click="forgotPassword"><br>
      </form>
    </div>
  </backlogin>
</template>


<script>

export default {
  data() {
    return {
      userName: '',
      password: '',
      validcode: '',
    }
  },
  methods: {

    handleLogin() {
      // 判斷名稱或密碼
      if (this.userName.trim() != '' && this.password.trim() != '' && this.validcode.trim() != '') {
        this.$router.push('/back/account');
      }
      if (this.userName.trim() === '') {
        alert('請輸入使用者名稱');
      } else {
        alert(this.userName);
      }
      if (this.password.trim() === '') {
        alert('請輸入密碼');
      } else {
        alert(this.password);
      }
      if (this.validcode.trim() === '') {
        alert('請輸入驗證碼');
      } else {
        alert(this.validcode);
      }
    },
    forgotPassword() {
      // 導向page back_password
      this.$router.push('/back/password');
    }
  }
}
</script>



