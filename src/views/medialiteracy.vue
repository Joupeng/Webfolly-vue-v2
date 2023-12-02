<template>
  <frontnav></frontnav>
  <section class="medialiteracy">

    <div class="titleBlock">
      <div class="titleBlockA">
        <p class="titleText">媒體識讀資源</p>
        <p class="contentText">"媒體識讀" 是指媒體機構分析和解釋新聞、事件、數據或信息的過程，我們提供以下兩個列表以協助受眾更好地理解。<br><br>
          相關連結：包括提供背景信息、分析、數據視覺化、專家觀點、事實核查、推測和預測等內容，旨在提供深入、全面和平衡的資訊，協助公眾更明智地理解和評估信息，以做出知情的決策。<br><br>
          相關課程：挑選了一系列影音、付費課程和講座，提升您的媒體辨讀技巧！。這些資源將幫助您識別新聞、事件和資訊中的關鍵元素，提供實用技巧和洞察，讓您能更明智地理解和評估媒體內容。探索這些工具，提高您的媒體素養，並在資訊時代中更自信地航向真相。
        </p>
      </div>
    </div>

    <div class="outerblock">
      <!-- 深黃頁首 -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <!-- 相關連結 -->
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button"
            role="tab" aria-controls="home-tab-pane" aria-selected="true" :value="webLink">相關連結</button>
        </li>
        <!-- 相關課程 -->
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
            role="tab" aria-controls="profile-tab-pane" aria-selected="false" :value="webClass"
            @click="getLink">相關課程</button>
        </li>

      </ul>

      <!-- 內文區域 -->
      <div class="tab-content" id="myTabContent">
        <!-- 相關連結細項 -->
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

          <!-- 內層捲軸區 -->
          <div class="for_overflow">
            <ul>
              <!-- 會有多個li在裡面 -->
              <li v-for="(news, index) in newlist" :key="index">
                <div class="li_block">
                  <div class="link_01_img"><img :src="news.image" alt=""></div>
                  <div class="text_block">
                    <!-- 標籤包起來使資料庫來的連結有效 -->
                    <a :href="news.link">
                      {{ news.name }}
                    </a>
                    <p>{{ news.description }}</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- 相關課程細項 -->
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <div class="for_overflow">
            <ul>
              <li v-for="(course, index) in courses" :key="index">
                <div class="li_block">
                  <div class="link_01_img"><img :src="course.photo" alt=""></div>
                  <div class="text_block">
                    <a :href="course.from">{{ course.title }}</a>
                    <p>{{ course.direction }}</p>
                    <p>{{ course.source }}</p>
                  </div>
                </div>
              </li>

            </ul>
          </div>
        </div>

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
      webLink: '相關連結',
      webClass: '相關課程',

      newlist: [
        // {
        //   image: new URL('../assets/images/medialiteracy/A1_N.png', import.meta.url).href,
        //   name: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   link: "來源:Youtube",
        //   description: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // },
        // {
        //   image: new URL('../assets/images/medialiteracy/A2_N.png', import.meta.url).href,
        //   name: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   link: "來源:Youtube",
        //   description: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // },
        // {
        //   image: new URL('../assets/images/medialiteracy/A3_N.png', import.meta.url).href,
        //   name: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   link: "來源:Youtube",
        //   description: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // },
        // {
        //   image: new URL('../assets/images/medialiteracy/A4_N.png', import.meta.url).href,
        //   name: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   link: "來源:Youtube",
        //   description: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // },
        // {
        //   image: new URL('../assets/images/medialiteracy/A5_N.png', import.meta.url).href,
        //   name: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   link: "來源:Youtube",
        //   description: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // }
      ],
      courses: [
        // {
        //   photo: new URL('../assets/images/medialiteracy/B1_N.png', import.meta.url).href,
        //   title: "1假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   from: "來源:Youtube",
        //   direction: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // },
        // {
        //   photo: new URL('../assets/images/medialiteracy/B2_N.png', import.meta.url).href,
        //   title: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   from: "來源:Youtube",
        //   direction: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // },
        // {
        //   photo: new URL('../assets/images/medialiteracy/B3_N.png', import.meta.url).href,
        //   title: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   from: "來源:Youtube",
        //   direction: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // },
        // {
        //   photo: new URL('../assets/images/medialiteracy/B4_N.png', import.meta.url).href,
        //   title: "假新聞出沒！ 破解 #媒體與牠們的產地 ft.劣質媒體黑名單【記者真心話】Vol.4",
        //   from: "來源:Youtube",
        //   direction: "想要分享新聞給好朋友，但你知道嗎?嗎?散播「網路假新聞」要被關3天?",
        // }

      ]


    }
  },
  methods: {
    getLink() {
      // alert("123");
      fetch('http://localhost/API/medialiteracy.php', {
        method: 'POST',
        //非同源
        mode: 'cors',
        headers: {
          'Content-Type': 'application/json'
        },
        // 送出去的時候是字串格式
        body: JSON.stringify({ webClass: this.webClass })
      })
        .then(resp => resp.json())
        // 處理從伺服器接收到的數據（questions 是解析後的 JSON 數據）
        .then(media_links => {
          this.courses = media_links.map(item => {
            return {
              title: item.TITLE,
              from: item.LINKS,
              direction: item.DIRECTION,
              source: item.SOURCE,
              photo: item.PHOTO
            }

          })
        })
    }
  },
  mounted() {
    fetch('http://localhost/API/medialiteracy.php', {
      method: 'POST',
      //非同源
      mode: 'cors',
      headers: {
        'Content-Type': 'application/json'
      },
      // 送出去的值
      body: JSON.stringify({ webLink: this.webLink })
    })
      .then(resp => resp.json())
      // 處理從伺服器接收到的數據（questions 是解析後的 JSON 數據）
      .then(media_links => {
        this.newlist = media_links.map(item => {
          return {
            name: item.NAME,
            link: item.LINK,
            description: item.DESCRIPTION,
            image: item.IMAGE
          }
        })
      })





  }

}

</script>