<template>
  <section class="back_donateManage">


    <header class="backheader">
      <div class="right">
        <router-link to="/back_account">帳號設定</router-link>
        <router-link to="/back_login">登出</router-link>
      </div>
    </header>

    <div class="back_container">
      <!-- 側邊欄 -->
      <backaside></backaside>

      <!-- 主要欄目 -->
      <main>
        <div class="title">
          <h2>捐款管理</h2>
        </div>

        <!-- 匯出 Excel 檔按鈕 -->
        <div class="btn" @click="fileDownload">匯出 Excel 檔</div>


        <div class="donateManageTable">


          <!-- thead 部分 -->
          <div class="thead">
            <!-- 欄位標題 -->
            <div class="thItem">編號</div>
            <div class="thItem">姓名</div>
            <div class="thItem">綠界訂單編號</div>
            <div class="thItem">捐款金額</div>
            <div class="thItem">捐款日期</div>
          </div>


          <div class="drop-down_menu_block">
            <!-- 年份 -->
            <select class="list_block" v-model="Dyear">
              <option class="choose_year" placeholder="請選擇年份">請選擇年份</option>
              <option class="li_year" v-for="year in years" :key="year">{{ year }}</option>
            </select>
            <!-- 月份 -->
            <select class="list_block" v-model="Dmonth">
              <option class="choose_month">請選擇月份</option>
              <option class="li_month" v-for="(month, index) in months" :key="index + 1" :value="index + 1">{{
                month }}</option>
            </select>
          </div>

          <button class="donate_btn" type="button" @click="handleDonation">
            查詢捐款 &#128269
          </button>



        </div>

        <section class="donate_record_result">

          <ul>
            <li class="first_li">
              <div>
                <p>姓名</p>
                <p>捐款金額</p>
                <p>捐款時間</p>
              </div>
            </li>


            <li v-for="(donation, index) in donations"
              :class="{ 'white_li': index % 2 === 0, 'gray_li': index % 2 !== 0 }">
              <div>
                <p>{{ donation.LNAME }}{{ donation.FNAME }} </p>
                <p>{{ donation.MONEY }}</p>
                <p>{{ donation.DYEAR }}/{{ donation.DMONTH }}</p>
              </div>
            </li>


          </ul>





        </section>




      </main>
    </div>
    <footer class="backfooter2">
      <div class="backfooter_frame2">
        <router-link :to="{ name: 'home' }"><img src="@/assets/images/common/logo.svg" alt="網中愚商標"></router-link>
        <div class="backfooter_text2">
          <p class="backfooter_text2"> 本網站為緯育TibaMe【第87期】前端工程師專業技術養成班學員作品,僅供學習、展示之用途。<br>
            參考資源：回收大百科、Stick Hero、MyGoPen、Médecins Sans Frontières</p>
          <router-link :to="{ name: 'home' }"><span>返回前台</span></router-link>
        </div>
      </div>
    </footer>
  </section>
</template>

<script>
import backfooter from '@/components/back_footer.vue'
import pagination from '@/components/pagination.vue'
import backaside from '@/components/back_aside.vue'

export default {
  components: {
    backfooter,
    pagination,
    backaside,
  },
  data() {
    return {
      item_index: 0,
      itemAddWindowOpen: false,
      warningOpen: null,
      addWindow: false,
      editWindow: false,
      donations: [],
      serverData: [],  // 添加 serverData 属性

      // 輸入年月的選單欄位
      selectedYear: null,
      selectedMonth: null,
      inputValidCode: "", // 使用者輸入的驗證碼
      validCode: "", // 這裡使用一個固定的驗證碼，你可以根據實際需求修改
      years: ["2012", "2014", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"],
      months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
      Dyear: null,
      Dmonth: null,

    };
  },

  methods: {
    handleDonation() {
      // 驗證碼比對
      if (this.inputValidCode.toUpperCase() === this.validCode) {
        // 驗證碼正確，執行查詢捐款的邏輯
        // console.log("查詢捐款");

        // 使用 fetch 發送請求
        // http://localhost/API/donate_log.php
        // 'http://localhost/API/donate_log.php?DYEAR='+ this.Dyear
        // `http://localhost/API/donate_log.php?DYEAR=${this.Dyear}&DMONTH=${this.Dmonth}`

        fetch(`http://localhost/API/donate_log.php?DYEAR=${this.Dyear}&DMONTH=${this.Dmonth}`, {
          method: 'GET',
          mode: 'cors',
          headers: {
            'Content-Type': 'application/json',
          },
        })
          .then(response => response.json())
          .then(data => {
            // 將取得的資料映射为前端需要的格式
            this.donations = data.map(donation => ({
              FNAME: donation.FNAME,
              LNAME: donation.LNAME,
              MONEY: donation.MONEY,
              DYEAR: donation.DYEAR,
              DMONTH: donation.DMONTH,
            }));
          })
          .catch(error => {
            console.error("Error fetching data:", error);
            console.log("Response status:", error.status);
          });
      } else {
        // 驗證碼錯誤，顯示錯誤訊息
        alert("輸入驗證碼錯誤");
      }
    },



    queryDonations() {
      console.log("查询条件:", this.selectedYear, this.selectedMonth, this.verificationCode);

      // 使用 fetch 发送请求
      // http://localhost/API/donate_log.php
      // http://localhost/API/donate_log.php?DYEAR=2023&DMONTH=12

      fetch('http://localhost/API/donate_log.php?DYEAR=2023&DMONTH=12', {
        method: 'GET',
        mode: 'cors',
        headers: {
          'Content-Type': 'application/json',
        },
      })
        .then(response => response.json())
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error("Error fetching data:", error);
          console.log("Response status:", error.status);
        });
    }


  },
};
</script>