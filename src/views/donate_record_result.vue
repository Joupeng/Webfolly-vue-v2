<template>
  <frontnav></frontnav>
  <section class="donate_record_result">

    <!-- 捐款徵信紀錄 -->
    <div class="titleBlock">
      <div class="titleBlockA">
        <p class="titleText">捐款徵信紀錄</p>
      </div>
    </div>


    <ul>
      <li class="first_li">
        <div>
          <p>姓名</p>
          <p>捐款金額</p>
          <p>捐款時間</p>
        </div>
      </li>
      <li class="white_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="gray_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="white_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="gray_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="white_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="gray_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="white_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="gray_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="white_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
      <li class="gray_li">
        <div>
          <p>XXX</p>
          <p>NT$200</p>
          <p>2023/02</p>
        </div>
      </li>
    </ul>

    <div>
      <div class="unified_pagination" :actpage="paginationPage">
        <a href="#!-1" class="unified_pagination_i">上一頁</a>
        <a href="#!1" class="unified_pagination_i">1</a>
        <a href="#!2" class="unified_pagination_i">2</a>
        <a href="#!3" class="unified_pagination_i">3</a>
        <a href="#!4" class="unified_pagination_i">4</a>
        <a href="#!5" class="unified_pagination_i">5</a>
        <a href="#!6" class="unified_pagination_i">6</a>
        <a href="#!+1" class="unified_pagination_i">下一頁</a>
      </div>
    </div>



  </section>
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
      paginationPage: 1,
    };
  },
  mounted() {
    const unifiedPagination = document.querySelector('.unified_pagination');
    const paginationLinks = unifiedPagination.querySelectorAll('.unified_pagination_i');

    paginationLinks.forEach(link => {
      link.addEventListener('click', () => {
        const go = link.getAttribute('href').replace('#!', '');
        if (go === '+1') {
          this.paginationPage++;
        } else if (go === '-1') {
          this.paginationPage--;
        } else {
          this.paginationPage = parseInt(go, 10);
        }
      });
    });
  },
};
</script>