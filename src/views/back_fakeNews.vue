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
            <span class="close_text">新增編輯 / 題目</span>
            <span class="close_button" @click="directCloseAdd"><img src="../assets/images/common/back_iconClose.svg"
                alt="close"></span>
          </div>
          <div class="content_window">
            <div class="input_number all_style">
              <p>編號</p>
              <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].id" placeholder="必填">
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].id" v-if="addWindow"> -->
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="tasks.id[i]" v-if="editWindow"> -->

            </div>
            <div class="input_title_left all_style">
              <p>左側題目</p>
              <textarea class="input_box_textarea" v-model.trim="taskText[0].title_left"></textarea>
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].title_left"> -->
            </div>
            <div class="input_result_left all_style">
              <p>左側答案</p>
              <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].result_left"
                placeholder="正確填寫1，錯誤填寫2">
            </div>
            <div class="input_answer_left all_style">
              <p>左側詳解</p>
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].answer_left"> -->
              <textarea class="input_box_textarea" v-model.trim="taskText[0].answer_left"></textarea>
            </div>
            <div class="input_title_left all_style">
              <p>右側題目</p>
              <textarea class="input_box_textarea" v-model.trim="taskText[0].title_right"></textarea>
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].title_right"> -->
            </div>
            <div class="input_result_left all_style">
              <p>右側答案</p>
              <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].result_right"
                placeholder="正確填寫1，錯誤填寫2">
            </div>
            <div class="input_answer_left all_style">
              <p>右側詳解</p>
              <textarea class="input_box_textarea" v-model.trim="taskText[0].answer_right"></textarea>
              <!-- <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].answer_right"> -->
            </div>
            <div class="input_date all_style">
              <p>日期</p>
              <input type="text" name="" id="" class="input_box" v-model.trim="taskText[0].date">
            </div>
            <div class="button_add_window"><button type="button" @click="taskAdd" v-if="addWindow">新增</button></div>
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



export default {
  components: {
    backfooter,
    pagination,
    backaside,

  },
  data() {
    return {
      windowShow: false,
      addWindow: false,
      editWindow: false,
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
      this.addWindow = true,
        // 初始化 taskText[0] 為空白狀態
        this.taskText[0] = {
          id: "",
          title_left: "",
          result_left: "",
          answer_left: "",
          title_right: "",
          result_right: "",
          answer_right: "",
          date: ""
        };
    },
    //   // 新增內容進去，該放入的欄位要放進去
    taskAdd() {
      if (this.taskText[0].id != "") {
        this.tasks.unshift({
          id: this.taskText[0].id,
          title_left: this.taskText[0].title_left,
          result_left: this.taskText[0].result_left,
          answer_left: this.taskText[0].answer_left,
          title_right: this.taskText[0].title_right,
          result_right: this.taskText[0].result_right,
          answer_right: this.taskText[0].answer_right,
          date: this.taskText[0].date

        });
        // 新增完後會清空
        this.taskText[0] = {
          id: "",
          title_left: "",
          result_left: "",
          answer_left: "",
          title_right: "",
          result_right: "",
          answer_right: "",
          date: ""
        };
        // 把新增的資料存到localhost裡
        localStorage.setItem("tasks", JSON.stringify(this.tasks));
      }
      this.windowShow = false;
      this.addWindow = false;

    },
    directCloseAdd() {
      confirm('確認不新增直接關閉');
      this.windowShow = false;
      this.addWindow = false;
      this.editWindow = false;
    },
    // 剛剛寫的事件物件跟索引值的參數
    taskEdit(e, i) {

      this.taskText[0] = {
        id: this.tasks[i].id,
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
      this.windowShow = false;
      this.editWindow = false;
      // if (this.editWindow) {
      //   if (this.tasks[i].id,
      //     this.tasks[i].title_left,
      //     this.tasks[i].result_left,
      //     this.tasks[i].answer_left,
      //     this.tasks[i].title_right,
      //     this.tasks[i].result_right,
      //     this.tasks[i].answer_right,
      //     this.tasks[i].date === "") {
      //     alert("請輸入資料");
      //   }
      // }
      // if (this.editWindow) {
      //   this.taskText[0] = {
      //     id: this.tasks[i].id,
      //     title_left: this.tasks[i].title_left,
      //     result_left: this.tasks[i].result_left,
      //     answer_left: this.tasks[i].answer_left,
      //     title_right: this.tasks[i].title_right,
      //     result_right: this.tasks[i].result_right,
      //     answer_right: this.tasks[i].answer_right,
      //     date: this.tasks[i].date
      //   }
      //   localStorage.setItem("tasks", JSON.stringify(this.tasks));
      // }
      if (this.editWindow) {
        // 编辑操作
        const editedTaskIndex = this.tasks.findIndex(task => task.id === this.taskText[0].id);
        if (editedTaskIndex !== -1) {
          this.tasks[editedTaskIndex] = { ...this.taskText[0] };
          localStorage.setItem("tasks", JSON.stringify(this.tasks));
        } else {
          // 处理编辑时找不到对应任务的情况
          console.error("Task not found for editing");
        }
      }


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
    }

  }
}
</script>