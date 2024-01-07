<template>
  <frontnav></frontnav>
  <div class="game_outside_box">
    <div class="game_content_box">
      <div class="title">趣味小測驗</div>
      <div class="content_text">{{ content }}</div>

    </div>
    <div class="game_choice_outside">
      <div class="choice_title">選擇遊戲進入挑戰</div>
      <div class="card_outside">
        <div class="game_character_photo">
          <img src="../assets/images/game_fakenews/game_black_img.svg" alt="" class="black">
          <img src="../assets/images/game_fakenews/game_yellow.svg" alt="" class="yellow">
        </div>
        <div class="card_inside">
          <div class="text_box">
            <div class="text_title">假訊息追擊</div>
            <div class="text_introduce">
              <ol class="list_content">
                <li>玩家會在橋中間與關主進行問答，會有兩道題目，需要選擇正確的訊息。</li>
                <li>當玩家選擇錯誤時，橋會從中間斷裂，共有三次機會，題目共四題。</li>
              </ol>
            </div>
            <router-link :to="{ name: 'game_fakenews' }"><span
                :class="{ 'frontheader_menu-on': $route.name == 'game_fakenews' }">進入遊戲</span></router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="title_note">
    <p>快來跟我們分享挑戰後的心得</p>
  </div>
  <div class="game_image">
    <img src="../assets/images/game_fakenews/world.svg" alt="" class="world">
    <img src="../assets/images/game_fakenews/world_phone.svg" alt="" class="world_phone">
  </div>
  <article class="task_container_game">
    <button type="button" class="button_empty" @click="taskClear">清空</button>
    <h1 class="titleNote">遊戲留言板</h1>
    <div class="task_add_block" ref="taskAddBlock">
      <!-- 除了focus blur只有按下enter才會執行 -->
      <input type="text" class="task_name" placeholder="輸入遊戲感想…" v-on:focus="toggleShadow" @blur="toggleShadow"
        v-model.trim="taskText" @keyup.enter="taskAdd">
      <button type="button" class="task_add" @click="taskAdd">新增</button>
    </div>
    <div class="task_list_parent">
      <ul class="task_list" ref="taskList">
        <!-- 傳遞給子層使用的屬性tasks，使用v-bind進行綁定內容 -->
        <!-- 觸發task-edit事件然後執行taskEdit函式 -->
        <GameList :tasks="tasks" @task-edit="taskEdit" @task-swap="taskSwap" @task-remove="taskRmove"></GameList>
      </ul>
    </div>
  </article>
  <frontfooter></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import GameList from '@/components/GameList.vue'
import frontfooter from '@/components/front_footer.vue'
// 區域掛載
export default {
  components: {
    frontnav,
    GameList,
    frontfooter,
  },
  data() {
    return {
      content: "現在資訊氾濫且易取得，為了讓大家更理解所謂假訊息內容，我們來點小測驗吧!就由吉祥物陪伴大家一起闖關，希望透過題目能擁有更高的辨識能力，不會被錯誤訊息所誤導。",
      // 留言區的存放位置
      taskText: "",
      tasks: [
        // {
        //   id: "123",
        //   name: "ttt",
        //   editable: false,
        // }
      ]
    };
  },
  beforeMount() {
    // 進來頁面就顯示
    // console.log('11');
    let all_tasks = JSON.parse(localStorage.getItem("tasks"));
    // console.log(all_tasks);
    // 再放回陣列中
    //要有資料才放入，不然如果是陣列是空的跑迴圈，會有問題，所以要有判斷式
    if (all_tasks)
      this.tasks = all_tasks;
  },
  methods: {
    //focus blur事件觸發
    toggleShadow() {
      // console.log("ttt");
      // console.log(this.$refs.taskAddBlock);
      this.$refs.taskAddBlock.classList.toggle('-on');
    },
    taskAdd() {
      // 輸入的字要放進去陣列
      if (this.taskText != "") {
        this.tasks.unshift({
          id: Date.now(),
          name: this.taskText,
          editable: false
        });
        this.taskText = "";
      }
      // 存入我們的陣列，陣列需要字串化才能存
      localStorage.setItem("tasks", JSON.stringify(this.tasks));
    },
    //找到ul然後找到每個li讓他淡出
    //清空
    taskClear() {
      // console.log('clear');
      let r = confirm("確認要刪除嗎?");
      //是true就做刪除
      if (r) {
        //抓到第一層子元素，就是li
        for (let i = 0; i < this.$refs.taskList.children.length; i++) {
          // console.log(i);
          // 每次跑出來的li要加上fadeout，全部都會不見
          this.$refs.taskList.children[i].classList.add("fade_out");
        }
        //必須是箭頭函式才會是vue model的東西不然會是window
        setTimeout(() => {
          this.tasks = [];
          // 要清除localStorage不然重load會回來
          localStorage.clear();
        }, 1000);
      }
    },
    // e就是子層那個事件物件event
    taskEdit(e, i) {
      // console.log(e);
      // alert(i);tasks []
      // 陣列所以要用index，點選進行反轉
      //第一次按是false所以進到else裡可編輯狀態，第二次按是true會進到if裡
      if (this.tasks[i].editable) {
        if (this.tasks[i].name == "") {
          alert("請輸入資料");
        } else {
          // 有打字就變回不可編輯狀態，存入localstorage
          this.tasks[i].editable = !this.tasks[i].editable;
          localStorage.setItem("tasks", JSON.stringify(this.tasks));
        }
      } else {
        this.tasks[i].editable = !this.tasks[i].editable;
        // alert(i);
      }

    },
    taskSwap(e, i, direction) {
      // alert(direction);
      //要限制第一個不能進入這個判斷
      if (direction == "up" && i !== 0) {
        // alert("12");
        // alert(i);
        //this.tasks [{1},{2},{3}] =>  this.tasks [{2},{1},{3}]
        [this.tasks[i - 1], this.tasks[i]] = [this.tasks[i], this.tasks[i - 1]]
        localStorage.setItem("tasks", JSON.stringify(this.tasks));
      }
      // 會限制只有最後一個不能進去，最後一個減去1不會小於
      if (direction == "down" && i < this.tasks.length - 1) {
        // alert("ttt");
        //alert(i);   //index從0開始
        // alert(this.tasks.length);  //個數
        //this.tasks [{1},{2},{3}] =>  this.tasks [{1},{3},{2}]
        [this.tasks[i], this.tasks[i + 1]] = [this.tasks[i + 1], this.tasks[i]]
        localStorage.setItem("tasks", JSON.stringify(this.tasks));
      }
    },
    taskRmove(e, i) {
      // alert(i);
      // console.log(e);
      // this.tasks  [{1},{2},{3} ,splice(1,1)從索引值1刪除1筆資料]
      let r = confirm("要移除嗎?");
      if (r) {
        // this.tasks[i]
        // console.log(e.target);  //印出事件觸發的元素，是當下的按鈕
        // console.log(e.target.closest("li"));
        e.target.closest("li").classList.add("fade_out");
        // 1秒鐘後執行箭頭函式的內容
        setTimeout(() => {
          this.tasks.splice(i, 1);
          localStorage.setItem("tasks", JSON.stringify(this.tasks))
        }, 1000);
      }
    }
  }
}
</script>