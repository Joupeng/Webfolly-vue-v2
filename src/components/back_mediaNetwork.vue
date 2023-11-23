<template>
  <main>
    <div class="title">
      <h2>媒體識讀 - 外網連結</h2>
    </div>


    <div class="button">

      <div class="btn" v-on:click="addSort" :class="{ '-on': addSortOpen }">+ 新增分類</div>


      <div class="btn" v-on:click="addDetail" :class="{ '-on': addDetailOpen }">+ 新增內容</div>

    </div>

    <div class="wrap">
      <table>
        <thead>
          <tr>
            <th>編號</th>
            <th>標題</th>
            <th>內容</th>
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
              <div class="delete"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
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
              <div class="delete"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
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
              <div class="delete"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
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
              <div class="delete"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
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
              <div class="delete"><img src="../assets/images/common/back_iconTrashcan.svg" alt="iconTrashcan"></div>
            </td>
          </tr>
        </tbody>



      </table>
    </div>

    <!-- 刪除彈跳視窗 -->
    <div class="modalWarning">
      <ul>
        <li><img src="../../src/assets/images/common/back_warning.svg" alt="Warning">
        </li>
        <li>您確定要刪除這筆資料嗎？</li>
        <li>
          <div class="button">

            <div class="btn">確認刪除</div>

            <div class="btn">取消刪除</div>

          </div>
        </li>
      </ul>
    </div>


    <!-- <modal_warning></modal_warning> -->
    <modal_category></modal_category>
    <modal_content></modal_content>
    <modal_quiz></modal_quiz>

    <pagination></pagination>

  </main>
</template>

<script>
import modal_warning from '@/components/modal/modal_warning.vue'
import modal_category from '@/components/modal/modal_category.vue'
import modal_content from '@/components/modal/modal_content.vue'
import modal_quiz from '@/components/modal/modal_quiz.vue'

import pagination from '@/components/pagination.vue'

export default {
  components: {
    pagination,
    modal_warning,
    modal_category,
    modal_content,
    modal_quiz,
  },
  data() {
    return {
      addSortOpen: false,
      addDetailOpen: false,
    };
  },
  methods: {
    addSort() {
      this.addSortOpen = !this.addSortOpen;
    },
    addDetail() {
      this.addDetailOpen = !this.addDetailOpen
    }
  }
}
</script>