<template>
  <div class="unified_pagination" :actpage="currentPage">
    <a href="#!" @click="changePage(-1)" class="unified_pagination_i">上一頁</a>
    <a v-for="pageNumber in totalPages" :key="pageNumber" :href="`#!${pageNumber}`" class="unified_pagination_i">{{
      pageNumber }}</a>
    <a href="#!+1" @click="changePage(1)" class="unified_pagination_i">下一頁</a>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentPage: 1,
      totalItems: 30, // 替換為實際的項目總數
      itemsPerPage: 10 // 替換為每頁顯示的項目數
    };
  },
  computed: {
    totalPages() {
      return Math.ceil(this.totalItems / this.itemsPerPage);
    }
  },
  methods: {
    changePage(step) {
      this.currentPage += step;
      // 根據 this.currentPage 更新新頁面的數據，例如：發起 API 請求或更新顯示內容
    }
  }
};
</script>

<!-- <template>
  其他 HTML 元素
  <div>
    顯示資料的區域
    <ul>
      <li v-for="(item, index) in paginatedItems" :key="index">
        顯示資料的內容
        ...
      </li>
    </ul>

    分頁控制元件
    <paginate
      :page-count="pageCount"
      :click-handler="changePage"
      :prev-text="'上一頁'"
      :next-text="'下一頁'"
    >
    </paginate>
  </div>
</template>

<script>
import Paginate from 'vuejs-paginate';

export default {
  components: {
    Paginate,
  },
  data() {
    return {
      items: [],  你的資料
      currentPage: 1,  當前頁碼
      perPage: 10,  每頁顯示的資料量
    };
  },
  computed: {
    paginatedItems() {
      const startIndex = (this.currentPage - 1) * this.perPage;
      const endIndex = startIndex + this.perPage;
      return this.items.slice(startIndex, endIndex);
    },
    pageCount() {
      return Math.ceil(this.items.length / this.perPage);
    },
  },
  methods: {
    changePage(pageNumber) {
      this.currentPage = pageNumber;
    },
  },
};
</script> -->

