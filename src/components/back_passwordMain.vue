<template>
  <div class="wrapper backpasswordMain">
    <!-- header -->
    <div class="header">
      <span @click="backToLogin">登入頁面</span>
      <span> / 忘記密碼</span>

    </div>
    <!-- main -->
    <div class="body">
      <form class="form" value="">
        <div class="title">重設密碼</div>
        <div class="content">
          <div class="input">
            <label class="container">
              <input class="input" type="radio" name="way" value="phone" @click="byPhone">
              <span class="checkmark"></span>
              <span class="span">透過簡訊傳送新密碼</span>
            </label>
          </div>
          <div class="input span local">09******65</div>

          <div class="input">
            <label class="container">
              <input class="input" type="radio" name="way" value="mail" @click="byMail">
              <span class="checkmark"></span>
              <span class="span">透過電子信箱傳送新密碼</span>
            </label>
          </div>
          <div class="input span local">123@gmail.com</div>
        </div>
      </form>
    </div>

  </div>
</template>

<script>
export default {
  data() {
    return {

    }
  },
  methods: {
    // 返回登入頁
    backToLogin() {
      this.$router.push('/back_login');
    },
    // 寄送簡訊
    // label標籤會alert 2次
    byPhone() {
      setTimeout(() => {
        alert(`已寄送至您的手機`);
      }, 100)

    },
    // 寄送mail
    byMail() {
      setTimeout(() => {
        alert('已寄送至您的信箱');
      }, 100)


    },


  }
}

</script>

