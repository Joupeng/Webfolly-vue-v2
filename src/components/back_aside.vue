<template>
  <aside class="backAside">
    <div>
      <router-link to="/back_medialiteracy" class="mediaNetwork" v-on:click="toggleMediaNetwork"
        :class="{ '-on': showmediaNetworkOpen }">媒體識讀 - 外網連結</router-link>

      <router-link to="/back_medialiteracy" class="mediaClass" v-on:click="toggleMediaClass"
        :class="{ '-on': showmediaClassOpen }">媒體識讀 - 相關課程</router-link>

      <router-link to="/back_medialiteracy" class="fackNews" v-on:click="toggleFackNews"
        :class="{ '-on': showfackNewsOpen }">假訊息追擊 - 題庫</router-link>

      <router-link to="/back_donate" class="donateManage" v-on:click="toggleDonateManage"
        :class="{ '-on': showDonteManageOpen }">捐款管理&nbsp;&nbsp;</router-link>

      <router-link to="/back_donate" class="donateFAQ" v-on:click="toggleFQA" :class="{ '-on': showDonateFAQOpen }">捐款
        FAQ</router-link>



    </div>
  </aside>

  <!-- 主要欄目 -->
  <mediaNetwork v-if="showmediaNetworkOpen"></mediaNetwork>
  <mediaClass v-if="showmediaClassOpen"></mediaClass>
  <fackNews v-if="showfackNewsOpen"></fackNews>
  <donteManage :class="{ '-on': showDonateFAQOpen || showmediaNetworkOpen || showfackNewsOpen || showmediaClassOpen, }"
    showDonteManageOpen></donteManage>
  <donteFAQ v-if="showDonateFAQOpen"></donteFAQ>
</template>

<script>
import mediaNetwork from '@/components/back_mediaNetwork.vue'
import mediaClass from '@/components/back_mediaClass.vue'
import fackNews from '@/components/back_fackNews.vue'
import donteManage from '@/components/back_donateManage.vue'
import donteFAQ from '@/components/back_donateFAQ.vue'

export default {
  components: {
    mediaNetwork,
    mediaClass,
    fackNews,
    donteManage,
    donteFAQ,
  },

  data() {
    return {
      showmediaNetworkOpen: false,
      showmediaClassOpen: false,
      showfackNewsOpen: false,
      showDonteManageOpen: false,
      showDonateFAQOpen: false,
    };
  },

  methods: {
    toggleMediaNetwork() {
      // alert("fjaof")
      this.showmediaNetworkOpen = true;
      this.showmediaClassOpen = false;
      this.showfackNewsOpen = false;
      this.showDonateFAQOpen = false;
    },
    toggleMediaClass() {
      this.showmediaClassOpen = true;
      this.showmediaNetworkOpen = false;
      this.showfackNewsOpen = false;
      this.showDonateFAQOpen = false;
    },
    toggleFackNews() {
      this.showfackNewsOpen = true;
      this.showmediaNetworkOpen = false;
      this.showmediaClassOpen = false;
      this.showDonateFAQOpen = false;
    },
    toggleDonateManage() {
      // this.showDonteManageOpen = true;
      // this.showmediaNetworkOpen = false;
      // this.showmediaClassOpen = false;
      // this.showfackNewsOpen = false;
      this.showDonateFAQOpen = false;
    },

    toggleFQA() {
      this.showDonateFAQOpen = true;
      this.showDonateManageOpen = false;
      // this.showmediaNetworkOpen = false;
      // this.showmediaClassOpen = false;
      // this.showfackNewsOpen = false;

    },
  },
};
</script>
