<template>
    <frontnav></frontnav>
    <section class="donate_basicinformation">


        <div class="banner">
            <img src="../assets/images/donate/donate_finish_banner.svg" alt="">
        </div>
        <!-- bannerNew -->

        <front_donate_flow></front_donate_flow>

        <div class="main_block">
            <div class="inner_block">
                <h1>基本資料填寫</h1>

                <div class="grid_container">
                    <div>
                        <p>姓氏</p>
                        <input type="text" v-model.trim="donorInf.addLastName">
                    </div>

                    <div>
                        <p>名字</p>
                        <input type="text" v-model.trim="donorInf.addFirstName">
                    </div>

                    <div>
                        <p>電子信箱</p>
                        <input type="text" v-model.trim="donorInf.addMail">
                    </div>

                    <div>
                        <p>手機電話</p>
                        <input type="text" v-model.trim="donorInf.addPhone">
                    </div>

                    <div class="gender-options">
                        <p>性別</p>

                        <label class="gender-option" for="male">
                            <input type="radio" name="gender" v-model="selectGender" class="gender" value="male"> 男
                        </label>
                        <label class="gender-option" for="female">
                            <input type="radio" name="gender" v-model="selectGender" class="gender" value="female"> 女
                        </label>
                        <label class="gender-option" for="other">
                            <input type="radio" name="gender" v-model="selectGender" class="gender" value="other"> 其他
                        </label>
                    </div>

                    <div>
                        <p>生日</p>
                        <!-- <input type="text" v-model.trim="donorInf.addBirDate"> -->
                        <Datepicker v-model="pickedDate" class="datepicker" :disabledDates="{ dates: [disabledDate] }" />
                    </div>
                </div>
                <!-- 地址 -->
                <div class="address_block">
                    <p>地址(請先選擇鄉鎮縣市)</p>


                    <div class="drop-down_menu_block">
                        <!-- <input type="text" placeholder="郵遞區號" class="PostalCode"> -->
                        <input type="text" class="PostalCode" id="zipCode" v-model="selectedZipCode" readonly
                            placeholder="郵遞區號" />
                        <!-- 縣市 -->
                        <select id="cities" class="list_block" v-model="selectedCity">
                            <option :value="city" v-for="city in cityList" :key="city.name" placeholder="請選擇縣市">{{ city.name
                            }} </option>
                        </select>
                        <!-- 鄉鎮市區 -->
                        <select class="list_block" id="districts" v-model="selectedDistrict">
                            <option :value="district" v-for="district in selectedCity.districts" :key="district.name">{{
                                district.name
                            }}</option>
                        </select>
                    </div>


                    <input type="text" placeholder="通訊地址" class="address">
                </div>


                <!-- 收據寄發方式 -->
                <div class="Receipt-options">
                    <p>收據寄發方式</p>

                    <label class="Receipt-option">
                        <input type="radio" name="Receipt" value="male" checked> 直接上傳至國稅局，免寄紙本收據(為節省資源建議選此項，需填身分證字號)
                    </label><br>

                    <label class="Receipt-option">
                        <input type="radio" name="Receipt" value="female"> 寄送紙本收據(地址為必填;單筆捐款每次寄發，定期捐款年度寄發)
                    </label><br>

                    <label class="Receipt-option">
                        <input type="radio" name="Receipt" value="other"> 不需收據(無抵稅需求/不用寄給我收據)
                    </label>
                    <br>
                    <br>
                    <label class="Receipt-option privacyContainer">
                        <input type="checkbox" class="privacy" v-model="privacyChecked">我同意<span class="privacyGuide"
                            @click="openPrivacyText">隱私權聲明同意書</span>
                        <div class="privacyBox">
                            <P class="privacyText" :class="{ '-on': isOpen }">
                                <br>
                                隱私權聲明同意書（蒐集、處理及利用個人資料聲明暨同意書）<br>
                                <br>
                                當您填表完成簽名或勾選﹝我已閱讀並同意﹞並送出資料時，即表示您已閱讀、了解並同意本聲明暨同意書的所有內容，且您瞭解此一同意符合個人資料保護法及相關法規之要求，具有書面同意主辦單位／承辦單位蒐集、處理及利用您個人資料之效果。<br>
                                <br>
                                網中愚（以下簡稱「本網頁」）蒐集、處理及利用您的個人資料，均以尊重您的權益為基礎，並依誠實及信用方法為之，為落實個人資料之保護，茲依照個人資料保護法之規定為告知，為保障您的權益，敬請詳閱下列事項：<br>
                                <br>
                                個人資料蒐集之目的及用途<br>
                                <br>
                                從事目的事業主管機關允許從事之業務。<br>
                                您的個人資料得為法務部規定之以下任一目的進行蒐集、處理、利用及國際傳輸：(001) 人身保險；(002) 人事管理；(003) 入出國及移民；(010)
                                公立與私立慈善機構管理；(024)
                                民意調查；(031) 全民健康保險、勞工保險、農民保險、國民年金保險或其他社會保險；(038) 行政執行；(040) 行銷；(043) 志工管理；(049)
                                宗教、非營利組織業務；(063)非公務機關依法定義務所進行個人資料之蒐集處理及利用；(067) 信用卡、現金卡、轉帳卡或電子票證業務；(090) 消費者、客戶管理與服務；(091)
                                消費者保護；(109) 教育或訓練行政；(127) 勸募（包含公益勸募）；(136) 資（通）訊與資料庫管理；(145) 僱用與服務管理；(148)
                                網路購物及其他電子商務服務；(154)
                                徵信；(157) 調查、統計與研究分析；(176)
                                其他自然人基於正當性目的所進行個人資料之蒐集處理及利用；(181)其他經營合於營業登記項目或組織章程所定之業務、任何其他「個人資料保護法之特定目的及個人資料之類別」規定之目的、及/或現行法律或任何未來被施行或修正之法律所允許範圍內之其它目的
                                (以上項目之定義以及內容，應與法務部隨時修訂及公佈之個人資料保護法之特定目的及個人資料之類別中所載者為依據)。
                                為(1) 提供法人人道危機及救援工作消息、勸募呼籲、活動及未來意見調查，及任何其他類似或相關之服務或資訊予您及／或您的公司／機構；(2)
                                進行與達成您及/或您公司/機構的任何形式的捐助；(3)
                                提供您其他組織之資訊；(4) 委託第三人提供各種服務之需求；(5) 依中華民國法令、利用之對象（參本政策第三之3點）所在地主管機關法令規定；及/或(6)
                                依法定義務、金融監督、依契約、類似契約關係或其他法律關係等，所為個人資料之蒐集、處理、利用及國際傳輸。
                                蒐集之個人資料類別
                                依法務部「個人資料保護法之特定目的及個人資料之類別」所定之分類，而與業務經營有關且擬蒐集、處理、利用及國際傳輸之個人資料類別如下：
                                (1)識別類：(C001)辨識個人者（包括姓名、職位、電話號碼及電郵地址等）；(C002)辨識財務者；(C003) 政府資料中之辨識者；(2)
                                特徵類：(C011)個人描述；(C012)身體描述；(C013)習慣；(C014)個性；(3) 家庭情形：(C021)家庭情形；(C022)
                                婚姻之歷史；(C023)家庭其他成員之細節；(C024)其他社會關係；(4) 社會情況：(C032) 財產；(C034) 旅行及其他遷徙細節；(C035) 休閒活動及興趣；(C036)
                                生活格調； (C037) 慈善機構或其他團體之會員資格；(C038) 職業；(C040) 意外或其他事故及有關情形；(5)
                                教育、考選、技術及其他專業：(C051)學校紀錄；(C052)
                                資格或技術；(C053)職業團體會員資格；(C054)職業專長；(C055) 委員會之會員資格；(C056) 著作；(6)受僱情形：(C061)現行之受僱情形；(C064)
                                工作經驗；(C066) 健康與安全紀錄；(7)財務細節：(C081)收入、所得、資產與投資; (C087) 津貼、福利、贈款；(C088) 保險細節；(8) 商業資訊：(C103)
                                與營業有關之執照；(9) 健康與其他：(C120) 宗教信仰；(C121) 其他信仰；(10) 其他各類資訊：(C131)書面文件之檢索；及/或(C132)未分類之資料。
                                其他資訊中所提供而足以辨識您身分之個人資訊，或任何其他法務部公告之個人資料類別，包括您姓名、電郵地址、電話號碼、地址、職位、工作情況、任何其他得用以辨識您身分資料、及現行法律或任何未來施行或修正之法律所允許範圍內之其他資訊（上述資料以下合稱「個人資料」）。<br>
                                <br>
                                個人資料利用之期間、地區、對象及方式<br>
                                <br>
                                利用之期間：於本網頁業務經營之存續期間內，符合下列要件之一者：<br>
                                個人資料蒐集之特定目的存續期間。
                                依相關法令規定之保存年限。
                                本網頁因執行業務所必須之保存期間。
                                以上述期間較長者為準。
                                利用之地區：蒐集、處理、利用及國際傳輸個人資料於本點第3項利用之對象之國內外所在地，以及網中愚於各司法領域所設立之公司、組織、基金會或其他法人或主體之地區。
                                利用之對象：
                                本網頁包括但不限於本網頁會董事、職員、受僱人、代理人、志工及顧問)、本網頁之分支機構、關係組織及第三方(包括但不限於其職員、受僱人、代理人、顧問)、或與本網頁因業務需要訂有契約關係或業務往來之個人、組織或機構（含受本網頁會委託提供委外服務之個人或機構或委託本網頁提供服務之個人、組織或機構）或顧問；或於各司法領域所設立之組織、基金會或其他法人或主體、關係組織及委外廠商、第三方、合併及收購案的潛在交易對象，及其承包商、顧問及關係組織。
                                依法有調查權之政府機關及部會、包括但不限於各主管機關、機關授權之機構或組織、金融聯合徵信中心及其他機構。
                                利用之方式：符合個人資料保護相關法令以自動化機器或其他非自動化之利用方式之蒐集、處理、利用及國際傳輸（包括但不限於使用電子文件、紙本或其他合於當時科學技術之適當方式等）。<br>
                                <br>
                                依據個人資料保護法第3條規定，得行使之權利及方式<br>
                                <br>
                                依據個人資料保護法規定，您可以透過書面或電子郵件向本網頁行使下列權利：<br>

                                查詢或請求閱覽您的個人資料。
                                請求製給您的個人資料之複製本，而本網頁依法得酌收必要成本費用。
                                請求補充或更正您的個人資料，惟依法您應為適當之釋明。
                                請求停止蒐集、處理或利用您的個人資料，惟依法本網頁因執行業務所必須者，得不依您請求為之。
                                請求刪除您的個人資料。
                                若您擬行使上述任一權利，請檢附相關證明文件向本網頁提出書面請求，本網頁就該書面請求之決定，將於收到書面請求之次日起30日內通知您。前述30日期間於必要時，得予再延長15工作日，本網頁並將以書面通知您。<br>
                                <br>
                                不提供個人資料對您權益之影響<br>
                                <br>
                                您可自由選擇提供個人資料，但您不提供或提供之資料不足或有誤時，本網頁可能無法提供本政策第一點有關之業務或服務予您及/或您的公司/機構。若您的個人資料有任何變更，請您通知本網頁。您聲明並保證所有提供予本網頁之個人資料均屬正確無誤，且您授權本網頁依其決定為變更。<br>
                                <br>
                                隱私與個人資料保護政策修訂<br>
                                <br>
                                本網頁將不時修訂本隱私與個人資料保護政策，並於本政策有重大變更時，在本網頁網站上公布其內容。如您於先前同意之契約或文件所定與個人資料之蒐集、處理、利用、國際傳輸有關條款與修訂政策有所歧異者，以本網站最新修訂政策為準。<br>
                                <br>
                                Cookie 技術之使用<br>
                                <br>
                                Cookie 是從 Web 伺服器傳送到您的瀏覽器並保存在您電腦硬碟中的簡短資料，用來幫助您記下特定訊息以便使用本網頁網站資源。例如，Cookie
                                資訊，讓您往後不用重新輸入相關資訊來瀏覽網站頁面。<br>

                                本網頁網站將為以下目的使用 Cookie：

                                作為與您溝通及辨識的工具；
                                儲存您喜好的設定並向您提供個人化的服務；
                                確認您使用本網頁網站的情況並提昇服務品質；以及
                                提高本網頁網站系統的安全性。
                                如果您不希望接受
                                Cookie，可自行在瀏覽器的設定上加以排除。如果您的設定是不接受Cookie，在大部分情況下，您仍可瀏覽本網頁網站的網頁。為確保本網頁網站得正常提供服務，並維持系統安全，我們將以強加密的方式保留您的Cookie資料在您的瀏覽器上，以避免有心人士盜用。
                                <br>
                                <br>
                                若有任何疑問，您可於週一至週五辦公時間，聯絡本網頁諮詢<br>
                                電話：(02)9876-5432<br>
                                Email: ziolin@gmail.com<br>
                                <br><br>
                                版本日期：2023年12月12日<br>
                            </P>
                        </div>

                    </label>

                </div>



                <div class="your_support_block">
                    <p>
                        您的支持對我們至關重要，為了讓您掌握更多網中愚的訊息，我們將不定期提供更多媒體視讀報告、活動通知、捐款呼籲等相關資料。
                    </p>
                    <label class="gender-option">
                        <input type="radio" name="receiveMsg" value="male" checked> 是，我願意接收相關訊息
                    </label>
                    <br>
                    <label class="gender-option">
                        <input type="radio" name="receiveMsg" value="female"> 不，我不願意接收相關訊息
                    </label>

                </div>


            </div>


        </div>

        <!-- 查詢捐款按鈕 -->
        <div class="donate_btn_outer">

            <button class="donate_btn" style="color: white; " @click="handleECpay">確認送出</button>
            <hr>
        </div>
        <front_donate_subfooter></front_donate_subfooter>
    </section>


    <frontfooter></frontfooter>
</template>

<script>

import frontnav from '@/components/front_header.vue'
import frontfooter from '@/components/front_footer.vue'
import front_donate_flow from '@/components/front_donate_flow.vue'
import front_donate_subfooter from '@/components/front_donate_subfooter.vue'
import Datepicker from 'vue3-datepicker'
import TwCities from '@/assets/json/TwCities.json'

export default {
    components: {
        frontnav,
        frontfooter,
        front_donate_flow,
        front_donate_subfooter,
        Datepicker,
    },
    data() {
        return {
            isOpen: true,
            selectGender: "male",
            donorInf: {
                addLastName: "",
                addFirstName: "",
                addMail: "",
                addPhone: "",
                addBirDate: "",
            },
            pickedDate: "",
            // 台灣鄉鎮縣市
            cityList: [],
            selectedCity: "",
            selectedDistrict: "",
            selectedZipCode: "",
        }
    },
    watch: {
        selectedDistrict(newDistrict) {
            this.selectedZipCode = newDistrict ? newDistrict.zip : "";
        },
    },
    methods: {
        getdate() {
            console.log(this.pickedDate)
            console.log(this.disabledDate)
        },
        // 取得cookie
        getCookie(cookieName) {
            const name = cookieName + "=";
            const decodedCookie = decodeURIComponent(document.cookie);
            const cookieArray = decodedCookie.split(';');

            for (let i = 0; i < cookieArray.length; i++) {
                let cookie = cookieArray[i].trim();

                if (cookie.indexOf(name) === 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }

            return null;
        },
        async handleECpay() {
            // 2.進行儲存 
            const inpdata = {
                inpLastName: this.donorInf.addLastName,
                inpFirstName: this.donorInf.addFirstName,
                inpMail: this.donorInf.addMail,
                inpPHONE: this.donorInf.addPhone,
                inpBirDate: this.pickedDate,
                selectedCity: this.selectedCity,
                selectedDistrict: this.selectedDistrict,
                selectedZipCode: this.selectedZipCode,
            };
            // console.log(inpdata)
            // 確認都沒有空值
            const fail = Object.values(inpdata).some(value => value === undefined || value === null || value === '');
            if (!this.privacyChecked) {
                alert("請先同意隱私權聲明同意書。");
            } else {



                const cookieValue = this.cookie;
                this.cookie = this.getCookie('donationAmt');
                console.log(this.cookie)
                if (fail) {
                    alert('捐款失敗  請確認是否填寫資訊是否完全')
                } else {
                    const confirmBox = confirm(
                        `您本次的捐款金額為: ${this.cookie}元，請問是否繼續捐款？
                     (如想修改捐款金額請按"取消")`);

                    if (confirmBox) {

                        if (this.cookie == 100) {
                            window.location.href = 'API/d100_createOrder.php';
                        };
                        if (this.cookie == 500) {
                            window.location.href = 'API/d500_createOrder.php';
                        };
                        if (this.cookie == 1000) {
                            window.location.href = 'API/d1000_createOrder.php';
                        };
                        if (this.cookie == 2000) {
                            window.location.href = 'API/d2000_createOrder.php';
                        };
                    } else {
                        this.$router.push(`/donate`)
                    }
                }
            }
        },
        handleCityJson() {
            this.cityList = TwCities;
        },
        openPrivacyText() {
            this.isOpen = !this.isOpen;
        }
    },

    mounted() {
        this.getdate();
        this.handleCityJson();
    }
}

</script>