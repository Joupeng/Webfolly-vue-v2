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
    <!-- 捐款管理 -->

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

      <!-- <pagination></pagination> -->

    </main>
    <!-- 捐款fqa -->
    <main class="backDonateFQA">
      <div class="title">
        <h2>捐款FQA</h2>
      </div>


      <div class="button">
        <a href="">
          <div class="btn">+ 新增分類</div>
        </a>
        <a href="">
          <div class="btn">+ 新增內容</div>
        </a>
      </div>

      <div class="wrap">
        <table>
          <thead>
            <tr>
              <th>編號</th>
              <th>標題</th>
              <th>解答</th>
              <th>日期</th>
              <th>編輯</th>
              <th>刪除<i class="fa-solid fa-trash"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>
                <div class="block">台灣媒體養成計畫</div>
              </td>
              <td>
                <div class="block">
                  台灣媒體養成計畫，透過各教育階段共同推動媒體素養教育，提供多樣學習管道及資源，提升學生及國人媒體素養。
                </div>
              </td>
              <td>2022.10.17</td>
              <td>
                <div class="edit">編輯</div>
              </td>
              <td>
                <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>
                <div class="block">關鍵評論</div>
              </td>
              <td>
                <div class="block">關鍵評論網以「獨立評論媒體」作為其定位，主要針對的受眾為關注亞洲訊息的海外華僑、在台外籍人士等。</div>
              </td>
              <td>2022.10.1</td>
              <td>
                <div class="edit">編輯</div>
              </td>
              <td>
                <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>
                <div class="block">全民查假會社</div>
              </td>
              <td>
                <div class="block">全民查假會社，基於多元社會特性，力求呈現真實內容，不受政治立場與偏見影響，以供社會大眾對重大公共利益事項判斷之參考。</div>
              </td>
              <td>2022.10.17</td>
              <td>
                <div class="edit">編輯</div>
              </td>
              <td>
                <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>
                <div class="block">台灣事實查核中心</div>
              </td>
              <td>
                <div class="block">台灣事實查核中心，簡稱TFC，是台灣的事實查核非營利組織，推動事實查核業務與活動。</div>
              </td>
              <td>2022.10.17</td>
              <td>
                <div class="edit">編輯</div>
              </td>
              <td>
                <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
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
              <td>
                <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
              </td>
            </tr>
          </tbody>



        </table>
      </div>

      <!-- <pagination></pagination> -->

    </main>


  </div>
  <backfooter></backfooter>
</template>

<script>
import backfooter from '@/components/back_footer.vue'
import backaside from '@/components/back_aside.vue'
// import pagination from '@/components/pagination.vue'

export default {
  components: {
    backfooter,
    backaside,
    // pagination,
  }

}
</script>