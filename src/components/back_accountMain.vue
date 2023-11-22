<template>
  <div class="wrapper back_accountMain">
    <!-- header -->
    <!-- <div class="header"> -->
    <div class="backheader backheaderAcount ">
      <!-- 返回鍵 -->
      <RouterLink to="back_medialiteracy">
        <svg xmlns="http://www.w3.org/2000/svg" height="14px" viewBox="0 0 512 512">
          <path
            d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
        </svg>
        <!-- </div> -->
      </RouterLink>
    </div>
    <!-- main -->
    <div class="body">
      <!-- 左邊的資料區 -->
      <div class=" Left">

        <label class="label grid11" for="userID">使用者編號</label>
        <input class="unified_input grid12" type="text" name="userID" value="99165140" disabled>



        <label class="label grid21" for="userName">使用者名稱</label>
        <input class="unified_input grid22" type="text" name="userName" value="孫武" disabled>


        <label class="label grid31" for="account">使用者權限</label>
        <input class="unified_input grid32" type="text" name="account" value="管理員" disabled>


        <label class="label grid41" for="mail">電子信箱</label>
        <input class="unified_input grid42" type="text" name="mail" value="banks7764@gmail.com" disabled>


        <label class="label grid51" for="phone">電話</label>
        <input class="unified_input grid52" type="text" name="phone" value="0927663751" disabled>


        <label class="label grid61" id="changePassword_btn" for="changePassword">更改密碼
          <svg class="icon" id="changePassword_btn" name="changePassword" xmlns="http://www.w3.org/2000/svg" height="1em"
            viewBox="0 0 512 512">
            <path
              d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
          </svg>
        </label>
        <input class="unified_input grid62" type="password" name="" placeholder="請輸入舊密碼">
        <input class="unified_input grid72" type="NewPassword" name="" value="" placeholder="請輸入新密碼">
        <input class="unified_input grid82" type="ConfirmNewPassword" name="" value="" placeholder="請確認新密碼">

        <div class="forgetPWD  grid91">
          <RouterLink class="link" to="back_password"> 忘記密碼</RouterLink>
        </div>
        <div class="submitBox grid92">
          <button class="btn" type="button" value="">儲存變更</button>
        </div>
      </div>

      <div class="wrap right">
        <table class="table">
          <thead class="thead">
            <tr class="tr">
              <th class="th w100">使用者編號</th>
              <th class="th w100">使用者名稱</th>
              <th class="th w100">使用者權限</th>
              <th class="th w200">電子信箱</th>
              <th class="th w100">電話</th>
            </tr>
          </thead>
          <tbody class="tbody">
            <tr class="tr">
              <td class="td w100">99165140</td>
              <td class="td w100">孫武</td>
              <td class="td w100">管理員</td>
              <td class="td w200">banks7764@gmail.com</td>
              <td class="td w100">0927663751</td>
            </tr>
            <tr class="tr">
              <td class="td w100">99165141</td>
              <td class="td w100">孫權</td>
              <td class="td w100">編輯</td>
              <td class="td w200">banks7749@gmail.com</td>
              <td class="td w100">0927421761</td>
            </tr>
            <tr class="tr">
              <td class="td w100">99165142</td>
              <td class="td w100">孫尚香</td>
              <td class="td w100">編輯</td>
              <td class="td w200">banks7777@gmail.com</td>
              <td class="td w100">0925363755</td>
            </tr>

          </tbody>
        </table>
        <div class="btnBox">
          <button class="btn">+新增</button>
          <button class="btn">儲存變更</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
  },
  methods: {

  },

}


</script>