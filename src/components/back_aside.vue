<template>
  <aside class="backAside">
    <div>
      <router-link to="/back_medialiteracy" class="mediaNetwork" v-on:click="showmediaNetwork">媒體識讀 - 外網連結</router-link>
      <router-link to="/back_medialiteracy" class="mediaClass">媒體識讀 - 相關課程</router-link>
      <router-link to="/back_medialiteracy">假訊息追擊 - 題庫</router-link>
      <div class="backAccordion">

        <div class="accordion-button" v-on:click="toggleAccordion" :class="{ '-on': BoxOpen }">
          <router-link to="/back_donate" class="donateBtn">捐款管理&nbsp;&nbsp;</router-link>

        </div>

        <div class="accordion-content" v-if="BoxOpen"><router-link class="donateBtnQA" to="/back_donate">捐款
            FAQ</router-link>
        </div>


      </div>
    </div>
  </aside>
</template>
<script>
export default {
  data() {
    return {
      BoxOpen: false,
    };
  },
  methods: {
    toggleAccordion() {
      // alert("abc");
      // 切換 BoxOpen 的值
      this.BoxOpen = !this.BoxOpen;
    },
  }
}
</script>