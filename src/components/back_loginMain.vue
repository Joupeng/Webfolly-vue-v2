<template>
  <backlogin class="backloginMain">
    <div class="header"></div>
    <div class="body">
      <div class="logo"><img class="img" src="../assets/images/common/logo.svg"></div>
      <form class="form" @submit.prevent="handleLogin">
        <!-- 輸入名稱/密碼/ -->
        <input class="unified_input input" type="text" placeholder="請輸入使用者名稱" v-model="userName"><br>
        <!-- 輸入驗證碼 -->
        <input class="unified_input input" type="password" placeholder="請輸入密碼" v-model="password"><br>
        <!-- 輸入驗證碼 -->
        <div class="validation">
          <input class=" unified_input input" type="text" placeholder="請輸入驗證碼(不分大小寫)" v-model="validcode">

          <div class="validcode" id="validcode">{{ codeGenerator() }} </div>

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
      userName: "",
      password: "",
      validCode: "",

    }
  },
  methods: {

    handleLogin() {
      // 判斷名稱或密碼

      if (this.userName.trim() != '' && this.password.trim() != '' && this.validcode.trim() != '') {
        this.$router.push('/back_account');
      }
      if (this.userName.trim() === '') {
        // alert('請輸入使用者名稱');
      } else {
        // alert('請輸入正確的使用者名稱')
      }
      if (this.password.trim() === '') {
        // alert('請輸入密碼');
      } else {
        alert(this.password);
      }
      if (this.validcode.trim() === '') {
        alert('請輸入驗證碼');
      } else if (this.validcode.trim().toUpperCase() === codeGenerator().value
      ) {
        alert('驗證碼正確');
      } else {
        alert('驗證碼錯誤');
      }
    },
    forgotPassword() {
      // 導向page back_password
      this.$router.push('/back_password');
    },


    codeGenerator() {
      // 改成英文字母
      let letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      let validCode = "";
      for (let i = 1; i <= 4; i++) {

        let randomIndex = Math.floor(Math.random() * letters.length);
        validCode += letters.charAt(randomIndex);
      }
      return validCode

    }


  },
  mounted() {
    this.codeGenerator()

  }

}
</script>



