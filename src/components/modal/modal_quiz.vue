
<template>
  <!-- ===文章彈窗=== -->
  <div class="content">
    <div class="content_frame">
      <header class="modalheader">
        <span>新增編輯 / 題目</span>
        <span id="closeModal" class="close"><img src="../../assets/images/common/back_iconClose.svg" alt="close"></span>
      </header>

      <div class="wrap">
        <!-- 分類 -->
        <div>

          <span class="selectTitle">
            <label for="category">分類選擇</label>
          </span>
          <span>
            <select class="selectText" v-model="selectedCategory" id="categorys" name="categorys">
              <option disabled value="">分類</option>
              <option v-for="category in categorys" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>
          </span>
        </div>

        <!-- 題目選項 1  -->
        <div>
          <span class="selectTitle">

            <label for="title">題目選項</label></span>
          <span>
            <span class="selectCorrect">正確</span>
            <textarea v-model="title" class="selectText" placeholder="請輸入題目"></textarea>
            <p>{{ title }}</p>
          </span>
        </div>

        <!-- 題目選項 2 -->
        <div>
          <span class="selectTitle">

            <label for="title"></label></span>
          <span>
            <span class="selectWrong">錯誤</span>
            <textarea v-model="title" class="selectText" placeholder="請輸入題目"></textarea>
            <p>{{ title }}</p>
          </span>
        </div>


        <!-- 詳細解答 -->
        <div>
          <span class="selectTitle"> <label for="message">詳細解答</label></span>

          <span> <textarea class="selectContent" v-model="title" placeholder="請輸入內容"></textarea>
            <p>{{ title }}</p>
          </span>


        </div>

      </div>

      <div class="button">
        <a href="">
          <div class="btn">儲存變更</div>
        </a>
      </div>

    </div>

  </div>
</template>
<script>
export default {
  data() {
    return {
      selectedCategory: '', // 使用者選擇的分類將存儲在這個變數中
      categorys: [ // 車輛清單
        { id: 1, name: '政治國際' },
        { id: 2, name: '生活健康' },
        { id: 3, name: '科技財金' },
        { id: 4, name: 'Audi' }
      ],
      title: '',// 用來存儲textarea的值
      selectedFile: null,
      videoLink: '',
      message: '',
    };
  },
  methods: {

    handleFileUpload(event) {
      const file = event.target.files[0]; // 獲取上傳的檔案
      this.selectedFile = file; // 將選擇的檔案存儲在 data 中
      // 在這裡您可以執行上傳檔案的相關邏輯，比如使用 Axios 發送 POST 請求等
    }
  }
};
</script>