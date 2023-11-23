<template>
    <frontnav></frontnav>
    <div class="outside_box">
        <div class="title_qa">
            <p>捐款FAQ</p>
        </div>
        <div class="list_content_box">
            <ul class="inner_context_box">
                <li v-for="(item, index) in qa_items" class="list_qa" :key="index">
                    <div class="qs_content" @click="item.isBoxOpen = !item.isBoxOpen"
                        :class="{ '-on': item.isBoxOpen === true }">
                        <div class="qs">Q{{ index + 1 }}.{{ item.qs }}</div>
                        <button type="button" class="qa_button" @click="item.isBoxOpen = !item.isBoxOpen"
                            :class="{ '-on': item.isBoxOpen === true }">
                            <div class="img_change">
                                <img src="../assets/images/donate/faq/donate_qa_open.svg" alt="" class="down">
                                <img src="../assets/images/donate/faq/donate_qa_close.svg" alt="" class="close">
                            </div>
                            <!-- 方式1的click跟判斷式 -->
                            <!-- @click="downSlide(index)" -->
                            <!-- :class="{ '-on': index == currnIndex }" -->
                        </button>
                    </div>
                    <!-- 方式1的click跟判斷式 -->
                    <!-- <hr class="qs_hr" :class="{ '-on': index == currnIndex }">
                    <div class="ans" :class="{ '-on': index == currnIndex }">{{ item.ans }}</div> -->


                    <div class="horizontal-line" :class="{ '-on': item.isBoxOpen === true }"></div>
                    <div class="ans" :class="{ '-on': item.isBoxOpen === true }">{{ item.ans }}</div>
                </li>
            </ul>
        </div>
    </div>
    <front_donate_subfooter></front_donate_subfooter>
    <frontfooter></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import front_donate_subfooter from '@/components/front_donate_subfooter.vue'
import frontfooter from '@/components/front_footer.vue'

export default {
    components: {
        frontnav,
        front_donate_subfooter,
        frontfooter,
    },
    data() {
        return {
            // 方式1直接設定在外面，當currnIndex不等於null的時候，就代表有東西被打開，會放入index，可以打開然後按另一個的時候，會關閉原本的然後打開新的
            // currnIndex: null,


            // ===================================================================================================
            // 學習串資料改名字跟如何增加資料庫沒有的屬性給值
            // 試著從資料庫串進來，因為資料庫目前應該沒有isBoxOpen: false,
            // qa_items_original: [
            //     {
            //         QS: "如何捐款給網中愚?",
            //         ANS: "於官網進行捐款。僅接受國內銀行發行之VISA、MASTER、JCB信用卡；捐款將會即時進行首次信用卡扣款捐款收據，請於捐款頁面勾選。若信用卡交易失敗，原因可能為非金流系統接受之卡別、信用卡過期或填寫錯誤等，詳情請向有關銀行查詢，或致電捐款服務專線。",
            //     },

            //     {
            //         QS: "如何修改信用卡資料或捐款者資料？",
            //         ANS: "更改捐款信用卡或捐款金額，請點選下載更換信用卡授權書並親筆簽名後，拍照寄至ziolin@gmial.com，或傳真至(02)9876-5432若您只是要更新信用卡到期日，由於網中愚網站採用綠界科技提供的信用卡代碼化服務，符合VISA與MasterCard採用的EMV代碼規格(此與Apple Pay使用的代碼相同)。 若您的發卡行支援此標準代碼，當信用卡因效期屆滿而換發新卡，且持卡人已開卡，發卡行將自動傳送更新的卡片有效期至我們使用的系統，捐款人不需主動更新。 若您的發卡行不支援此標準代碼，我們將會於信用卡到期前提醒您換卡。更改捐款者資料，請來電(02)9876-5432，或來信ziolin@gmial.com 與我們聯繫，將有專人為您處理後續事宜。",

            //     }
            // ],

            //方式2每一個裡面加上是否打開，代表自己控制自己，所以可以同時開好多個，但不會關掉別人，可以在做設定
            qa_items: [

                {
                    qs: "如何捐款給網中愚?",
                    ans: "於官網進行捐款。僅接受國內銀行發行之VISA、MASTER、JCB信用卡；捐款將會即時進行首次信用卡扣款捐款收據，請於捐款頁面勾選。若信用卡交易失敗，原因可能為非金流系統接受之卡別、信用卡過期或填寫錯誤等，詳情請向有關銀行查詢，或致電捐款服務專線。",
                    //方式2
                    isBoxOpen: false,

                },


                {
                    qs: "如何修改信用卡資料或捐款者資料？",
                    ans: "更改捐款信用卡或捐款金額，請點選下載更換信用卡授權書並親筆簽名後，拍照寄至ziolin@gmial.com，或傳真至(02)9876-5432若您只是要更新信用卡到期日，由於網中愚網站採用綠界科技提供的信用卡代碼化服務，符合VISA與MasterCard採用的EMV代碼規格(此與Apple Pay使用的代碼相同)。 若您的發卡行支援此標準代碼，當信用卡因效期屆滿而換發新卡，且持卡人已開卡，發卡行將自動傳送更新的卡片有效期至我們使用的系統，捐款人不需主動更新。 若您的發卡行不支援此標準代碼，我們將會於信用卡到期前提醒您換卡。更改捐款者資料，請來電(02)9876-5432，或來信ziolin@gmial.com 與我們聯繫，將有專人為您處理後續事宜。",
                    isBoxOpen: false,

                },
                {
                    qs: "銀行是否會向我收取捐款手續費？",
                    ans: "透過信用卡捐款，銀行只會向網中愚收取手續費，捐款者並不需要支付任何費用。",
                    isBoxOpen: false,
                },
                {
                    qs: "可以不公開捐款姓名嗎?",
                    ans: "依財團法人法第25條規定，除捐款人事先表示反對外，本會需主動公開捐贈者姓名及金額。倘若捐款人不同意將捐款者姓名公開揭露，請來信至ziolin@gmial.com辦理。",
                    isBoxOpen: false,
                },
                {
                    qs: "可以捐發票嗎?",
                    ans: "目前僅收電子發票，您可以透過捐贈愛心碼的方式將發票捐給網中愚。",
                    isBoxOpen: false,
                },
                {
                    qs: "我會收到捐款收據嗎？捐款抵稅如何進行?",
                    ans: "無論用何種方式捐款至財團法人網中愚基金會，均可收到本會正式收據，捐款金額可依綜合所得稅申報辦法列舉扣除。若您需要當年度捐款收據以便捐款抵稅，請您務必於該年度12月31日前完成捐款。",
                    isBoxOpen: false,
                },
                {
                    qs: "捐款收據若以孩子的名字開立，是否可以報稅？",
                    ans: "捐款收據可以以孩子或雙親的名義開立，只要為扶養親屬，捐款收據皆可作為有效的報稅憑證。",
                    isBoxOpen: false,
                },
                {
                    qs: "收據何時寄出？",
                    ans: "若您選擇紙本收據，每月定期定額捐款會於每年報稅月前，將你的全年捐款寄發年度收據至通訊地址；單筆捐款的收據將於捐款成功後1-2週內寄出。",
                    isBoxOpen: false,
                },
                {
                    qs: "未收到收據、收據遺失、收據資料錯誤，應該如何辦理？",
                    ans: "請來電(02)9876-5432或來信至ziolin@gmial.com與基金會聯繫，我們將核對資料後，為您進行相關作業。",
                    isBoxOpen: false,
                },
                {
                    qs: "捐款收據上的抬頭可以跟捐款人的名字不一樣嗎？",
                    ans: "可以，收據將按照您提供的姓名寄發。若收據抬頭要用公司行號，請在捐款時註明公司統一編號。",
                    isBoxOpen: false,
                },
                {
                    qs: "如何取消捐款?",
                    ans: "您的捐款為網中愚帶來持續和穩定可預估的收入，讓我們更佳有資源地展開閱聽活動推廣，為閱聽人打造更優質的媒體環境。若要取消捐款，請於扣款日(15號)前2個工作日，來電(02)9876-5432分機811，將有專人為您辦理。",
                    isBoxOpen: false,
                },
                {
                    qs: "我接到電話（或電子郵件）詢問我在網中愚（台灣）的捐款，我怎麼知道是不是真的？",
                    ans: "我們通常會在上班時間（周一至周五上午10點至下午6點）與捐款人聯繫。如您接到疑似詐騙電話或電子郵件，請勿提供任何個人與財務資料，並來電 (02)9876-5432分機411，或來信至ziolin@gmial.com查證，我們很樂於為您查詢。",
                    isBoxOpen: false,
                },
                {
                    qs: "網中愚會如何運用我的捐款？",
                    ans: "網中愚有超過八成捐款用於閱聽推廣活動上，餘款則作行政及募款經費。",
                    isBoxOpen: false,
                },
                {
                    qs: "我要如何知道網中愚基金會的捐款明細？",
                    ans: "財團法人網中愚基金會定期將會計師簽核財務報告與捐款人明細揭露於基金會官網，並將勸募結案與成果報告呈報於主管機關衛福部。",
                    isBoxOpen: false,
                },
                {
                    qs: "你們會寄會訊（通訊）給每月捐款人嗎 ?",
                    ans: "網中愚定期發行刊物與年度報告，讓您了解推廣活動進度以及捐款運用。我們亦會不定期以電子郵件與您聯繫，歡迎訂閱電子報以取得相關訊息。",
                    isBoxOpen: false,







                },
            ],
        }
    },
    methods: {
        // 傳回key值，就是得到index
        downSlide(key) {

            // alert('123');
            // console.log(this.currnIndex)


            // 方式1直接設定在外面
            // if (this.currnIndex === key) {
            //     this.currnIndex = null
            // } else {
            //     this.currnIndex = key

            // }
        }
    }
}
</script>