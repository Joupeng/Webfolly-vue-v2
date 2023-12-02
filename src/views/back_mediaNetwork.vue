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
        <h2>媒體識讀 - 外網連結</h2>
      </div>


      <div class="button">
        <!-- 當點擊按鈕時調用 addSort 方法 -->
        <div class="btn" @click="addSort" :class="{ '-on': addSortOpen }">+ 新增分類</div>

        <div class="btn" @click="addDetail" :class="{ '-on': addDetailOpen }">+ 新增內容</div>

      </div>

      <ul class="table">
        <!-- thead 部分 -->
        <li class="thead">
          <!-- 欄位標題 -->
          <div class="thNumber">編號</div>
          <div class="thTitle">標題</div>
          <div class="thContent">內容</div>
          <div class="thDate">時間</div>
          <div class="thEdit"></div>
          <div class="thDelet"></div>
        </li>

        <!-- tbody 部分 -->

        <!-- 顯示每個欄位的資料 -->
        <li v-for="(item, index) in items" :key="index" class="tbody">
          <div class="thNumber">
            <p class="tableP">{{ item.thNumber }}</p>
          </div>
          <div class="thTitle">
            <p class="tableP">{{ item.thTitle }}</p>
          </div>
          <div class="thContent">
            <p class="tableP">{{ item.thContent }}</p>
          </div>
          <div class="thDate">
            <p class="tableP">{{ item.thDate }}</p>
          </div>
          <div class="thEdit">
            <p class="tableP">{{ item.thEdit }}</p>
          </div>
          <div class="thDelet" @click="warning">
            <p class="tableP">{{ item.thDelet }}</p>
          </div>

        </li>

      </ul>


      <!-- 刪除彈跳視窗 -->
      <div class="modalWarning" v-if="warningOpen">
        <ul>
          <li><img src="../../src/assets/images/common/back_warning.svg" alt="Warning">
          </li>
          <li>您確定要刪除這筆資料嗎？</li>
          <li>
            <div class="button">

              <!-- 點選確認刪除，執行 deleteRow 方法，並關閉彈窗 -->
              <div class="btn" @click="deleteRow">確認刪除</div>

              <!-- 點選取消刪除，只關閉彈窗 -->
              <div class="btn" @click="closeModal">取消刪除</div>

            </div>
          </li>
        </ul>
      </div>

      <!-- 新增分類視窗 -->

      <div class="modaloutside" v-if="addSortOpen">
        <div class="category">

          <div class="category_frame">

            <header class="modalheader">
              <span>新增分類</span>
              <span id="closeModal" class="close" @click="closeModal"><img
                  src="../assets/images/common/back_iconClose.svg" alt="close"></span>
            </header>

            <form action="">
              <input class="inputcategory" type="text" id="category" name="category" placeholder="請輸入新的分類">
              <input class="inputsave" type="submit" value="儲存變更">
            </form>

            <div class="wrap">
              <table>
                <thead>
                  <tr>
                    <th>編號</th>
                    <th>分類</th>
                    <th>刪除<i class="fa-solid fa-trash"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>
                      <div class="block">政治國際<img src="../assets/images/common/back_iconEditor.svg" alt="editor"></div>
                    </td>
                    <td>
                      <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="trashcan"></div>
                    </td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>
                      <div class="block">生活健康<img src="../assets/images/common/back_iconEditor.svg" alt="editor"></div>
                    </td>
                    <td>
                      <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="trashcan"></div>
                    </td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>
                      <div class="block">科技財金<img src="../assets/images/common/back_iconEditor.svg" alt="editor"></div>
                    </td>

                    <td>
                      <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="trashcan"></div>
                    </td>

                  </tr>

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- ===新增文章彈窗=== -->
      <div class="content" v-if="addDetailOpen">
        <div class="content_frame">
          <header class="modalheader">
            <span>新增編輯 / 文章</span>
            <span id="closeModal" class="close"><img src="../assets/images/common/back_iconClose.svg" alt="close"
                @click="closeModal"> </span>
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
                  <option v-for="category in categorys" :key="category.id" :value="category.id">{{ category.name }}
                  </option>
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



      <!-- <modal_warning></modal_warning> -->
      <!-- <modal_category>
      </modal_category> -->
      <!-- <modal_content></modal_content>
    <modal_quiz></modal_quiz>  -->

      <pagination></pagination>

    </main>
  </div>
  <backfooter></backfooter>
</template>

<script>

import backfooter from '@/components/back_footer.vue'
import pagination from '@/components/pagination.vue'
import backaside from '@/components/back_aside.vue'

// =彈跳視窗=
import modal_warning from '@/components/modal/modal_warning.vue'
import modal_category from '@/components/modal/modal_category.vue'
import modal_content from '@/components/modal/modal_content.vue'
import modal_quiz from '@/components/modal/modal_quiz.vue'


export default {
  components: {
    backfooter,
    pagination,
    backaside,

    modal_warning,
    modal_category,
    modal_content,
    modal_quiz,
  },
  data() {
    return {
      addSortOpen: false,
      addDetailOpen: false,
      warningOpen: false,

      // 新增文章彈窗
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

      items: [
        {
          thNumber: '1',
          thTitle: '標題',
          thContent: '台灣媒體養成計畫，透過各教育階段共同推動媒體素養教育，提供多樣學習管道及資源，提升學生及國人媒體素養。',
          thDate: '2022.03.12',
          thEdit: '編輯',
          thDelet: '刪除'
        },
        {
          thNumber: '2',
          thTitle: '標題',
          thContent: '台灣媒體養成計畫，透過各教育階段共同推動媒體素養教育，提供多樣學習管道及資源，提升學生及國人媒體素養。',
          thDate: '2022.03.12',
          thEdit: '編輯',
          thDelet: '刪除'
        },
      ]

    };


  },
  methods: {
    handleFileUpload(event) {
      const file = event.target.files[0]; // 獲取上傳的檔案
      this.selectedFile = file; // 將選擇的檔案存儲在 data 中
      // 在這裡可以執行上傳檔案的相關邏輯，比如使用 Axios 發送 POST 請求等
    },


    // 彈跳視窗打開
    addSort() {
      this.addSortOpen = !this.addSortOpen;
    },
    addDetail() {
      this.addDetailOpen = !this.addDetailOpen
    },
    warning() {
      this.warningOpen = !this.warningOpen;
    },
    // ====刪除警告===
    deleteRow() {

      // 在這個方法裡處理刪除資料的邏輯
      // 這裡只示範關閉彈跳視窗的邏輯

      // 關閉彈窗


    },
    closeModal() {
      // 關閉彈窗
      this.addSortOpen = false;
      this.addDetailOpen = false;
      // this.deleteModalOpen = false;
      this.warningOpen = false;
    }
  }
}
</script>