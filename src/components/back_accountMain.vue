<template>
  <div class="back_accountMain">
    <!-- header -->
    <!-- <div class="header"> -->

    <!-- 返回鍵 -->
    <div class="backheader backheaderAcount ">
      <RouterLink to="back_medialiteracy">
        <div class="svg_block">
          <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 512 512" class="svg">
            <path
              d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
          </svg>
        </div>
      </RouterLink>
    </div>


    <!-- main -->
    <div class="all_block">

      <!-- 左邊的資料區 -->
      <div class="left_block">
        <div>
          <label class="label grid11" for="userID">使用者編號</label>
          <input class="unified_input grid12" type="text" name="userID" value="99165140" disabled>
        </div>

        <div>
          <label class="label grid21" for="userName">使用者名稱</label>
          <input class="unified_input grid22" type="text" name="userName" value="孫武" disabled>
        </div>
        <div>
          <label class="label grid31" for="account">使用者權限</label>
          <input class="unified_input grid32" type="text" name="account" value="管理員" disabled>
        </div>
        <div>
          <label class="label grid41" for="mail">電子信箱</label>
          <input class="unified_input grid42" type="text" name="mail" value="banks7764@gmail.com" disabled>
        </div>
        <div>
          <label class="label grid51" for="phone">電話</label>
          <input class="unified_input grid52" type="text" name="phone" value="0927663751" disabled>
        </div>

        <!-- 更改密碼區域 -->
        <div class="passWord_block">
          <div class="passWord_inner_block">
            <p>更改密碼</p>
            <!-- <img src="/src/assets/images/donate/donate_rightarrow.svg" alt=""> -->
          </div>
          <div class="input_block">
            <input class="unified_input" type="password" name="" placeholder="請輸入舊密碼">
            <input class="unified_input" type="NewPassword" name="" value="" placeholder="請輸入新密碼">
            <input class="unified_input" type="ConfirmNewPassword" name="" value="" placeholder="請確認新密碼">


            <div class="final_block">
              <div class="forgetPassword">
                <RouterLink class="link" to="back_password"> 忘記密碼</RouterLink>
              </div>

              <div class="submitBox grid92">
                <button class="btn" type="button" value="">儲存變更</button>
              </div>
            </div>

          </div>

        </div>


      </div>

      <!-- 右邊資料區 -->
      <div class="right_block">
        <table class="table">
          <thead class="thead">
            <tr class="tr">
              <th class="th w100">
                <p>使用者編號</p>
              </th>
              <th class="th w100">
                <p>使用者名稱</p>
              </th>
              <th class="th w100">
                <p>使用者權限</p>
              </th>
              <th class="th w200">
                <p>電子信箱</p>
              </th>
              <th class="th w100">
                <p>電話</p>
              </th>
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
              <td class="td_gray w100">99165141</td>
              <td class="td_gray w100">孫權</td>
              <td class="td_gray w100">編輯</td>
              <td class="td_gray w200">banks7749@gmail.com</td>
              <td class="td_gray w100">0927421761</td>
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