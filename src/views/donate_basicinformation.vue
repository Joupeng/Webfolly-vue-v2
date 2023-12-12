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
                    <label class="Receipt-option">
                        <input type="checkbox">我同意隱私權條款

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
        // fetch到php===============
        async handleECpay() {
            // this.handleAddMail();
            // this.handleAddPhone();
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
        },
        handleCityJson() {
            this.cityList = TwCities;
        }
    },

    mounted() {
        this.getdate();
        this.handleCityJson();
    }
}

</script>