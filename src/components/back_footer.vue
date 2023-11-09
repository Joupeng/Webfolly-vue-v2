<template>
  <footer class="frontfooter">
    <div class="frontfooter_frame">
      <router-link :to="{ name: 'home' }"><img src="../images/common/logo.svg" alt="網中愚商標"></router-link>
      <div class="frontfooter_text">
        <p class="frontfooter_text"> 本網站為緯育TibaMe【第87期】前端工程師專業技術養成班學員作品,僅供學習、展示之用途。<br>
          參考資源：回收大百科、Stick Hero、MyGoPen、Médecins Sans Frontières</p>
        <router-link :to="{ name: 'home' }"><span>- 返回前台 -</span></router-link>
      </div>
    </div>
  </footer>
</template>