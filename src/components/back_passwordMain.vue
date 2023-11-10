<template>
  <!-- wrapper  -->
  <div class="backpasswordMain wrapper">
    <!-- header -->
    <div class="header">
      <router-link to="/back/login" class="ToBackLogin">登入頁面</router-link>
      / 忘記密碼
      <!-- <a class="link" href="./backlogin.html">登入頁面</a> / 忘記密碼 -->
    </div>
    <!-- main -->
    <div class="body">
      <form class="form" value="">
        <div class="title">重設密碼</div>
        <div class="content">
          <div class="input">
            <label class="container">
              <input type="radio" name="way" value="phone">
              <span class="checkmark"></span>
              <span class="way">透過簡訊傳送新密碼</span>
              <div class="input span">09******65</div>
            </label>
          </div>

          <div class="input">
            <label class="container">
              <input type="radio" name="way" value="mail">
              <span class="checkmark"></span>
              <span class="way">透過電子信箱傳送新密碼</span>
              <div class="input span">123@gmail.com</div>
            </label>
          </div>
        </div>
      </form>
    </div>
    <!-- footer -->


  </div>
</template>



