<template>
  <div class="backloginMain">
    <div class="header"></div>
    <div class="body">
      <div class="logo"><img class="img" src="@/assets/images/common/logo.svg"></div>
      <div class="form">
        <!-- <form class="form" @submit.prevent="handleLogin"> -->
        <!-- 輸入名稱/密碼/ -->



        <input class="unified_input input" type="text" placeholder="請輸入使用者名稱" v-model.trim="account"><br>

        <!-- 輸入驗證碼 -->
        <input class="unified_input input" type="password" placeholder="請輸入密碼" v-model.trim="password"><br>
        <!-- 輸入驗證碼 -->
        <div class="validation">
          <input class=" unified_input input" type="text" placeholder="請輸入驗證碼(不分大小寫)" v-model.trim="inputValidCode">
          <!-- 綁定click更新驗證碼 -->
          <div class="validcode" id="validcode" @click="updateNumber()">{{ validCode }} </div>

        </div><br>

        <input class="btn" type="submit" value="登入" @click="login()"><br>

        <input class=" btn_PW" type="submit" value="忘記密碼" @click="forgotPassword()"><br>
      </div>
      <!-- </form> -->
    </div>
  </div>
</template>
<script>
import { Alert } from 'bootstrap';

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

    // login() {
    //   // 先確認帳號跟密碼正確再執行checkValid,對的話就可以登入
    //   if (this.account === "webfolly" && this.password === "thd103g1") {
    //     this.checkValid();
    //     if (this.verifyCode === true) {
    //       this.$router.push('/back_mediaNetwork')
    //     }
    //   } else {
    //     alert("帳號或密碼錯誤")
    //     this.checkValid();
    //   }
    // },

    // ==== 導向忘記密碼介面
    forgotPassword() {
      this.$router.push('/back_password');
    },

    // ==== 登入流程
    async login() {
      // 取得資料庫資訊
      try {
        // let getAdmin = await fetch("http://localhost/AJAX/APITEST/b_login.php");
        let getAdmin = await fetch("API/b_login.php");
        const data = await getAdmin.json();
        // console.log(data);
        // 取得name跟PWD放入陣列adminInfo
        let adminInfo = [];
        data.forEach(item => {
          let nameValue = item.NAME;
          // console.log(nameValue);
          let passwordValue = item.PASSWORD;
          // console.log(passwordValue);
          adminInfo.push({ NAME: nameValue, PASSWORD: passwordValue });
        });
        console.log(adminInfo);
        // 取得輸入的名稱跟密碼
        let inputName = this.account;
        let inputPassword = this.password;
        // 比對是否相同
        let isAdmin = adminInfo.find(admin => {
          return admin.NAME === inputName && admin.PASSWORD === inputPassword;
        });

        // 回傳動作
        if (isAdmin) {
          this.checkValid();
          if (this.verifyCode === true) {
            // 存入cookie
            document.cookie = `adminName=${inputName}`;
            this.$router.push('/back_mediaNetwork')
          }
        } else {
          alert("帳號或密碼錯誤")
          this.checkValid();
        }
      } catch (message) {
        console.log(`Error : ${message}`);
      }
    },

  },
  mounted() {
    this.updateNumber()
  }

}
</script>



