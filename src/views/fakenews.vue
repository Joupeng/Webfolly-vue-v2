<template>
    <frontnav></frontnav>
    <section class="fakenews">

        <!-- banner -->
        <section class="banner">
            <p>互動</p>
        </section>

        <div class="outerBlock">


            <!-- 標題文字區 -->
            <div class="titleBlock">
                <div class="titleBlockA">
                    <p class="titleText">什麼是假訊息？</p>
                    <p class="contentText">假訊息是指故意捏造、散佈或修改的訊息，旨在欺騙、誤導或誤導受眾。這些資訊可以以文字、圖像、音訊或視訊的形式傳播，通常在網路和社交媒體上廣泛傳播。
                        假訊息也被稱為虛假資訊、虛假新聞、謠言、誤導性資訊或虛假資訊。大致上分成「民間謠言」跟「有意圖的訊息」兩大類。</p>
                </div>

                <div class="titleBlockB">
                    <div class="titleBlockB_inner">
                        <p class="titleText2">民間謠言</p>
                        <p class="contentText2">
                            民間謠言通常指的是無特定目地的口耳傳播，類似於街頭流傳的都市傳說。這類訊息結構往往偏向片面，缺乏專業審查，因此可信度極低，容易誤導大眾，並可能對社會造成負面影響。</p>
                    </div>

                    <div class="titleBlockB_inner">
                        <p class="titleText2">有意圖的訊息</p>
                        <p class="contentText2">
                            訊息結構更完整，常透過網路資訊進行加工，甚至做成圖片、影音等。這類訊息為了能廣為流傳，也會用「新聞寫作」的手法，引述某權威人士、機構佐證，加強可信度，因此傳播力道也會更強。
                        </p>
                    </div>
                </div>
                <div class="titleBlockC">
                    <p class="contentText">假訊息傳播可能導致不良影響，包括社會不安、政治混亂、影響他人判斷以及其他更多社會問題。
                        因此，識別正確訊息和打擊假訊息變得至關重要，需要媒體素養、批判性思考和可靠的新聞來源來輔助人們判斷資訊的真實性。
                        社群媒體平台、新聞機構和政府也在採取措施來限制假訊息的傳播和宣傳正確訊信息可信度。</p>
                </div>
            </div>

            <!-- 假訊息的樣態 -->

            <div class="sevenBlock">
                <p>假訊息的樣態</p>
            </div>

            <!-- 假訊息的特徵 -->

            <div class="newsCardBlock">

                <p>假訊息特徵</p>

                <!-- 箭頭 圖片-->
                <div class="hint_block_L1_rwd">
                    <div class="hint_block_rwd">
                        <div class="hint_block_inner_rwd_img">
                            <div class="circle_rwd"></div>
                            <div class="line_rwd"></div>
                        </div>

                        <p class="p_rwd">移花接木脫離現況</p>
                    </div>
                </div>

                <div class="newsCardBlock_inner">

                    <div v-for="card in displayedCards" :key="card.id" class="newsCardA">
                        <!-- 卡片内容 -->
                        <div class="imgBlock" :style="{ backgroundImage: 'url(' + card.imageUrl + ')' }"></div>
                        <div class="textBlock">
                            <div class="textBlockA">{{ card.title }}</div>

                            <!-- 箭頭 標題-->
                            <div class="hint_block_L1_rwd">
                                <div class="hint_block_rwd">
                                    <div class="hint_block_inner_rwd">
                                        <div class="line_rwd"></div>
                                        <div class="circle_rwd"></div>
                                    </div>

                                    <p class="p_rwd">誇張且聳動的標題</p>
                                </div>
                            </div>

                            <div class="textBlockB">{{ card.content }}</div>

                            <!-- 箭頭 內文-->
                            <div class="hint_block_L1_rwd">
                                <div class="hint_block_rwd">
                                    <div class="hint_block_inner_rwd">
                                        <div class="line_rwd"></div>
                                        <div class="circle_rwd"></div>
                                    </div>

                                    <p class="p_rwd">充滿情緒化的言論</p>
                                </div>
                            </div>

                            <div class="textBlockC">
                                <div class="textBlockC_inner">{{ card.source }}</div>
                            </div>

                            <!-- 箭頭 來源-->
                            <div class="hint_block_L1_rwd_source">
                                <div class="hint_block_rwd">
                                    <p class="p_rwd">資料來源混亂不明</p>
                                    <div class="hint_block_inner_rwd">
                                        <div class="line_rwd"></div>
                                        <div class="circle_rwd"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>






                </div>
                <div class="arrows">
                    <!-- 箭頭 標題-->
                    <div class="hint_block_L1">
                        <div class="hint_block">
                            <p class="left_p">誇張且聳動的標題</p>
                            <div class="circle"></div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <!-- 箭頭 內文-->
                    <div class="hint_block_L2">
                        <div class="hint_block">
                            <p class="left_p">充滿情緒化的言論</p>
                            <div class="circle"></div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <!-- 箭頭 圖片-->
                    <div class="hint_block_R1">
                        <div class="hint_block">
                            <div class="line"></div>
                            <div class="circle"></div>
                            <p class="right_p">移花接木脫離現況</p>
                        </div>
                    </div>
                    <!-- 箭頭 來源-->
                    <div class="hint_block_R2">
                        <div class="hint_block">
                            <div class="line"></div>
                            <div class="circle"></div>
                            <p class="right_p">資料來源混亂不明</p>
                        </div>
                    </div>
                </div>
                <!-- 換頁按鈕 -->
                <div class="unified_pagination" :actpage="currentPage">
                    <a href="#!-1" class="unified_pagination_i" @click="changePage(-1)">上一頁</a>
                    <a v-for="page in totalPages" :key="page" :href="'#!' + page" class="unified_pagination_i"
                        @click="changePage(page)">{{ page }}</a>
                    <a href="#!+1" class="unified_pagination_i" @click="changePage(1)">下一頁</a>
                </div>


                <!-- 閱聽人該怎麼做 -->
                <div class="yellow_block_outer">
                    <div class="yellow_block">
                        <div class="yellow_block_inner">
                            <div class="h1">閱聽人可以怎麼做</div>
                            <ul>
                                <li>1. 查證信息來源 : 多方查證來源，確保其可信度。</li>
                                <li>2. 培養批判性思考 : 試著提出疑問，思考內容真實性。</li>
                                <li>3. 辨識假訊息特徵 : 注意標題有無情緒性字眼，或誇張的語助詞。</li>
                                <li>4. 不盲目的傳播訊息 : 在確認真實度前，不盲目傳送給他人。</li>
                                <li>5. 運用審查工具 : 利立用審查工具來確保你所看到的資訊。</li>
                                <li>6. 參加媒體教育課程 : 透過課程來提高媒體識讀的能力。</li>
                                <li>7. 多看訊息正確性高的網站 : 多搜尋有核查訊息功能的網站。</li>
                            </ul>
                        </div>
                    </div>

                    <div id="Blacky_block">
                        <img src="/images/fakenews_Vector.svg" alt="" id="Blacky">
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
import '/node_modules/jquery/dist/jquery.min'
// 按鈕區域




export default {

    data() {
        return {
            cards: [
                {
                    id: 1,
                    title: "聯合國「該吃素了」，世衛組織：40年內全球吃素！必須吃素​！刻不容緩",
                    content: "假如你得知,全人類在22年後大限將至你會作何反應？也許你會無動於衷覺得事不關己,但是朋友們,這個絕不是危言聳聽。就在前幾天,聯合國向全人類發出了，「只剩22年，地球將陷入危機」的警告，卻被無數人忽視了…",
                    source: "來源：小編",
                    imageUrl: "/src/images/fakenews/fakenews_img01.jpg", // 添加图片地址

                },
                {
                    id: 2,
                    title: "仔細看看圖片！是否能在其中找到駱駝？這不僅是一個視覺的考驗，更能測試您有無失智！",
                    content: "德國阿爾茨海默症協會宣稱：這個挑戰只要成功找到駱駝，就能免疫老年痴呆。這是人類重大抉擇，為了預防22年後的老年痴呆，你的選擇或成最後防線。別輕忽，這是未來的保障！找到駱駝，就能讓你的頭腦保持聰慧，直到遲遲老矣仍然思緒清晰！",
                    source: "來源：網路謠傳",
                    imageUrl: "/src/images/fakenews/fakenews_img01.jpg", // 添加图片地址

                },
                {
                    id: 3,
                    title: "空氣炸鍋，不僅致癌，更是你營養的大敵！使用它，就像是用生命在交換方便。現在就抛棄空氣炸鍋吧！",
                    content: "空氣炸鍋，看似方便，實則是一場毒宴！狡猾的熱風中藏著致命的陷阱，食物在高溫下變形，不只製造致癌的丙烯醯胺，更是營養的墓地！葡萄糖、果糖經此高溫煎熬，竟成為健康的頭號殺手。而維生素A、D、E、K等寶貴的營養，在炸鍋的猛烈攻擊下，溶於空氣，化為泡影。別再被外表迷惑，空氣炸鍋並非飲食的救星，而是健康的毀滅者！",
                    source: "小編3",
                    imageUrl: "/src/images/fakenews/fakenews_img01.jpg", // 添加图片地址

                },

            ],
            itemsPerPage: 1, // 每页显示的卡片数量
            currentPage: 1,  // 当前页数
        };
    },
    computed: {
        displayedCards() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.cards.slice(start, end);
        },
        totalPages() {
            const total = Math.ceil(this.cards.length / this.itemsPerPage);
            return Math.max(total, 3); // 确保总页数不少于三页
        },
    },
    methods: {
        changePage(page) {
            if (page === -1 && this.currentPage > 1) {
                this.currentPage--;
            } else if (page === 1 && this.currentPage < this.totalPages) {
                this.currentPage++;

            } else if (page !== -1 && page !== 1) {
                this.currentPage = page;
            }
        },
    },
    components: {
        frontnav,
        frontfooter,

    }
}
</script>