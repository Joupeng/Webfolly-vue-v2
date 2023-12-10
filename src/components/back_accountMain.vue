<template>
  <div class="back_accountMain">
    <!-- header -->
    <!-- <div class="header"> -->

    <!-- 返回鍵 -->
    <div class="backheader backheaderAcount ">
      <RouterLink to="back_medianetwork">
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
      <div class="left_block" :class="{ '-on': isOpen2 === true }">
        <div>
          <label class="label grid11" for="userID">使用者編號</label>
          <input class="unified_input grid12" type="text" name="userID" readonly :value="adminINF.admID">
        </div>

        <div>
          <label class="label grid21" for="userName">使用者名稱</label>
          <input class="unified_input grid22" type="text" name="userName" :value="adminINF.admNAME" readonly>
        </div>
        <div>
          <label class="label grid31" for="account">使用者權限</label>
          <input class="unified_input grid32" type="text" name="account" :value="adminINF.admPERMISSION" readonly>
        </div>
        <div>
          <label class="label grid41" for="mail">電子信箱</label>
          <input class="unified_input grid42" type="text" name="mail" :value="adminINF.admEMAIL" readonly>
        </div>
        <div>
          <label class="label grid51" for="phone">電話</label>
          <input class="unified_input grid52" type="text" name="phone" :value="adminINF.admPHONE" readonly>
        </div>

        <!-- 更改密碼區域 -->
        <div class="passWord_block">
          <!-- -->
          <div class="passWord_inner_block" :class="{ '-on': isOpen === true }" @click="isOpen = !isOpen">
            <p>更改密碼 </p>
            <img src="@/assets/images/donate/donate_rightarrow.svg" alt="rightarrow">
          </div>
          <div class="input_block">
            <input class="unified_input" type="text" name="oldPWD" placeholder="請輸入舊密碼"
              :class="{ '-on': isOpen === true }" v-model.trim="changePWD.oldPWD">
            <input class="unified_input" type="text" name="newPWD" placeholder="請輸入新密碼"
              :class="{ '-on': isOpen === true }" v-model.trim="changePWD.newPWD">
            <input class="unified_input" type="text" name="confirmPWD" placeholder="請確認新密碼"
              :class="{ '-on': isOpen === true }" v-model.trim="changePWD.confirmPWD">


            <div class="final_block">
              <div class="forgetPassword">
                <RouterLink class="link" to="back_password"> 忘記密碼</RouterLink>
              </div>

              <div class="submitBox grid92">
                <button class="btn" type="button" :class="{ '-on': isOpen === true }"
                  @click="handleUpdatePWD()">密碼更新</button>
              </div>
            </div>

          </div>

        </div>


      </div>
      <!-- 左邊的資料區 新增帳號-->
      <div class="left_block edit" :class="{ '-on': isOpen2 === true }">
        <div>
          <label class="label grid11" for="addUserID">使用者編號</label>
          <input class="unified_input grid12" type="text" name="addUserID" placeholder="請輸入編號" v-model.trim="addUserID">
        </div>

        <div>
          <label class="label grid21" for="addUserName">使用者名稱</label>
          <input class="unified_input grid22" type="text" name="addUserName" placeholder="請輸入名稱"
            v-model.trim="addUserName">
        </div>
        <div>
          <label class="label grid31" for="addPermission">使用者權限</label>
          <input class="unified_input grid32" type="text" name="addPermission" placeholder="請輸入權限(管理員/編輯)"
            v-model.trim="addPermission">
        </div>
        <div>
          <label class="label grid41" for="addMail">電子信箱</label>
          <input class="unified_input grid42" type="text" name="addMail" placeholder="請輸入電子信箱" v-model.trim="addMail">
        </div>
        <div>
          <label class="label grid51" for="addPhone">電話</label>
          <input class="unified_input grid52" type="text" name="addPhone" placeholder="請輸入電話" v-model.trim="addPhone">
        </div>
        <div>
          <label class="label grid51" for="addPassword">密碼</label>
          <input class="unified_input grid52" type="text" name="addPassword" placeholder="請輸入密碼"
            v-model.trim="addPassword">
        </div>

      </div>

      <!-- 右邊資料區 -->
      <div class="right_block">
        <div class="btnBox">
          <button class="btn" :class="{ '-on': isOpen2 === true }" @click="handleNewAdmin()">+新增</button>
          <button class="btn" :class="{ '-on': isOpen2 === true }" @click="saveNewAdmin()">儲存新增</button>
        </div>
        <div class="table">
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
              <tr class="tr" id="admin" v-for="item in adminList" :key="item">
                <td class="td w100">{{ item.id }}</td>
                <td class="td w100">{{ item.NAME }}</td>
                <td class="td w100">{{ item.PERMISSION }}</td>
                <td class="td w200">{{ item.MAIL }}</td>
                <td class="td w100">{{ item.PHONE }}</td>
              </tr>



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      isOpen: false,
      isOpen2: false,
      isDisabled: false,
      // 左 登入的管理者資料表
      adminINF: {
        admID: "",
        admNAME: "",
        admPERMISSION: "",
        admEMAIL: "",
        admPHONE: "",
        admPASSWORD: "",
      },
      // adminINF2: { // },
      changePWD: {
        refPWD: "",
        oldPWD: "",
        newPWD: "",
        confirmPWD: "",

      },

      // 左 新增使用者
      addUserID: "",
      addUserName: "",
      addPermission: "",
      addMail: "",
      addPhone: "",
      addPassword: "",

      // 右 管理者清單
      adminList: [],
      // 用cookie抓出管理者名稱
      cookie: "",
      newAdmin: {
        addUserID: "",
        addUserName: "",
        addPermission: "",
        addMail: "",
        addPhone: "",
        addPassword: "",
      },

    }
  },
  methods: {
    // 預設直接取得cookie值
    getCookie(cookieName) {
      const name = cookieName + "=";
      const decodedCookie = decodeURIComponent(document.cookie);
      const cookieArray = decodedCookie.split(';');

      for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i].trim();

        if (cookie.indexOf(name) === 0) {
          return cookie.substring(name.length, cookie.length);
        }
      }

      return null;
    },
    // 右控制新增按鈕出現消失
    isOpenBTN() {
      this.isOpen2 = !this.isOpen2;
    },
    // 右控制新增按鈕事件
    handleNewAdmin() {
      if (this.adminINF.admPERMISSION === "管理員") {

        this.addUserID = "",
          this.addUserName = "",
          this.addPermission = "",
          this.addMail = "",
          this.addPhone = "",
          this.addPassword = "",
          this.isOpenBTN();
      } else {
        alert('您沒有權限新增')

      }
      // 清空上次的新增值

    },
    // 每個新增資料的alert
    handleAddUserID() {
      // 1.設定id 8碼數字
      let addUserID = this.addUserID;
      if (/^\d{8}$/.test(addUserID)) {
        console.log(this.addUserID);
        // this.newAdmin.push(this.addUserID);
      } else {
        alert('請輸入八碼數字作為使用者編號');
      }
    },
    handleAddUserName() {

      // 2.確認管理者名稱沒有重複
      let addUserName = this.addUserName;
      // 目前的管理者名字
      const checkName = this.adminList.map(item => item.NAME);

      // const checkName2 = console.log(checkName);
      // console.log(checkName[0]);
      this.showAdminList();
      if (addUserName === "") {
        alert('請輸入使用者名稱');

      } else if (checkName.includes(addUserName)) {
        alert('使用者名稱重複');
      } else {
        console.log(this.addUserName);
        // this.newAdmin.addPas
      };
    },
    handleAddPermission() {
      //3.設定權限只能管理員跟編輯
      let addPermission = this.addPermission;
      if (addPermission != '管理員' && addPermission != '編輯') {
        alert('請設定權限為管理員或編輯');
      } else {
        console.log(this.addPermission);

      };
    },
    handleAddMail() {
      // 4.設定信箱格式結尾
      let addMail = this.addMail;
      if (!addMail.endsWith('.com') && !addMail.endsWith('.com.tw')) {
        alert('信箱格式錯誤 請確認是否完整');
      } else {
        console.log(addMail);
      };
    },
    handleAddPhone() {
      // 5.電話設定10碼並且是09開頭
      let addPhone = this.addPhone;
      if (/^09\d{8}$/.test(this.addPhone)) {
        console.log(addPhone);
      } else {
        alert('請確認電話號碼是否正確');
      };
    },
    handleAddPassword() {
      // 6.設定密碼
      let addPassword = this.addPassword;
      if (addPassword.length < 6) {
        alert('密碼長度至少六碼')
      } else {
        // alert('您的預設密碼為' + this.addPassword)
        console.log(this.addPassword);
      };
    },
    // 右控制儲存按鈕事件-將資料存到資料庫

    async saveNewAdmin() {
      try {

        //1.執行所有的欄位驗證
        this.handleAddUserID();
        this.handleAddUserName();
        this.handleAddPermission();
        this.handleAddMail();
        this.handleAddPhone();
        this.handleAddPassword();

        // 2.進行儲存 
        const data = {
          id: this.addUserID,
          NAME: this.addUserName,
          PERMISSION: this.addPermission,
          MAIL: this.addMail,
          PHONE: this.addPhone,
          PASSWORD: this.addPassword,
        };
        // 確認都沒有空值
        const fail = Object.values(data).some(value => value === undefined || value === null || value === '');
        if (fail) {
          alert('新增失敗  請確認是否都有填寫')
        } else {
          console.log(data);
          alert(`新增成功\n使用者名稱: ${this.addUserName}\n密碼: ${this.addPassword}`)
          this.isOpenBTN();
        }


        // 3.回傳json檔到php
        // const response = await fetch("http://localhost/AJAX/APITEST/b_addaccount.php", {
        const response = await fetch("API/b_addaccount.php", {
          method: "POST", // or 'PUT'
          headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
            "Content-Type": "text/plain",
          },
          body: JSON.stringify(data), // data can be string or {object}!
        });
        // if (!response.ok) {
        //   throw new Error(`網路回應錯誤: ${response.status}`);
        // };
        // const resData = await response.json();
        // console.log('PHP response:', response);

      } catch (message) {
        console.log(`Error : ${message}`);
      }
    },
    // 抓取管理員清單
    async showAdminList() {
      try {
        // let getAdminList = await fetch("http://localhost/AJAX/APITEST/b_account.php");
        let getAdminList = await fetch("API/b_account.php");
        const data = await getAdminList.json();
        // console.log(data);
        this.adminList = data;
        console.log(this.adminList);
        // 掛載函式不然抓不到值
        this.getAdminINF();
      } catch (message) {
        console.log(`Error : ${message}`);
      }
    },
    // 用Cookie比對取得資料並傳送到左邊的表單
    getAdminINF() {
      // 取得cookie值
      this.cookie = this.getCookie('adminName');
      // console.log(this.adminList2);
      this.adminFilter = this.adminList.filter(item => item.NAME === this.cookie);
      // console.log(this.adminINF2);
      // console.log(this.adminINF2[0].NAME);
      //this.adminINF[0] = this.adminINF2[0];
      // 取值後放到admin
      this.adminINF.admID = this.adminFilter[0].id;
      this.adminINF.admNAME = this.adminFilter[0].NAME;
      this.adminINF.admPERMISSION = this.adminFilter[0].PERMISSION;
      this.adminINF.admEMAIL = this.adminFilter[0].MAIL;
      this.adminINF.admPHONE = this.adminFilter[0].PHONE;
    },
    // 找到登入者的密碼
    getRefPWD() {
      // 取得資料表
      console.log(this.adminList);
      this.cookie = this.getCookie('adminName');
      let refAdmin = this.adminList.filter(item => item.NAME === this.cookie);
      const refPWD = refAdmin[0].PASSWORD;
      return refPWD;
    },


    // 更新密碼比對功能
    confirmPWD() {
      let refPWD = this.getRefPWD();
      // console.log(refPWD);
      let oldPWD = this.changePWD.oldPWD;
      let newPWD = this.changePWD.newPWD;
      let confirmPWD = this.changePWD.confirmPWD;
      //1.比對原本的密碼與輸入的舊密碼是否相同 
      if (refPWD != oldPWD) {
        alert('請輸入正確的舊密碼')
      }
      if (newPWD.length < 6) {
        alert("密碼長度需大於六位數")
      }
      //2.比對新舊密碼是否重複
      if (oldPWD === newPWD) {
        alert('密碼重複');
      }
      //3.新密碼確認密碼是否不同
      if (newPWD != confirmPWD) {
        alert('請在新密碼與確認的密碼輸入相同值');
      }
      if (refPWD === oldPWD && newPWD.length >= 6 && oldPWD != newPWD && newPWD === confirmPWD) {
        alert("更新成功");
      };
      return true;
    },
    // 更新密碼執行回傳的函式
    async handleUpdatePWD() {
      try {
        // 1.進行密碼比對
        this.confirmPWD();
        // 不成功執行的函式
        // if (!this.confirmPWD()) { };
        // 2.const陣列[oldPWD, newPWD]
        const PWD = {
          oldPWD: this.changePWD.oldPWD,
          newPWD: this.changePWD.newPWD,
        };
        console.log(PWD);
        // 3.回傳值
        // response = await fetch("http://localhost/AJAX/APITEST/b_changepassword.php", {
        const response = await fetch("API/b_changepassword.php", {
          method: "POST",
          headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
          },
          body: JSON.stringify(PWD),
        });

        // if (!response.ok) {
        //   throw new Error(`網路回應錯誤: ${response.status}`);
        // };
        // 沒有回傳值
        // const resData = await response.json();
        // console.log('PHP response:', resData);
        // 5.清空輸入的數值
        this.changePWD.refPWD = "";
        this.changePWD.oldPWD = "";
        this.changePWD.newPWD = "";
        this.changePWD.confirmPWD = "";
      }
      catch (message) {
        console.log(`Error : ${message}`);
      }

    },


  },
  mounted() {
    this.showAdminList();
    // this.getAdminINF();
    // this.getcookie();
    // this.updatePWD()

  }

}

</script>


