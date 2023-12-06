   <!-- 新增分類視窗 -->
<template>
  <div class="modaloutside" v-if="addSortOpen">
    <div class="category">

      <div class="category_frame">

        <header class="modalheader">
          <span>新增分類</span>
          <span id="closeModal" class="close" @click="closeModal"><img src="../assets/images/common/back_iconClose.svg"
              alt="close"></span>
        </header>

        <form action="">
          <input class="inputcategory" type="text" id="category" name="category" placeholder="請輸入新的分類">
          <input class="inputsave" type="submit" value="儲存變更">
        </form>

        <div class="wrap">
          <table>
            <thead>
              <tr>
                <th>編號</th>
                <th>分類</th>
                <th>刪除<i class="fa-solid fa-trash"></i></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <div class="block">政治國際<img src="../assets/images/common/back_iconEditor.svg" alt="editor"></div>
                </td>
                <td>
                  <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="trashcan"></div>
                </td>
              </tr>

              <tr>
                <td>2</td>
                <td>
                  <div class="block">生活健康<img src="../assets/images/common/back_iconEditor.svg" alt="editor"></div>
                </td>
                <td>
                  <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="trashcan"></div>
                </td>
              </tr>

              <tr>
                <td>3</td>
                <td>
                  <div class="block">科技財金<img src="../assets/images/common/back_iconEditor.svg" alt="editor"></div>
                </td>

                <td>
                  <div class="edit"><img src="../assets/images/common/back_iconTrashcan.svg" alt="trashcan"></div>
                </td>

              </tr>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      addSortOpen: false,
    };
  },
  methods: {
    // 彈跳視窗打開
    addSort() {
      this.addSortOpen = !this.addSortOpen;
    },
    closeModal() {
      // 關閉彈窗
      this.addSortOpen = false;
    }
  }
}

</script>