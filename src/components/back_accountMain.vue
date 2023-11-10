<template>
  <div class="wrapper back_accountMain">
    <!-- header -->
    <div class="header">
      <a href="./backlogin.html">
        <svg xmlns="http://www.w3.org/2000/svg" height="14px" viewBox="0 0 512 512">
          <path
            d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
        </svg>
      </a>
      / 帳號設定
    </div>
    <!-- main -->
    <div class="body">
      <div class="section">
        <table class="table">
          <tbody class="tbody">
            <tr class="tr">
              <td class="col1">使用者編號</td>
              <td class="col2">99165140</td>
            </tr>
            <tr class="tr">
              <td class="col1">使用者名稱</td>
              <td class="col2">孫武</td>
            </tr>
            <tr class="tr">
              <td class="col1">使用者權限</td>
              <td class="col2">管理員</td>
            </tr>
            <tr class="tr">
              <td class="col1">電子信箱</td>
              <td class="col2">banks7764@gmail.com</td>
            </tr>
            <tr class="tr">
              <td class="col1">電話</td>
              <td class="col2">0927663751</td>
            </tr>
            <tr class="tr">
              <td class="col3">更改密碼 v</td>
              <!-- 打開更改密碼的表單 https://www.w3schools.com/jquery/tryit.asp?filename=tryjquery_eff_toggle -->

              <td class="col4">
                <input class="input" type="password" placeholder="請輸入舊密碼">
                <input class="input" type="password" placeholder="請輸入新密碼">
                <input class="input" type="password" placeholder="請確認新密碼">
              </td>
            </tr>
          </tbody>
        </table>
        <div class="submitBox">
          <div class="forgetPWD"><a class="a" href="./back_password.html">忘記密碼</a></div>
          <button class="btn" ctype="button">儲存變更</button>
        </div>
      </div>
      <div class="section">
        <table class="table2">
          <thead class="thead">
            <tr class="tr">
              <td class="td w100">使用者編號</td>
              <td class="td w100">使用者名稱</td>
              <td class="td w100">使用者權限</td>
              <td class="td w200">電子信箱</td>
              <td class="td w100">電話</td>
            </tr>
          </thead>
          <tbody class="tbody">
            <tr class="tr">
              <td class="td">99165140</td>
              <td class="td">孫武</td>
              <td class="td">管理員</td>
              <td class="td">banks7764@gmail.com</td>
              <td class="td">0927663751</td>
            </tr>
            <tr class="tr">
              <td class="td">99165141</td>
              <td class="td">孫權</td>
              <td class="td">編輯</td>
              <td class="td">banks7749@gmail.com</td>
              <td class="td">0927421761</td>
            </tr>
            <tr class="tr">
              <td class="td">99165142</td>
              <td class="td">孫尚香</td>
              <td class="td">編輯</td>
              <td class="td">banks7777@gmail.com</td>
              <td class="td">0925363755</td>
            </tr>

          </tbody>
        </table>
        <div class="btnBox">
          <button class="btn">+新增</button>
          <button class="btn">儲存變更</button>
        </div>
      </div>

    </div>
    <!-- footer -->
    <div class="footer">
      <span class="ei22_418_69_3181">本網站為緯育TibaMe【第87期】前端工程師專業技術養成班學員作品,僅供學習、展示之用途。
        參考資源：ＯＯＯ、ＯＯＯ、ＯＯＯ</span>

      <div class=ei22_418_69_3182><span class="ei22_418_69_3184">返回前台</span></div>

    </div>

  </div>
</template>