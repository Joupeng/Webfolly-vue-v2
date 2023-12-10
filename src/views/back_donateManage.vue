<template>
  <section class="back_donateManage">

    <!-- ＨＥＡＤＥＲ -->
    <header class="backheader2">
      <div class="right2">
        <router-link to="/back_account" class="btn_001">帳號設定</router-link>
        <router-link to="/back_login" class="btn_002">登出</router-link>
      </div>
    </header>

    <div class="back_container2">
      <!-- 側邊欄 -->
      <!-- <backaside></backaside> -->

      <div class="asideNew">
        <router-link to="/back_medianetwork" class="mediaNetwork2">媒體識讀 - 外網連結</router-link>

        <router-link to="/back_mediaclass" class="mediaClass2">媒體識讀 - 相關課程</router-link>

        <router-link to="/back_fakenews" class="fakeNews2">假訊息追擊 - 題庫</router-link>

        <router-link to="/back_donatemanage" class="donateManage2">捐款管理&nbsp;&nbsp;</router-link>

        <router-link to="/back_donatefaq" class="donateFAQ2">捐款
          FAQ</router-link>
      </div>



      <!-- 主要欄目 -->
      <div class="main_block">


        <div class="D_title">捐款管理</div>

        <!-- 匯出 Excel 檔按鈕 -->
        <!-- <div class="btn" @click="fileDownload">匯出 Excel 檔</div>
 -->




        <!-- thead 部分 -->
        <!-- <div class="thead"> -->
        <!-- 欄位標題 -->
        <!-- <div class="thItem">編號</div>
          <div class="thItem">姓名</div>
          <div class="thItem">綠界訂單編號</div>
          <div class="thItem">捐款金額</div>
          <div class="thItem">捐款日期</div>
        </div> -->


        <div class="drop-down_menu_block2">
          <!-- 年份 -->
          <select class="list_block2" v-model="Dyear">
            <option class="choose_year2" placeholder="請選擇年份">請選擇年份</option>
            <option class="li_year2" v-for="year in years" :key="year">{{ year }}</option>
          </select>
          <!-- 月份 -->
          <select class="list_block2" v-model="Dmonth">
            <option class="choose_month2">請選擇月份</option>
            <option class="li_month2" v-for="(month, index) in months" :key="index + 1" :value="index + 1">{{
              month }}</option>
          </select>

          <button class="donate_btn2" type="button" @click="handleDonation">
            查詢捐款 &#128269
          </button>

        </div>







        <section class="donate_record_result2">
          <!-- margin: 0 0 60px 0; -->

          <ul class="the_ul">
            <li class="first_li2">
              <div>
                <p>姓名</p>
                <p>綠界訂單編號</p>
                <p>捐款金額</p>
                <p>捐款時間</p>
              </div>
            </li>


            <li v-for="(donation, index) in donations"
              :class="{ 'white_li2': index % 2 === 0, 'gray_li2': index % 2 !== 0 }">
              <div>
                <p>{{ donation.LNAME }}{{ donation.FNAME }} </p>
                <p class="p_Dnumber">{{ donation.DNUMBER }}</p>
                <p>{{ donation.MONEY }}</p>
                <p>{{ donation.DYEAR }}/{{ donation.DMONTH }}</p>
              </div>
            </li>
          </ul>

        </section>

        <button class="btn_excell" type="button" @click="exportToExcel">
          匯出Excel檔
        </button>


      </div>
    </div>

    <!-- ＦＯＯＴＥＲ -->
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

import * as XLSX from 'xlsx';


function s2ab(s) {
  const buf = new ArrayBuffer(s.length);
  const view = new Uint8Array(buf);
  for (let i = 0; i < s.length; i++) {
    view[i] = s.charCodeAt(i) & 0xFF;
  }
  return buf;
}

export default {
  components: {

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
      Dyear: 2012,
      Dmonth: 1,

    };
  },

  methods: {
    handleDonation() {


      // 使用 fetch 發送請求
      // http://localhost/API/donate_log.php
      // 'http://localhost/API/donate_log.php?DYEAR='+ this.Dyear
      // `http://localhost/API/donate_log.php?DYEAR=${this.Dyear}&DMONTH=${this.Dmonth}`

      fetch(`API/donate_log.php?DYEAR=${this.Dyear}&DMONTH=${this.Dmonth}&DNUMBER=${this.Dnumber}`, {
        method: 'GET',
        // mode: 'cors',
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
            DNUMBER: donation.DNUMBER,
            MONEY: donation.MONEY,
            DYEAR: donation.DYEAR,
            DMONTH: donation.DMONTH,
          }));

          // 检查是否有捐款记录
          if (this.donations.length === 0) {
            alert('沒有捐款紀錄');
          }

        })
        .catch(error => {
          console.error("Error fetching data:", error);
          console.log("Response status:", error.status);
        });
    },

    // 輸出成excell
    exportToExcel() {
      if (this.donations.length === 0) {
        alert('沒有捐款紀錄');
        return;
      }

      // 将捐款数据转换为 worksheet 对象
      const worksheet = XLSX.utils.json_to_sheet(this.donations);

      // 创建 workbook 对象
      const workbook = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(workbook, worksheet, '捐款记录');

      // 将 workbook 对象转换为二进制字符串
      const binaryString = XLSX.write(workbook, { bookType: 'xlsx', mimeType: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', type: 'binary' });

      // 将二进制字符串转换为 Blob 对象
      const blob = new Blob([s2ab(binaryString)], { type: 'application/octet-stream' });

      // 创建下载链接并点击
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'donations.xlsx';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      window.URL.revokeObjectURL(url);
    }
  },




};
</script>
