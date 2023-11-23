<template>
  <!-- 捐款管理 -->
  <header class="backheader">
    <div class="right">
      <router-link to="/back_account">帳號設定</router-link>
      <router-link to="/back_login">登出</router-link>
    </div>

  </header>

  <div class="back_container">

    <!-- 側邊欄 -->
    <backaside></backaside>
    <main class="backDonate">
      <div class="title">
        <h2>捐款管理</h2>
      </div>

      <div class="bar">
        <div class="search">
          <div>捐款紀錄查詢</div>
          <form action=""><img src="../assets/images/donate/iconCalendar.svg" alt="Calendar"><input class="inputserch"
              type="text" name="" id="search" placeholder="2023-11-22">
          </form>
          <form action=""><img src="../assets/images/donate/iconCalendar.svg" alt="Calendar"><input class="inputserch"
              type="text" name="" id="search" placeholder="2023-11-22"></form>
          <div class="searchbtn">查詢</div>

        </div>
        <div class="btn">匯出Excel檔案</div>
      </div>


      <div class="wrap">
        <table>
          <thead>
            <tr>
              <th>編號</th>
              <th>姓名</th>
              <th>綠界訂單編號</th>
              <th>捐款金額</th>
              <th>捐款日期</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>
                <div class="block">王安石</div>
              </td>
              <td>
                <div class="block"> 200731161405
                </div>
              </td>
              <td>500</td>
              <td>
                <div class="edit">2023-11-16</div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>
                <div class="block">李小白</div>
              </td>
              <td>
                <div class="block">200731161407</div>
              </td>
              <td>500</td>
              <td>
                <div class="edit">2023-11-18</div>
              </td>

            </tr>
            <tr>
              <td>3</td>
              <td>
                <div class="block">杜大甫</div>
              </td>
              <td>
                <div class="block">200731161409</div>
              </td>
              <td>500</td>
              <td>
                <div class="edit">2023-11-20</div>
              </td>

            </tr>
            <tr>
              <td>4</td>
              <td>
                <div class="block">歐陽修</div>
              </td>
              <td>
                <div class="block">200731161411</div>
              </td>
              <td>500</td>
              <td>
                <div class="edit">2023-11-22</div>
              </td>

            </tr>
            <tr>
              <td>5</td>
              <td>
                <div class="block">td</div>
              </td>
              <td>
                <div class="block">td</div>
              </td>
              <td>td</td>
              <td>
                <div class="edit">編輯</div>
              </td>

            </tr>
          </tbody>



        </table>
      </div>

      <pagination></pagination>

    </main>

  </div>

  <backfooter></backfooter>
</template>

<script>
import pagination from '@/components/pagination.vue'
import backfooter from '@/components/back_footer.vue'
import backaside from '@/components/back_aside.vue'

export default {
  components: {
    pagination,
    backfooter,
    backaside,
  }
}
</script>