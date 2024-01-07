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
    <main class="fakeNews">
      <div class="title">
        <h2>假訊息追擊-題庫</h2>
      </div>
      <div class="add_list"><button type="button" @click="taskAddWindow">+ 新增</button>
      </div>
      <div class="all_box">
        <div class="nav">
          <div class="number">編號</div>
          <div class="title_left">左側題目</div>
          <div class="result_left">左側答案</div>
          <div class="answer_left">左側詳解</div>
          <div class="title_left">右側題目</div>
          <div class="result_left">右側答案</div>
          <div class="answer_left">右側詳解</div>
          <div class="date">日期</div>
        </div>
        <!-- 多個題目進行迴圈 -->
        <div class="container_fake">
          <ul class="taskList">
            <!-- 是V-for所以transition用transition-group，然後tag是要進行的項目 -->
            <transition-group name="fade" tag="li">
              <li v-for="(task, index) in tasks" :key="task.id" class="box_list">
                <!-- <li v-for="(task, index) in tasks" :key="task.id" class="box_list" v-show="deleteWindow != null"> -->
                <div class="lists">
                  <div class="lists_note">{{ index + 1 }}</div>
                </div>
                <div class="lists">
                  <div class="lists_note">{{ task.title_left }}</div>
                </div>
                <div class="lists">
                  <div class="lists_note">{{ task.result_left }}</div>
                </div>
                <div class="lists">
                  <div class="lists_note">{{ task.answer_left }}</div>
                </div>
                <div class="lists">
                  <div class="lists_note">{{ task.title_right }}</div>
                </div>
                <div class="lists">
                  <div class="lists_note">{{ task.result_right }}</div>
                </div>
                <div class="lists">
                  <div class="lists_note">{{ task.answer_right }}</div>
                </div>
                <div class="lists">
                  <div class="lists_note">{{ task.date }}</div>
                </div>
                <!-- $event事件物件vue特殊寫法，這裡不一定用，$emit則適用於元件帶入時候的自訂事件 -->
                <div class="lists"><button type="button" @click="taskEdit(index)"
                    :class="{ '-on': windowShow }">編輯</button>
                </div>
                <div class="lists"><button type="button" @click="taskdeleteWindow(index)">刪除</button></div>
                <!-- <div class="lists"><button type="button" @click="taskRemove($event, index)">刪除</button></div> -->
              </li>
            </transition-group>
          </ul>
        </div>
      </div>
      <div class="add_window" :class="{ '-on': windowShow }">
        <div class="inside_box">
          <div class="header_window">
            <span class="close_text" v-if="addWindow">新增題目</span>
            <span class="close_text" v-if="editWindow">編輯題目</span>
            <span class="close_button" @click="directCloseAdd"><img src="../assets/images/common/back_iconClose.svg"
                alt="close"></span>
          </div>
          <div class="content_window">
            <!-- 根據編輯跟輸入頁面呈現不同的輸入框 -->
            <!-- id來自資料庫自動編號 -->
            <div class="input_title_left all_style">
              <p>左側題目</p>
              <textarea class="input_box_textarea" v-model.trim="taskText[0].title_left" v-if="addWindow"></textarea>
              <textarea class="input_box_textarea" v-model.trim="tasks[item_index].title_left"
                v-if="editWindow"></textarea>
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].title_left"> -->
            </div>
            <div class="input_result_left all_style">
              <p>左側答案</p>
              <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].result_left"
                placeholder="正確填寫1，錯誤填寫2" v-if="addWindow">
              <input type="text" name="" id="" class="input_box" v-model.trim="tasks[item_index].result_left"
                placeholder="正確填寫1，錯誤填寫2" v-if="editWindow">
            </div>
            <div class="input_answer_left all_style">
              <p>左側詳解</p>
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].answer_left"> -->
              <textarea class="input_box_textarea" v-model.trim="taskText[0].answer_left" v-if="addWindow"></textarea>
              <textarea class="input_box_textarea" v-model.trim="tasks[item_index].answer_left"
                v-if="editWindow"></textarea>
            </div>
            <div class="input_title_left all_style">
              <p>右側題目</p>
              <textarea class="input_box_textarea" v-model.trim="taskText[0].title_right" v-if="addWindow"></textarea>
              <textarea class="input_box_textarea" v-model.trim="tasks[item_index].title_right"
                v-if="editWindow"></textarea>
            </div>
            <div class="input_result_left all_style">
              <p>右側答案</p>
              <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].result_right"
                placeholder="正確填寫1，錯誤填寫2" v-if="addWindow">
              <input type="text" name="" id="" class="input_box" v-model.trim="tasks[item_index].result_right"
                placeholder="正確填寫1，錯誤填寫2" v-if="editWindow">
            </div>
            <div class="input_answer_left all_style">
              <p>右側詳解</p>
              <textarea class="input_box_textarea" v-model.trim="taskText[0].answer_right" v-if="addWindow"></textarea>
              <textarea class="input_box_textarea" v-model.trim="tasks[item_index].answer_right"
                v-if="editWindow"></textarea>
            </div>
            <div class="input_date all_style">
              <p>日期</p>
              <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].date" v-if="addWindow"
                placeholder="日期格式:2023/10/01">
              <!-- <p v-if="addWindow">{{ task.date }}</p> -->
              <input type="text" name="" id="" class="input_box" v-model.trim="tasks[item_index].date" v-if="editWindow"
                placeholder="日期格式:2023/10/01">
            </div>
            <!-- 按鈕選項 -->
            <div class="button_add_window" id="btm_add"><button type="button" @click="taskAdd"
                v-if="addWindow">新增</button></div>
            <div class="button_add_window"><button type="button" @click="taskEditOk" v-if="editWindow">修改完成</button></div>
          </div>
        </div>
      </div>
      <!-- 刪除彈跳視窗 -->
      <!-- deleteWindow !== null有要刪除的內容 -->
      <div class="delete_box_outside" v-if="deleteWindow !== null">
        <div class="delete_box">
          <ul>
            <li><img src="../../src/assets/images/common/back_warning.svg" alt="">
            </li>
            <li>您確定要刪除這筆資料嗎？</li>
            <li>
              <div class="button">
                <!-- 點選確認刪除，執行 deleteRow 方法，並關閉彈窗 -->
                <div class="btn" @click="taskRemove(index)">確認刪除</div>
                <!-- 點選取消刪除，只關閉彈窗 -->
                <div class="btn" @click="cancelButton">取消刪除</div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <pagination total-items="30" items-per-page="5" current-page="1"></pagination>
    </main>
  </div>
  <backfooter></backfooter>
</template>

<script>

import backfooter from '@/components/back_footer.vue'
// import pagination from '@/components/pagination.vue'
import backaside from '@/components/back_aside.vue'

export default {
  components: {
    backfooter,
    // pagination,
    backaside,
  },
  data() {
    return {
      item_index: 0,
      windowShow: false,
      addWindow: false,
      editWindow: false,
      // 如果有刪除會帶入值不然就是null
      deleteWindow: null,
      // input輸入的內容
      taskText: [
        {
          id: "",
          title_left: "",
          result_left: "",
          answer_left: "",
          title_right: "",
          result_right: "",
          answer_right: "",
          date: ""
        }
      ],
      // li上有的內容及狀態
      tasks: [
        // {
        //   id: "1",
        //   title_left: "日本排放核廢水引起恐慌，食用碘鹽抗輻射可以抗輻射?",
        //   result_left: "1",
        //   answer_left: "因為碘鹽中的碘元素含量遠低於需要達到防輻射效果的劑量。 且若是要達到防輻射的量，可能會過量，造成高血壓等併發症。 ",
        //   title_right: "碘如果攝取不足，成年人的話會使甲狀腺腫大，出現疲倦、代謝下降等問題?",
        //   result_right: "2",
        //   answer_right: "",
        //   date: "2023/11/12"
        // },
        // {
        //   id: "1",
        //   title_left: "日本排放核廢水引起恐慌，食用碘鹽抗輻射可以抗輻射?",
        //   result_left: "1",
        //   answer_left: "因為碘鹽中的碘元素含量遠低於需要達到防輻射效果的劑量。 且若是要達到防輻射的量，可能會過量，造成高血壓等併發症。 ",
        //   title_right: "碘如果攝取不足，成年人的話會使甲狀腺腫大，出現疲倦、代謝下降等問題?",
        //   result_right: "2",
        //   answer_right: "",
        //   date: "2023/11/12"
        // }
      ]
    }
  },
  // 前端驗證才使用，有資料庫就不用
  beforeMount() {
    // console.log("beforeMount");
    // 要在網站打開時資料取出來
    // let all_tasks = JSON.parse(localStorage.getItem("tasks"));
    // console.log(all_tasks);
    // 把資料放回去
    // this.tasks = all_tasks;

  },
  methods: {
    // 分頁器
    // changePage(step) {
    //   this.currentPage += step;
    //   // 根據 this.currentPage 更新新頁面的數據，例如：發起 API 請求或更新顯示內容
    // },
    taskAddWindow() {
      // alert('123');
      this.windowShow = true;
      this.addWindow = true;
      // 初始化 taskText[0] 為空白狀態

      // 使用 Date 物件獲取當前日期
      const now = new Date();
      // 將日期轉換為 "YYYY/MM/DD" 格式
      const formattedDate = `${now.getFullYear()}/${(now.getMonth() + 1).toString().padStart(2, '0')}/${now.getDate().toString().padStart(2, '0')}`;
      this.taskText[0] = {
        title_left: "",
        result_left: "",
        answer_left: "",
        title_right: "",
        result_right: "",
        answer_right: "",
        date: formattedDate,
      };

    },
    // 新增內容進去，該放入的欄位要放進去
    taskAdd() {
      // 檢查 tasks 數组是否存在，如果一開始都不存在，則初始化为一个空數组
      //問為何，因為一開始有資料在嗎?
      if (!this.tasks) {
        this.tasks = [];
      }
      // 先要求有值再判斷每個欄位的需求
      if (this.taskText[0] != "") {
        // textarea空的時候不代表空字串所以用反轉去想
        if (!this.taskText[0].title_left) {
          alert("請填寫左側題目");
          return;
        }
        // 必須是1或2
        if (this.taskText[0].result_left != 1 && this.taskText[0].result_left != 2) {
          alert("請填寫左側答案，請填寫1或2");
          return;
        }
        // textarea空的時候不代表空字串所以用反轉去想
        if (!this.taskText[0].title_right) {
          alert("請填寫右側題目");
          return;
        }
        // 必須是1或2s
        if (this.taskText[0].result_right != 1 && this.taskText[0].result_right != 2) {
          alert("請填寫右側答案，請填寫1或2");
          return;
        }
        if (!this.taskText[0].date) {
          alert("請填寫日期");
          return;
        }




        this.tasks.unshift({
          title_left: this.taskText[0].title_left,
          result_left: this.taskText[0].result_left,
          answer_left: this.taskText[0].answer_left,
          title_right: this.taskText[0].title_right,
          result_right: this.taskText[0].result_right,
          answer_right: this.taskText[0].answer_right,
          date: this.taskText[0].date,
          // is_fade: false
        });

        // 新增完后会清空
        this.taskText[0] = {
          title_left: "",
          result_left: "",
          answer_left: "",
          title_right: "",
          result_right: "",
          answer_right: "",
          date: ""
        };

        // 將新增的數據存到 localStorage 中
        // localStorage.setItem("tasks", JSON.stringify(this.tasks));

      }
      this.windowShow = false;
      this.addWindow = false;

      console.log(this.tasks[0]);
      // fetch('http://localhost/API/back_fakeNews_add.php'
      fetch('API/back_fakeNews_add.php', {
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
          titleLeft: this.tasks[0].title_left,
          resultLeft: this.tasks[0].result_left,
          answerLeft: this.tasks[0].answer_left,
          titleRight: this.tasks[0].title_right,
          resultRight: this.tasks[0].result_right,
          answerRight: this.tasks[0].answer_right,
          date: this.tasks[0].date,

        })
      })
        .then(resp => resp.json())
        // 找到父層
        .then(resbody => {
          // 要回傳id回來由資料庫定義的

          // console.log(resbody)

          this.tasks[0].id = resbody.id;


          // console.log(res)
          // console.log(res.id)

          // this.tasks[0].id = res.id;
          // console.log(res)
          alert("新增成功");
        })
    },
    // xx按鈕，新增跟編輯有
    directCloseAdd() {
      confirm('確認不新增直接關閉');
      this.windowShow = false;
      this.addWindow = false;
      this.editWindow = false;
    },
    // 點選某一個index要做編輯
    taskEdit(i) {
      //要讓tasks有能定義的index，return也寫進去
      this.item_index = i;
      // console.log(i);

      this.windowShow = true;
      this.editWindow = true;
    },
    // 點選確認編輯鍵才送去後端要求修改資料庫
    taskEditOk() {
      // 將新增的數據存到 localStorage 中，有資料庫可以不寫
      // localStorage.setItem("tasks", JSON.stringify(this.tasks));
      // console.log(this.tasks[this.item_index].title_left);
      if (this.tasks[this.item_index].title_left == "") {
        alert("請填寫左側題目");
        return;
      }
      if (this.tasks[this.item_index].result_left != 1 && this.tasks[this.item_index].result_left != 2) {
        alert("請填寫左側答案，請填寫1或2");
        return;
      }
      // textarea空的時候不代表空字串所以用反轉去想
      if (this.tasks[this.item_index].title_right == "") {
        alert("請填寫右側題目");
        return;
      }
      // 必須是1或2s
      if (this.tasks[this.item_index].result_right != 1 && this.tasks[this.item_index].result_right != 2) {
        alert("請填寫右側答案，請填寫1或2");
        return;
      }
      if (this.tasks[this.item_index].date == "") {
        alert("請填寫日期");
        return;
      }

      // console.log(this.tasks[this.item_index].id);
      // fetch('http://localhost/API/back_fakeNews_edit.php'
      fetch('API/back_fakeNews_edit.php', {
        method: 'POST',
        // mode: 'cors',
        headers: {
          'Content-Type': 'application/json'
        },
        // 編輯要把修改的內容傳回去
        body: JSON.stringify({
          // 左側就是去到php裡的對應名稱，大駝峰
          id: this.tasks[this.item_index].id,
          titleLeft: this.tasks[this.item_index].title_left,
          resultLeft: this.tasks[this.item_index].result_left,
          answerLeft: this.tasks[this.item_index].answer_left,
          titleRight: this.tasks[this.item_index].title_right,
          resultRight: this.tasks[this.item_index].result_right,
          answerRight: this.tasks[this.item_index].answer_right,
          date: this.tasks[this.item_index].date

        })
      })
        .then(resp => resp.json())
        .then(items => {
          // console.log(items);
          alert("編輯成功");
        })
      this.windowShow = false;
      this.editWindow = false;


    },
    // ，li的進入刪除視窗，第幾個放入索引值
    taskdeleteWindow(index) {
      this.deleteWindow = index;
    },
    cancelButton() {
      this.deleteWindow = null;
    },
    // 確定刪除鍵
    taskRemove() {
      // console.log(this.tasks);
      // 沒有資料庫的時候要加localStorage
      // localStorage.setItem("tasks", JSON.stringify(this.tasks));

      // 資料連接
      // fetch('http://localhost/API/back_fakeNews_delete.php'
      fetch('API/back_fakeNews_delete.php', {
        method: 'POST',
        // mode: 'cors',
        headers: {
          'Content-Type': 'application/json'
        },
        // 送資料給php
        body: JSON.stringify({
          id: this.tasks[this.deleteWindow].id,
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
          this.tasks.splice(this.deleteWindow, 1);
          alert("刪除成功");
        })
      // 把值刪除
      this.deleteWindow = null;
    },
    // 分頁器
    // changePage(step) {
    //   this.currentPage += step;
    //   // 根據 this.currentPage 更新新頁面的數據，例如：發起 API 請求或更新顯示內容
    // }


  },
  // 分頁器
  // computed: {
  //   totalPages() {
  //     return Math.ceil(this.totalItems / this.itemsPerPage);
  //   }
  // },
  // 一開始從資料庫拿出資料已有id由資料庫自動編號
  mounted() {
    // 資料庫串接
    // fetch('http://localhost/API/back_fakeNews.php'
    fetch('API/back_fakeNews.php', {
      method: 'POST',
      // mode: 'cors',
      headers: {
        'Content-Type': 'application/json'
      },
    })
      // 處理從伺服器返回的響應（resp 是響應對象），轉成json檔格式
      .then(resp => resp.json())
      .then(items => {
        //console.log(items);
        // 放進對應的項目 this.tasks的對應
        this.tasks = items.map(item_list => {
          return {
            id: item_list.ID,
            title_left: item_list.LTEXT,
            result_left: item_list.ANSWER_LEFT,
            answer_left: item_list.DESCRIPTION_LEFT,
            title_right: item_list.RTEXT,
            result_right: item_list.ANSWER_RIGHT,
            answer_right: item_list.DESCRIPTION_RIGHT,
            date: item_list.CREATE_DATE
          }
        })
      })
  }
}
</script>