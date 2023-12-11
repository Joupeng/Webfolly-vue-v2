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
        <h2>捐款 FAQ</h2>
      </div>


      <div class="button">
        <!-- 當點擊按鈕時調用 addSort 方法 -->

        <div class="btn" @click="itemAddWindow">+ 新增</div>

      </div>

      <div class="FAQTable">
        <!-- thead 部分 -->
        <div class="thead">
          <!-- 欄位標題 -->
          <div class="thItem">編號</div>
          <div class="thItem">標題</div>
          <div class="thItem">內容</div>


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
                <p class="tableP">{{ item.title }}</p>
              </div>
              <div class="tbItem">
                <p class="tableP">{{ item.content }}</p>
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
            <span>新增編輯 / 文章</span>
            <span id="closeModal" class="close"><img src="../assets/images/common/back_iconClose.svg" alt="close"
                @click="closeModal"> </span>
          </header>

          <div class="wrap">

            <div class="wrap_fram">
              <!-- 編號 -->
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
          title: '',
          content: '',


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
  beforeMount() {
    if (localStorage.getItem("items")) {
      this.items = JSON.parse(localStorage.getItem("items"));
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
        // id: '',
        title: '',
        content: '',


      };
    },
    // 新增內容進去
    itemAdd() {
      if (this.itemText[0].id != "") {
        this.items.unshift({
          id: this.itemText[0].id,
          title: this.itemText[0].title,
          content: this.itemText[0].content,

        });
        // // 新增完後彈跳視窗內容清空
        this.itemText[0] = {
          id: '',
          title: '',
          content: '',


        };
        // 把新增的資料存到 localStorage 裡
        // localStorage.setItem("items", JSON.stringify(this.items)); 
        this.addWindow = false;
        this.itemAddWindowOpen = false;
        console.log(this.items[0]);
        fetch('API/back_mediaNetwork_add.php', {
          method: 'POST',
          // mode: 'cors',
          headers: {
            'Content-Type': 'application/json'
          },
          // 建立了一個 JSON 物件，其中有一個屬性名稱為id
          //id.value是指輸入框元素 (<input id="id">) 的當前值
          //多行文字框我改成.innerText
          body: JSON.stringify({
            //  是沒有id值的因為是從資料庫來
            // id: this.tasks[0].id,
            title: this.items[0].title,
            content: this.items[0].content,


          })
        })
          .then(resp => resp.json())
          // 找到父層
          .then(respBody => {
            // 要回傳id回來由資料庫定義的

            // console.log(resbody)

            this.items[0].id = respBody.id;
          });
      } else {
        // 如果有任何一個欄位為空，顯示警示框
        alert('所有欄位都是必填欄位，請填寫完整資訊');

      }


    },
    // 編輯舊有內容
    itemEdit(e, i) {
      this.itemAddWindowOpen = true;
      this.item_index = i;
      this.itemText[0] = {
        id: this.items[i].id,
        title: this.items[i].title,
        content: this.items[i].content,



      };

      this.editWindow = true;
      // this.itemAddWindowOpen = !this.itemAddWindowOpen;
    },

    itemEditOk() {

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

        fetch('API/back_donateFAQ_edit.php', {
          method: 'POST',
          // mode: 'cors',
          headers: {
            'Content-Type': 'application/json'
          },
          // 編輯要把修改的內容傳回去
          body: JSON.stringify({
            // 左側就是去到php裡的對應名稱，大駝峰
            id: this.items[this.item_index].id,
            title: this.items[this.item_index].title,
            content: this.items[this.item_index].content,

          })
        })
          .then(resp => resp.json())
          .then(items => {
            // console.log(items);
            alert("編輯成功");
          })
        this.editWindow = false;
        this.itemAddWindowOpen = false;
      } else {
        // 如果有任何一個欄位為空，顯示警示框
        alert('所有欄位都是必填欄位，請填寫完整資訊');
      }


    },
    // 刪除警告
    warning_open(index) {
      this.warningOpen = index;
    },
    warning_close() {
      this.warningOpen = null
    },
    deleteRow() {

      // localStorage
      // console.log(this.items);
      // setTimeout(() => {
      //   this.items.splice(this.warningOpen, 1);

      //   localStorage.setItem("items", JSON.stringify(this.items));
      //   this.warningOpen = null;
      // }, 50);
      // console.log(this.tasks);
      // 沒有資料庫的時候要加local host
      // localStorage.setItem("tasks", JSON.stringify(this.tasks));

      // 資料連接
      // fetch('http://localhost/API/back_fakeNews_delete.php'
      fetch('API/back_donateFAQ_delete.php', {
        method: 'POST',
        // mode: 'cors',
        headers: {
          'Content-Type': 'application/json'
        },
        // 送資料給php
        body: JSON.stringify({
          id: this.items[this.warningOpen].id,
          // titleLeft: this.tasks[i].title_left,
          // resultLeft: this.tasks[i].result_left,
          // answerLeft: this.tasks[i].answer_left,
          // titleRight: this.tasks[i].title_right,
          // resultRight: this.tasks[i].result_right,
          // answerRight: this.tasks[i].answer_right,
          // date: this.tasks[i].date,
        })


      })
        .then(resp => resp.json())
        .then(items => {
          // console.log(items);
          this.tasks.splice(this.warningOpen, 1);
          alert("刪除成功");
        })
      // 把值刪除
      this.warningOpen = null;

    },

    // 彈跳視窗關閉
    closeModal() {
      this.itemAddWindowOpen = false;
      this.warningOpen = null;

    },
  },
  mounted() {
    // 資料庫串接
    // fetch('http://localhost/API/back_donateFAQ.php')
    fetch('API/back_donateFAQ.php', {
      method: 'POST',
      // mode: 'cors',
      headers: {
        'Content-Type': 'application/json'
      },
    })
      // 處理從伺服器返回的響應（resp 是響應對象），轉成json檔格式
      .then(resp => resp.json())
      .then(items => {
        console.log(items);
        // 放進對應的項目
        this.items = items.map(item_list => {
          return {
            id: item_list.ID,
            title: item_list.QUESTION,
            content: item_list.ANSWER,
          }
        })
      })
  }
};
</script>