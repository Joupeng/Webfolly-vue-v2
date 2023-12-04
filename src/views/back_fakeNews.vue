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
        <div class="container_fake">
          <ul class="taskList">
            <li v-for="(task, index) in tasks" :key="index" class="box_list">
              <div class="lists">{{ task.id }}</div>
              <div class="lists">{{ task.title_left }}</div>
              <div class="lists">{{ task.result_left }}</div>
              <div class="lists">{{ task.answer_left }}</div>
              <div class="lists">{{ task.title_right }}</div>
              <div class="lists">{{ task.result_right }}</div>
              <div class="lists">{{ task.answer_right }}</div>
              <div class="lists">{{ task.date }}</div>
              <!-- $event事件物件vue特殊寫法，這裡不一定用，$emit則適用於元件帶入時候的自訂事件 -->
              <div class="lists"><button type="button" @click="taskEdit($event, index)"
                  :class="{ '-on': windowShow }">編輯</button></div>
              <div class="lists"><button type="button" @click="taskRemove">刪除</button></div>
            </li>
            <!-- <li class="box_list">
            <div class="lists">1</div>
            <div class="lists">台灣媒體養成計畫</div>
            <div class="lists">台灣媒體養成計畫，透過各教育階段共同推...</div>
            <div class="lists">2023/11/12</div>
            <div class="lists"><button type="button">編輯</button></div>
            <div class="lists"><button type="button">刪除</button></div>
          </li>
          <li class="box_list">
            <div class="lists">1</div>
            <div class="lists">台灣媒體養成計畫</div>
            <div class="lists">台灣媒體養成計畫，透過各教育階段共同推...</div>
            <div class="lists">2023/11/12</div>
            <div class="lists"><button type="button">編輯</button></div>
            <div class="lists"><button type="button">刪除</button></div>
          </li> -->
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
            <!-- <div class="input_number all_style">
              <p>編號</p> -->
            <!-- 根據編輯跟輸入頁面呈現不同的輸入框 -->
            <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].id" placeholder="必填"
                v-if="addWindow">
              <input type="text" name="" id="" class="input_box" v-model.trim="tasks[0].id" v-if="editWindow">
            </div> -->
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
              <input type="text" name="" id="" class="input_box" v-model.trim="tasks[item_index].date" v-if="editWindow"
                placeholder="日期格式:2023/10/01">
            </div>
            <!-- <div>
              <datepicker v-model="selectedDate"></datepicker>
              <p>選擇的日期: {{ selectedDate }}</p>
            </div> -->
            <div class="button_add_window" id="btm_add"><button type="button" @click="taskAdd"
                v-if="addWindow">新增</button></div>
            <div class="button_add_window"><button type="button" @click="taskEditOk" v-if="editWindow">修改完成</button></div>
          </div>
        </div>
      </div>
      <!-- 刪除彈跳視窗 -->
      <!-- <div class="modalWarning" v-if="warningOpen">
        <ul>
          <li><img src="../../src/assets/images/common/back_warning.svg" alt="Warning">
          </li>
          <li>您確定要刪除這筆資料嗎？</li>
          <li>
            <div class="button"> -->

      <!-- 點選確認刪除，執行 deleteRow 方法，並關閉彈窗 -->
      <!-- <div class="btn" @click="deleteRow">確認刪除</div> -->

      <!-- 點選取消刪除，只關閉彈窗 -->
      <!-- <div class="btn" @click="closeModal">取消刪除</div>

            </div>
          </li>
        </ul>
      </div> -->
      <pagination></pagination>

    </main>
  </div>
  <backfooter></backfooter>
</template>

<script>

import backfooter from '@/components/back_footer.vue'
import pagination from '@/components/pagination.vue'
import backaside from '@/components/back_aside.vue'
// import Datepicker from 'vue-datepicker';



export default {
  components: {
    backfooter,
    pagination,
    backaside,
    // Datepicker
  },
  data() {
    return {
      item_index: 0,
      windowShow: false,
      addWindow: false,
      editWindow: false,
      // selectedDate: null,
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
  beforeMount() {
    // console.log("beforeMount");
    // 要在網站打開時資料取出來
    let all_tasks = JSON.parse(localStorage.getItem("tasks"));
    // console.log(all_tasks);
    // 把資料放回去
    this.tasks = all_tasks;

  },
  methods: {
    taskAddWindow() {
      // alert('123');
      this.windowShow = true;
      this.addWindow = true;
      // 初始化 taskText[0] 為空白狀態
      this.taskText[0] = {
        // id: "",
        title_left: "",
        result_left: "",
        answer_left: "",
        title_right: "",
        result_right: "",
        answer_right: "",
        date: ""
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
        // if (!this.taskText[0].id) {
        //   alert("請填寫編號");
        //   return;
        // }
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
          // id: this.taskText[0].id,
          title_left: this.taskText[0].title_left,
          result_left: this.taskText[0].result_left,
          answer_left: this.taskText[0].answer_left,
          title_right: this.taskText[0].title_right,
          result_right: this.taskText[0].result_right,
          answer_right: this.taskText[0].answer_right,
          date: this.taskText[0].date
        });

        // 新增完后会清空
        this.taskText[0] = {
          // id: "",
          title_left: "",
          result_left: "",
          answer_left: "",
          title_right: "",
          result_right: "",
          answer_right: "",
          date: ""
        };

        // 将新增的数据存储到 localStorage 中
        localStorage.setItem("tasks", JSON.stringify(this.tasks));

      }
      this.windowShow = false;
      this.addWindow = false;
      // 跟fetch有關的
      // const id = document.querySelector("#id");
      // const titleLeft = document.querySelector("#title_left");
      // const resultLeft = document.querySelector("#result_left");
      // const answerLeft = document.querySelector("#answer_left");
      // const titleRight = document.querySelector("#title_right");
      // const resultRight = document.querySelector("#result_right");
      // const answerRight = document.querySelector("#answer_right");
      // const date = document.querySelector("#date");

      fetch('http://localhost/API/back_fakeNews_add.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Content-Type': 'application/json'
        },
        // 建立了一個 JSON 物件，其中有一個屬性名稱為id
        //id.value是指輸入框元素 (<input id="id">) 的當前值
        //多行文字框我改成.innerText
        body: JSON.stringify({
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
      then(resp => resp.json())
        // 找到父層
        .then(taskList => {
          console.log(taskList)
        })
    },
    directCloseAdd() {
      confirm('確認不新增直接關閉');
      this.windowShow = false;
      this.addWindow = false;
      this.editWindow = false;
    },
    // 剛剛寫的事件物件跟索引值的參數
    taskEdit(e, i) {
      //要讓tasks有能定義的index，return也寫進去
      this.item_index = i;
      // console.log(i);
      this.taskText[0] = {
        // id: this.tasks[i].id,
        title_left: this.tasks[i].title_left,
        result_left: this.tasks[i].result_left,
        answer_left: this.tasks[i].answer_left,
        title_right: this.tasks[i].title_right,
        result_right: this.tasks[i].result_right,
        answer_right: this.tasks[i].answer_right,
        date: this.tasks[i].date

      };


      this.windowShow = true;
      this.editWindow = true;
    },
    taskEditOk() {
      // if (this.tasks[i] != "") {
      //   if (this.taskText[i].id != "") {
      //     alert("請填寫編號");
      //     return;
      //   }
      //   // textarea空的時候不代表空字串所以用反轉去想
      //   if (!this.taskText[i].title_left) {
      //     alert("請填寫左側題目");
      //     return;
      //   }
      //   // 必須是1或2
      //   if (this.taskText[i].result_left != 1 && this.taskText[0].result_left != 2) {
      //     alert("請填寫左側答案，請填寫1或2");
      //     return;
      //   }
      //   // textarea空的時候不代表空字串所以用反轉去想
      //   if (!this.taskText[i].title_right) {
      //     alert("請填寫右側題目");
      //     return;
      //   }
      //   // 必須是1或2s
      //   if (this.taskText[i].result_right != 1 && this.taskText[0].result_right != 2) {
      //     alert("請填寫右側答案，請填寫1或2");
      //     return;
      //   }
      //   if (!this.taskText[0].date) {
      //     alert("請填寫日期");
      //     return;
      //   }
      // } else {
      //   localStorage.setItem("tasks", JSON.stringify(this.tasks));
      // }
      this.windowShow = false;
      this.editWindow = false;


    },
    taskRemove(e, i) {
      let r = confirm("要移除嗎");
      // 真的要刪除進入判斷式
      if (r) {
        // 確認是否是刪除的按鈕，來判斷有找到那行li，事件觸發的元素e.target
        // console.log(e.target.closest("li"));
        e.target.closest("li").classList.add("remove");
        // 1秒後刪掉
        setTimeout(() => {
          this.tasks.splice(i, 1);
          localStorage.setItem("tasks", JSON.stringify(this.tasks));
        }, 50);

      }
    },



  },
  mounted() {
    // 資料庫串接
    fetch('http://localhost/API/back_fakeNews.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Content-Type': 'application/json'
      },
    })
      // 處理從伺服器返回的響應（resp 是響應對象），轉成json檔格式
      .then(resp => resp.json())
      .then(items => {
        // console.log(items);
        // 放進對應的項目
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