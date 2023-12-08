<template>
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


      <div class="bar">
        <div class="search"></div>
        <div class="btn" @click="fileDownload">匯出 Excel 檔</div>
      </div>

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

        <!-- tbody 部分 -->
        <div class="tobdyContainer">
          <ul class="itemList">
            <!-- 顯示每個欄位的資料 -->
            <li v-for="(item, index) in items" :key="index" class="itemRow">
              <div class="tbItem">
                <p class="tableP">{{ index + 1 }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.source }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.title }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.content }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.link }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.picture }}</p>
              </div>

              <div class="tbItem" @click="itemEdit($event, index)" style="cursor: pointer;">
                <p class="tableP">編輯</p>
              </div>
              <div class="tbItem" @click="warning_open(index)">
                <p class="tableP" style="cursor: pointer;">刪除</p>
              </div>

            </li>
          </ul>
        </div>


      </div>





      <!-- <modal_warning></modal_warning> -->
      <!-- <modal_category>
      </modal_category> -->
      <!-- <modal_content></modal_content>
    <modal_quiz></modal_quiz>  -->

      <!-- <pagination></pagination> -->

    </main>
  </div>
  <backfooter></backfooter>
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
      // input輸入的內容
      itemText: [
        {
          // id: '',
          source: '',
          title: '',
          content: '',
          link: '',
          picture: '',

        }
      ],
      // li上有的內容及狀態
      items: [
        // {
        //   tbNumber: '1',
        //   tbTitle: '標題',
        //   tbContent: '台灣媒體養成計畫，透過各教育階段共同推動媒體素養教育，提供多樣學習管道及資源，提升學生及國人媒體素養。',
        //   tbLink: '',
        //   tbPic: '',
        //   tbDate: '2022.03.12',
        // },
        // {
        //   tbNumber: '2',
        //   tbTitle: '標題',
        //   tbContent: '台灣媒體養成計畫，透過各教育階段共同推動媒體素養教育，提供多樣學習管道及資源，提升學生及國人媒體素養。',
        //   tbLink: '',
        //   tbPic: '',
        //   tbDate: '2022.03.12',
        // },
      ],

    };
  },

  methods: {

  },
};
</script>