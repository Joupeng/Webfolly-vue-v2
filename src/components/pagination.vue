<template>
  <div class="unified_pagination" :actpage="currentPage">
    <a href="#!" @click="$emit('changePage', -1)" class="unified_pagination_i">上一頁</a>
    <a v-for="pageNumber in totalPages" :key="pageNumber" :href="`#!${pageNumber}`" class="unified_pagination_i">{{
      pageNumber }}</a>
    <a href="#!+1" @click="$emit('changePage', 1)" class="unified_pagination_i">下一頁</a>
  </div>
</template>

<script>
export default {
  props: ["totalItems", "itemsPerPage", "currentPage"],
  emits: ["changePage"],
  // data() {
  //   return {
  //     currentPage: 1,
  //     totalItems: 30, // 替換為實際的項目總數
  //     itemsPerPage: 10 // 替換為每頁顯示的項目數
  //   };
  // },
  computed: {
    totalPages() {
      return Math.ceil(this.totalItems / this.itemsPerPage);
    }
  },
  // methods: {
  //   changePage(step) {
  //     this.currentPage += step;
  //     // 根據 this.currentPage 更新新頁面的數據，例如：發起 API 請求或更新顯示內容
  //   }
  // }
};
</script>