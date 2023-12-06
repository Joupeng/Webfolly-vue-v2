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

        <div class="btn" @click="itemAddWindow">+ 新增</div>

      </div>

      <div class="backTable">
        <!-- thead 部分 -->
        <div class="thead">
          <!-- 欄位標題 -->
          <div class="thItem">編號</div>
          <div class="thItem">標題</div>
          <div class="thItem">內容</div>
          <div class="thItem">連結</div>
          <div class="thItem">縮圖</div>
          <div class="thItem">時間</div>
        </div>

        <!-- tbody 部分 -->
        <div class="tobdyContainer">
          <ul class="itemList">
            <!-- 顯示每個欄位的資料 -->
            <li v-for="(item, index) in items" :key="index" class="itemRow">
              <div class="tbItem">
                <p class="tableP">{{ item.tbNumber }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.tbTitle }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.tbContent }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.tbLink }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.tbPic }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.tbDate }}</p>
              </div>
              <div class="tbItem" @click="itemEdit($event, index)" :class="{ 'edit-on': windowShow }"
                style="cursor: pointer;">
                <p class="tableP">編輯</p>
              </div>
              <div class="tbItem" @click="warning">
                <p class="tableP" style="cursor: pointer;">刪除</p>
              </div>

            </li>
          </ul>
        </div>


      </div>


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





      <!-- ===新增文章彈窗=== -->
      <div class="content" v-if="itemAddWindowOpen">
        <div class="content_frame">
          <header class="modalheader">
            <span>新增編輯 / 文章</span>
            <span id="closeModal" class="close"><img src="../assets/images/common/back_iconClose.svg" alt="close"
                @click="closeModal"> </span>
          </header>

          <div class="wrap">

            <div class="wrap_fram">
              <!-- 編號 -->
              <div class="input_number">
                <p>編號</p>
                <!-- 新增輸入框 -->
                <input type="text" name="" id="" class="input_box" v-model.trim="itemText[0].id" placeholder="必填"
                  v-if="addWindow">
                <!-- 編輯輸入框 -->
                <input type="text" name="" id="" class="input_box" v-model.trim="items[0].id" v-if="editWindow">
              </div>
              <!-- 標題 -->
              <div class="input_title">
                <p>標題</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].title" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[0].title" v-if="editWindow"></textarea>
              </div>
              <!-- 內容 -->
              <div class="input_content">
                <p>內容</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].content" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[0].content" v-if="editWindow"></textarea>
              </div>
              <!-- 連結 -->
              <div class="input_link">
                <p>連結</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].link" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[0].link" v-if="editWindow"></textarea>
              </div>
              <!-- 縮圖 -->
              <div class="input_picture">
                <p>縮圖</p>
                <!-- 新增輸入框 -->
                <input class="input_box_textarea" type="file" ref="fileInput" @change="handleFileUpload" v-if="addWindow">
                <!-- 編輯輸入框 -->
                <input class="input_box_textarea" type="file" ref="fileInput" @change="handleFileUpload"
                  v-if="editWindow">
              </div>
              <!-- 日期 -->
              <div class="input_date">
                <p>日期</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].date" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[0].date" v-if="editWindow"></textarea>
              </div>


            </div>


          </div>

          <div class="button">


            <div class="button_add_window"><button type="button" @click="itemAdd" v-if="addWindow">儲存新增</button></div>
            <div class="button_add_window"><button type="button" @click="itemEditOk" v-if="editWindow">儲存變更</button></div>
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

export default {
  components: {
    backfooter,
    pagination,
    backaside,
  },
  data() {
    return {
      itemAddWindowOpen: false,
      warningOpen: false,
      windowShow: false,
      addWindow: false,
      editWindow: false,
      // input輸入的內容
      itemText: [
        {
          id: '',
          title: '',
          content: '',
          link: '',
          picture: '',
          date: '',
        }
      ],
      // li上有的內容及狀態
      items: [
        {
          tbNumber: '1',
          tbTitle: '標題',
          tbContent: '台灣媒體養成計畫，透過各教育階段共同推動媒體素養教育，提供多樣學習管道及資源，提升學生及國人媒體素養。',
          tbLink: '',
          tbPic: '',
          tbDate: '2022.03.12',
        },
        {
          tbNumber: '2',
          tbTitle: '標題',
          tbContent: '台灣媒體養成計畫，透過各教育階段共同推動媒體素養教育，提供多樣學習管道及資源，提升學生及國人媒體素養。',
          tbLink: '',
          tbPic: '',
          tbDate: '2022.03.12',
        },
      ],

    };
  },
  beforeMount() {
    let all_items = JSON.parse(localStorage.getItem("items"));
    if (all_items) {
      this.items = all_items;
    }
  },
  methods: {
    // 新增內容視窗打開
    itemAddWindow() {
      this.itemAddWindowOpen = !this.itemAddWindowOpen;
      this.windowShow = true;
      this.addWindow = true;
      // 初始化 itemText[0] 為空白狀態
      this.itemText[0] = {
        id: '',
        title: '',
        content: '',
        link: '',
        picture: '',
        date: '',
      };
    },
    // 新增內容進去
    itemAdd() {
      if (this.itemText[0].id != "") {
        this.items.unshift({
          id: this.itemText[0].id,
          title: this.itemText[0].title,
          content: this.itemText[0].content,
          link: this.itemText[0].link,
          picture: this.itemText[0].picture,
          date: this.itemText[0].date,
        });
        // 新增完後會清空
        this.itemText[0] = {
          id: '',
          title: '',
          content: '',
          link: '',
          picture: '',
          date: '',
        };
        // 把新增的資料存到 localStorage 裡
        localStorage.setItem("items", JSON.stringify(this.items));
      }
      this.windowShow = false;
      this.addWindow = false;
      this.itemAddWindowOpen = false;
    },
    // 編輯舊有內容
    itemEdit(e, i) {
      this.itemAddWindowOpen = true;
      this.itemText[0] = {
        id: this.items[i].id,
        title: this.items[i].title,
        content: this.items[i].content,
        link: this.items[i].link,
        picture: this.items[i].picture,
        date: this.items[i].date,

      };
      this.windowShow = true;
      this.editWindow = true;
      // this.itemAddWindowOpen = !this.itemAddWindowOpen;
    },

    itemEditOk() {
      this.windowShow = false;
      this.editWindow = false;
      this.itemAddWindowOpen = false;
      if (this.editWindow) {
        // 編輯操作
        const editedItemIndex = this.items.findIndex(item => item.id === this.itemText[0].id);
        if (editedItemIndex !== -1) {
          this.items[editedItemIndex] = { ...this.itemText[0] };
          localStorage.setItem("items", JSON.stringify(this.items));
        } else {
          // 找不到相對應的內容時
          console.error("Item not found for editing");
        }
      }


    },
    // 刪除警告
    warning() {
      this.warningOpen = !this.warningOpen;
    },
    deleteRow(e, i) {
      e.target.closest("li").classList.add("remove");
      // 1秒後刪掉
      setTimeout(() => {
        this.items.splice(i, 1);
        localStorage.setItem("items", JSON.stringify(this.items));
        this.warningOpen = false;
      }, 50);
    },

    // 彈跳視窗關閉
    closeModal() {
      this.itemAddWindowOpen = false;
      this.warningOpen = false;

    },
  },
};
</script>