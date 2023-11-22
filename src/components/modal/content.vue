
<template>
  <!-- ===文章彈窗=== -->
  <div class="content">
    <div class="content_frame">
      <header class="modalheader">
        <span>新增編輯 / 文章</span>
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

        <!-- 文章標題 -->
        <div>
          <span class="selectTitle"><label for="title">文章標題</label></span>
          <span>
            <textarea v-model="title" class="selectText" placeholder="請輸入標題"></textarea>
            <p>{{ title }}</p>
          </span>
        </div>

        <!-- 檔案上傳 -->
        <div>
          <span class="selectTitle">
            <label for="file">文章縮圖</label>
          </span>

          <span> <input class="selectText" type="file" ref="fileInput" @change="handleFileUpload">
            <!-- 顯示選擇的檔案名稱 -->
          <!-- <div v-if="selectedFile">
              <p>選擇的檔案：{{ selectedFile.name }}</p>
                                    </div> -->
          </span>

        </div>

        <!-- 影音連結輸入 -->
        <div>
          <span class="selectTitle"> <label for="video">影音連結</label></span>

          <span><input class="selectText" type="text" v-model="videoLink" placeholder="輸入影音連結">

            <!-- 顯示影音連結 -->
          <!-- <div v-if="videoLink">
              <p>您輸入的影音連結：{{ videoLink }}</p>
              <video :src="videoLink" controls autoplay></video>
                                  </div> -->
          </span>

        </div>

        <!-- 文章內容 -->
        <div>
          <span class="selectTitle"> <label for="message">文章內容</label></span>

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