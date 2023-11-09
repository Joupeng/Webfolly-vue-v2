<template>
  <div class="game_fakenews">
    <div class="pillar_left" @click="createGrowRectangle">
      <div class="bridge"></div>
      <div class="yellow"><img src="../images/game_fakenews/game_fakenews_yellow.svg" class="yellow_img" alt=""></div>
    </div>
    <div class="pillar_right">
      <div class="black"><img src="../images/game_fakenews/game_fakenews_stand.svg" alt=""></div>
    </div>
    <!-- 手機板 -->
    <div class="window" id="window">
      <div class="outer_box_text">
        <div class="text_window">
          <p>{{ text_small }}</p>
        </div>
      </div>
      <div class="stand_circle_photo"><img src="../images/game_fakenews/game_fakenews_circle_stand.svg" alt=""></div>
    </div>
    <div v-if="isVisible" class="black_background" id="black_background"></div>
    <div class="black_background_phone" id="black_background_phone">
    </div>

    <div class="return"><img src="../images/game_fakenews/game_fakenews_return.svg" class="return_photo"></div>
    <div v-if="isVisible" class="show_text" id="show_text">
      <p>{{ text_big }}</p>
      <button type="button" @click="skipButton" id="button">略過</button>
    </div>
    <div v-if="isVisible" class="img_container" id="img_container">
      <img src="../images/game_fakenews/game_fakenews_big_stand.svg" class="big_stand">
      <img src="../images/game_fakenews/game_fakenews_medium_stand.svg" class="medium_stand" alt="">
    </div>
  </div>
</template>
<script>
// gsap失敗
// import { gsap } from 'gsap';
export default {
  data() {
    return {
      text_small: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的 ?",
      text_big: "為了讓你擁有正確媒體識別能力，我將出幾道題目，讓你猜猜哪一個是正確的 ?",
      isVisible: true,
    }
  },
  methods: {
    skipButton(e) {
      // alert(123);
      this.isVisible = false;
    },
    // 橋沒有出現
    createGrowRectangle() {
      // alert(123);
      let bridge = document.getElementsByClassName("bridge")[0];
      if (window.innerWidth <= 667) {
        bridge.classList.add("-bridge-small");
      } else if (window.innerWidth <= 992) {
        bridge.classList.add("-bridge-medium");
      } else if (window.innerWidth <= 1200) {
        bridge.classList.add("-bridge-large");
      } else {
        bridge.classList.add("-bridge-largest");

      }

      let character_walk = document.getElementsByClassName("yellow")[0];
      character_walk.classList.add("-on");
    },
    // 失敗
    // mounted() {
    //   gsap.to("#window", {
    //     scaleY: 0,
    //     delay: 5,
    //     duration: 1,
    //     y: 50,
    //     ease: "power1.out"
    //   });
    //   gsap.to("#black_background_phone", {
    //     scaleY: 0,
    //     delay: 5,
    //     duration: 1,
    //     y: 50,
    //     ease: "power1.out"
    //   });
    // }
  }
}

</script>

