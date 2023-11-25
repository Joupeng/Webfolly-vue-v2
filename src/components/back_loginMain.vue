<template>
  <backlogin class="backloginMain">
    <div class="header"></div>
    <div class="body">
      <div class="logo"><img class="img" src="@/assets/images/common/logo.svg"></div>
      <div class="form">
        <!-- <form class="form" @submit.prevent="handleLogin"> -->
        <!-- 輸入名稱/密碼/ -->



        <input class="unified_input input" type="text" placeholder="請輸入使用者名稱" v-model.trim="account" required><br>

        <!-- 輸入驗證碼 -->
        <input class="unified_input input" type="password" placeholder="請輸入密碼" v-model="password" required><br>
        <!-- 輸入驗證碼 -->
        <div class="validation">
          <input class=" unified_input input" type="text" placeholder="請輸入驗證碼(不分大小寫)" v-model.trim="inputValidCode">
          <!-- 綁定click更新驗證碼 -->
          <div class="validcode" id="validcode" @click="updateNumber()">{{ validCode }} </div>

        </div><br>

        <input class="btn" type="submit" value="登入" @click="Login()"><br>

        <input class=" btn_PW" type="submit" value="忘記密碼" @click="forgotPassword"><br>
      </div>
      <!-- </form> -->
    </div>
  </backlogin>
</template>
<script>
export default {
  data() {
    return {
      // 預設值
      account: "",
      password: "",
      validCode: "",
      inputValidCode: "",
      verifyCode: false,
    }
  },
  methods: {
    // ==== 生成驗證碼
    generateNumber() {
      // 改成英文字母
      let letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      let validCode = "";
      for (let i = 1; i <= 4; i++) {

        let randomIndex = Math.floor(Math.random() * letters.length);
        validCode += letters.charAt(randomIndex);
      }
      this.validCode = validCode;
      this.verifyCode = true;
    },
    // ==== 更新驗證碼
    updateNumber() {
      this.generateNumber()
    },

    checkValid() {
      // ==== 判斷驗證碼是否正確
      if (this.inputValidCode.toUpperCase() === this.validCode || this.inputValidCode === null) {
        return this.verifyCode = true;
      } else {
        this.generateNumber();
        alert("驗證碼錯誤")
        return this.verifyCode = false;
      }
    },
    // ==== 判斷帳號跟密碼跟驗證碼是否正確後登入
    Login() {
      // 先確認帳號跟密碼正確再執行checkValid,對的話就可以登入
      if (this.account === "webfolly" && this.password === "thd103g1") {
        this.checkValid();
        if (this.verifyCode === true) {
          this.$router.push('/back_mediaNetwork')
        }
      } else {
        alert("帳號或密碼錯誤")
        this.checkValid();
      }
    },

    // Login() {
    //   this.checkValid();

    // },
    // ==== 導向忘記密碼介面
    forgotPassword() {
      this.$router.push('/back_password');
    },
  },
  mounted() {
    this.updateNumber()
  }

}
</script>



