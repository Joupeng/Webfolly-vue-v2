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
        <h2>媒體識讀 - 相關課程</h2>
      </div>


      <div class="button">
        <!-- 當點擊按鈕時調用 addSort 方法 -->

        <div class="btn" @click="itemAddWindow">+ 新增</div>

      </div>

      <div class="ClassTable">
        <!-- thead 部分 -->
        <div class="thead">
          <!-- 欄位標題 -->
          <div class="thItem">編號</div>
          <div class="thItem">來源</div>
          <div class="thItem">標題</div>
          <div class="thItem">內容</div>
          <div class="thItem">連結</div>
          <div class="thItem">縮圖</div>

        </div>

        <!-- tbody 部分 -->
        <div class="tobdyContainer">
          <ul class="itemList">
            <!-- 顯示每個欄位的資料 -->
            <!-- key改item.id -->
            <li v-for="(item, index) in items" :key="item.id" class="itemRow">
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
      <!-- 刪除彈跳視窗 -->
      <div class="modalWarning" v-if="warningOpen !== null">
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
      <div class="modalContent" v-if="itemAddWindowOpen">
        <div class="content_frame">
          <header class="modalheader">
            <span class="close_text" v-if="addWindow">新增文章</span>
            <span class="close_text" v-if="editWindow">編輯文章</span>
            <span id="closeModal" class="close"><img src="../assets/images/common/back_iconClose.svg" alt="close"
                @click="closeModal"> </span>
          </header>
          <div class="wrap">
            <div class="wrap_fram">
              <!-- 編號 -->
              <!-- 來源 -->
              <div class="input_title">
                <p>來源</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].source" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[item_index].source" v-if="editWindow"></textarea>
              </div>
              <!-- 標題 -->
              <div class="input_title">
                <p>標題</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].title" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[item_index].title" v-if="editWindow"></textarea>
              </div>
              <!-- 內容 -->
              <div class="input_content">
                <p>內容</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].content" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[item_index].content"
                  v-if="editWindow"></textarea>
              </div>
              <!-- 連結 -->
              <div class="input_link">
                <p>連結</p>
                <!-- 新增輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="itemText[0].link" v-if="addWindow"></textarea>
                <!-- 編輯輸入框 -->
                <textarea class="input_box_textarea" v-model.trim="items[item_index].link" v-if="editWindow"></textarea>
              </div>
              <!-- 縮圖 -->
              <div class="input_picture">
                <p>縮圖</p>
                <!-- 新增輸入框 -->
                <div class="image_box_file" v-if="addWindow">
                  <button type="button" class="image_name">選取檔案
                    <input class="input_box_textarea" type="file" ref="fileInput" id="input_box_textarea"
                      @change="handleFileChange">
                  </button>
                  <!-- <span class="image_text">{{ fileInput }}</span> -->
                  <span class="image_text">{{ fileInput }}</span>
                </div>
                <!-- 編輯輸入框 -->
                <div class="image_box_file" v-if="editWindow">
                  <button type="button" class="image_name">更換檔案
                    <input class="input_box_textarea" type="file" ref="fileInput" id="input_box_textarea"
                      @change="handleFileChange">
                  </button>
                  <!-- <span class="image_text">{{ items[item_index].picture }}</span> -->
                  <span class="image_text">{{ fileInput !== '' ? fileInput : items[item_index].picture }}</span>
                </div>
              </div>
              <div class="button">
                <div class="button_add_window">
                  <div class="btn" type="button" @click="itemAdd" v-if="addWindow">儲存新增</div>
                </div>
                <div class="button_add_window">
                  <div class="btn" type="button" @click="itemEditOk" v-if="editWindow">儲存變更</div>
                </div>
              </div>
            </div>
          </div>

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
import axios from 'axios'

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
      fileInput: '',
      // input輸入的內容
      itemText: [
        {
          // 打開id的位置，資料庫內容要存回來
          id: '',
          source: '',
          title: '',
          content: '',
          link: '',
          picture: '',

        }
      ],
      // li上有的內容及狀態
      items: [
        // id: '',
        // source: '',
        // title: '',
        // content: '',
        // link: '',
        // picture: '',
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
  beforeMount() {
    if (localStorage.getItem("items")) {
      this.items = JSON.parse(localStorage.getItem("items"));
    }


  },
  methods: {
    handleFileChange() {
      this.fileInput = this.$refs.fileInput.files[0].name;

    },
    // handleFileChangeEdit() {
    //   this.fileInput = this.$refs.fileInput.files[0].name;
    // },
    // 新增內容視窗打開
    itemAddWindow() {
      this.itemAddWindowOpen = !this.itemAddWindowOpen;
      this.addWindow = true;
      this.editWindow = false;
      // 初始化 itemText[0] 為空白狀態
      this.itemText[0] = {
        // id: '',
        source: '',
        title: '',
        content: '',
        link: '',
        picture: '',

      };
    },
    // 新增內容進去
    itemAdd() {
      this.fileInput = ''
      if (
        this.itemText[0].id !== '' &&
        this.itemText[0].source !== '' &&
        this.itemText[0].title !== '' &&
        this.itemText[0].content !== '' &&
        this.itemText[0].link !== '' &&
        // 檢查是否選入圖片
        this.$refs.fileInput.files.length > 0
      ) {
        // console.log(this.$refs.fileInput.files[0]);
        const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        // 找到圖片的第一個值[0]是name
        const selectedFile = this.$refs.fileInput.files[0];
        if (!allowedImageTypes.includes(selectedFile.type)) {
          alert('請選擇有效的圖片格式JPEG、PNG 或 GIF');
          return;
        }
        this.items.unshift({
          id: this.itemText[0].id,
          source: this.itemText[0].source,
          title: this.itemText[0].title,
          content: this.itemText[0].content,
          link: this.itemText[0].link,
          //file格式不能用v-model改用ref
          picture: this.$refs.fileInput.files[0].name
          // picture: this.itemText[0].picture,
        });
        // // 新增完後彈跳視窗內容清空
        this.itemText[0] = {
          id: '',
          source: '',
          title: '',
          content: '',
          link: '',
          picture: '',

        };
        // 將要做變更的資料用變數先存進去
        var input = document.querySelector('input[type="file"]')
        // 直接使用FormData方式
        var data = new FormData()
        // input.files[0]等等是變數
        // file會對應php，其他不需要轉譯所以不用
        data.append('file', input.files[0])
        data.append('source', this.items[0].source)
        data.append('link', this.items[0].link)
        data.append('title', this.items[0].title)
        data.append('content', this.items[0].content)

        // http://localhost/API/back_mediaClass_add.php
        fetch('API/back_mediaClass_add.php', {
          method: 'POST',
          // mode: 'cors',
          headers: {
            // 'Content-Type': 'application/json'
          },
          // 根據上面寫好的data帶入
          body: data
        })
          .then(resp => resp.json())
          // 找到父層
          .then(respbody => {
            // 要回傳id回來由資料庫定義的
            this.items[0].id = respbody.id;
            this.items[0].picture = respbody.filePath;
            // console.log(taskList)
            alert("新增成功");
            console.log("新增成功")
          })
        this.addWindow = false;
        this.itemAddWindowOpen = false;
      } else {
        alert('所有欄位都是必填欄位，請填寫完整資訊');
      }
    },
    // 編輯舊有內容
    itemEdit(e, i) {
      this.itemAddWindowOpen = true;
      this.addWindow = false;
      this.item_index = i;
      // this.itemText[0] = {
      //   id: this.items[i].id,
      //   source: this.items[i].source,
      //   title: this.items[i].title,
      //   content: this.items[i].content,
      //   link: this.items[i].link,
      //   picture: this.items[i].picture,


      // };

      this.editWindow = true;
    },
    itemEditOk() {
      this.fileInput = ''
      if (this.items[this.item_index].id !== '' &&
        this.items[this.item_index].source !== '' &&
        this.items[this.item_index].title !== '' &&
        this.items[this.item_index].content !== '' &&
        this.items[this.item_index].link !== '' &&
        // 檢查是否選入圖片
        this.$refs.fileInput.files.length > 0) {
        this.items[this.item_index].picture = this.$refs.fileInput.files[0].name
        // 編輯操作
        console.log(this.items[this.item_index].picture);
        var input = document.querySelector('input[type="file"]')
        // 直接使用FormData方式
        var data = new FormData()
        // input.files[0]等等是變數
        // file會對應php，其他不需要轉譯所以不用
        data.append('file', this.items[this.item_index].picture)
        data.append('id', this.items[this.item_index].id)
        data.append('source', this.items[this.item_index].source)
        data.append('link', this.items[this.item_index].link)
        data.append('title', this.items[this.item_index].title)
        data.append('content', this.items[this.item_index].content)
        fetch('/API/back_mediaClass_edit.php', {
          method: 'POST',
          // mode: 'cors',

          // 要對應php裡的名稱
          body: data
          // body: JSON.stringify({
          //   id: this.items[this.item_index].id,
          //   title: this.items[this.item_index].title,
          //   source: this.items[this.item_index].source,
          //   content: this.items[this.item_index].content,
          //   link: this.items[this.item_index].link,
          //   picture: this.items[this.item_index].picture,
          // })
        })
          .then(resp => resp.json())
          .then(respbody => {
            // 要回傳id回來由資料庫定義的
            this.items[item_index].picture = respbody.filePath;
            // alert("新增成功");
            // console.log("新增成功")
          })
        // alert("編輯成功")
        // } else {
        //   // 如果有任何一個欄位為空，顯示警示框
        //   alert('所有欄位都是必填欄位，請填寫完整資訊');
        // }
        // } else {
        //   // 找不到相對應的內容時
        //   console.error("Item not found for editing");
      }

      this.editWindow = false;
      this.itemAddWindowOpen = false;
      this.fileEdit = false;

    },
    // 刪除警告
    warning_open(index) {
      this.warningOpen = index;
    },
    warning_close() {
      this.warningOpen = null
    },
    deleteRow() {

      // console.log(this.items);
      setTimeout(() => {

        // console.log(this.items[this.warningOpen].id)
        // http://localhost/API/back_mediaClass_delete.php
        fetch('API/back_mediaClass_delete.php', {
          method: 'POST',
          // mode: 'cors',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            id: this.items[this.warningOpen].id,
          })
        })
          .then(resp => resp.json())
        this.items.splice(this.warningOpen, 1);
        // console.log(lists);
        // localStorage.setItem("items", JSON.stringify(this.items));
        this.warningOpen = null;
        // alert('刪除成功')
      }, 50);


    },

    // 彈跳視窗關閉
    closeModal() {
      this.itemAddWindowOpen = false;
      this.warningOpen = null;
      this.addWindow = false;
      this.editWindow = false;

    },
  },
  mounted() {
    // 資料庫串接
    // http://localhost/API/back_mediaClass.php
    fetch('API/back_mediaClass.php', {
      method: 'POST',
      // mode: 'cors',
      headers: {
        'Content-Type': 'application/json'
      },
    })
      .then(resp => resp.json())
      .then(lists => {
        //console.log(items);
        // 這是回傳
        // 放進對應的項目this.items
        this.items = lists.map(item_list => {
          return {
            id: item_list.ID,
            title: item_list.TITLE,
            source: item_list.SOURCE,
            content: item_list.DIRECTION,
            link: item_list.LINKS,
            picture: item_list.PHOTO,
          }
        })
      })
  }
};
</script>