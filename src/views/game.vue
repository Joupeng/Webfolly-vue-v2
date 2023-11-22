<template>
  <frontnav></frontnav>
  <div class="game_outside_box">
    <div class="game_content_box">
      <div class="title">趣味小測驗</div>
      <div class="content_text">{{ content }}</div>
      <div class="game_image">
        <img src="../assets/images/game_fakenews/world.svg" alt="" class="world">
        <img src="../assets/images/game_fakenews/world_phone.svg" alt="" class="world_phone">
      </div>
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
            <router-link :to="{ name: 'game_fakenews' }" @click="closeNav"><span
                :class="{ 'frontheader_menu-on': $route.name == 'game_fakenews' }">進入遊戲</span></router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <frontfooter></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import frontfooter from '@/components/front_footer.vue'

export default {
  components: {
    frontnav,
    frontfooter,
  },
  data() {
    return {
      content: "現在資訊氾濫且易取得，為了讓大家更理解所謂的誘餌式標題跟假訊息內容，我們來點小測驗吧!就由吉祥物陪伴大家一起闖關，希望透過題目能擁有更高的辨識能力，不會被錯誤訊息所誤導。"
    }
  }
}
</script>