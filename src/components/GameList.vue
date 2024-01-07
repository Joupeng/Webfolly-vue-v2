<template>
  <li v-for="(task, index) in tasks" :key="task.id" class="task_list_content">
    <div class="item_flex">
      <div class="left_block">
        <div class="btn_flex">
          <button type="button" class="btn_up" @click="$emit('taskSwap', e, index, 'up')">往上</button>
          <button type="button" class="btn_down" @click="$emit('taskSwap', e, index, 'down')">往下</button>
        </div>
      </div>
      <div class="middle_block">
        <!-- <div class="star_block">
                <span class="star"><i class="ion-ios-star"></i></span>
                <span class="star"><i class="fas fa-star"></i></span>
                <span class="star"><i class="fas fa-star"></i></span>
                <span class="star"><i class="fas fa-star"></i></span>
                <span class="star"><i class="fas fa-star"></i></span>
              </div> -->
        <!-- edit原本的預設是false所以p標籤不會加上none -->
        <p class="para" :class="{ '-none': task.editable }">{{ task.name }}</p>
        <!-- value因為是input -->
        <!-- 一定會加上的task_name_update在,前，使用加上none則是要判斷 -->
        <input type="text" :class="['task_name_update', { '-none': !task.editable }]" placeholder="更新遊戲感想"
          v-model.trim="task.name">
      </div>
      <div class="right_block">
        <div class="btn_flex">
          <!-- 點選後觸發自訂事件 -->
          <!-- 帶入$event就是事件物件，是迴圈再跑所以要帶索引值 -->
          <button type="button" class="btn_update" @click="$emit('taskEdit', $event, index)">更新</button>
          <button type="button" class="btn_delete" @click="$emit('taskRemove', $event, index)">移除</button>
        </div>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  //父層傳過來使用的屬性，本身自層沒有這個定義
  props: ["tasks"],
  // 在子層觸發的事件，要反應在父層頁面
  emits: ["taskEdit", "taskSwap", "taskRemove"]
}
</script>

<style lang="scss" scoped></style>