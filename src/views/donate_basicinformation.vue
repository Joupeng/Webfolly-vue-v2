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
                        <input type="text" v-model.trim="donorInf.addBirDate">
                    </div>
                </div>
                <!-- 地址 -->
                <div class="address_block">
                    <p>地址</p>


                    <div class="drop-down_menu_block">
                        <input type="text" placeholder="郵遞區號" class="PostalCode">
                        <!-- 縣市 -->
                        <select class="list_block">
                            <div class="list_inside_block1">
                                <option class="choose_month">縣市
                                </option>
                                <option class="li_month">臺北市
                                </option>
                                <option class="li_month">新北市
                                </option>
                                <option class="li_month">桃園市
                                </option>
                                <option class="li_month">臺中市
                                </option>
                                <option class="li_month">高雄市
                                </option>

                            </div>
                        </select>
                        <!-- 鄉鎮市區 -->
                        <select class="list_block">
                            <div class="list_inside_block2">
                                <option class="choose_month">鄉鎮市區</option>
                                <option class="li_month">一月</option>
                                <option class="li_month">二月</option>
                                <option class="li_month">三月</option>
                                <option class="li_month">四月</option>
                                <option class="li_month">五月</option>
                                <option class="li_month">六月</option>
                                <option class="li_month">七月</option>
                                <option class="li_month">八月</option>
                                <option class="li_month">九月</option>
                                <option class="li_month">十月</option>
                                <option class="li_month">十一月</option>
                                <option class="li_month">十二月</option>
                            </div>
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
                    <label class="Receipt-option">
                        <input type="radio" name="private" value="other" checked> 我同意隱私權條款
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
            <!-- <router-link :to="{ name: 'back_donate_basicinformation_02' }" class="donate_btn"><span
                    :class="{ 'frontheader_menu-on': $route.name == 'donate' }">確認送出</span>
            </router-link> -->

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
import axios from 'axios'
// import { getSHA256Hash } from "boring-webcrypto-sha256";


export default {
    components: {
        frontnav,
        frontfooter,
        front_donate_flow,
        front_donate_subfooter
    },
    data() {
        return {
            selectGender: "male",
            donorInf: {
                addLastName: "1",
                addFirstName: "2",
                addMail: "3",
                addPhone: "4",
                addBirDate: "5",
            },
            // ECpara: {
            //     TotalAmount: '1000',
            //     ItemName: '範例商品一批',
            // },
            // ecpay:
            // {
            //     CustomField1: "1",
            //     CustomField2: "2",
            //     CustomField3: "3",
            //     CustomField4: "4",
            //     MerchantID: "2000132",
            //     // MerchantTradeNo: "test1684501999793",
            //     PaymentDate: "2023/05/19 21:13:40",
            //     PaymentType: "aio",
            //     PaymentTypeChargeFee: "10",
            //     RtnCode: "1",
            //     RtnMsg: "交易成功",
            //     SimulatePaid: "0",
            //     StoreID: "",
            //     TradeAmt: "100",
            //     TradeDate: "",
            //     TradeNo: "2305192113200629",
            //     CheckMacValue: "46300C00739FCBBAEF33EE1CF7EF26212ED94C6DE82E8B6769E163AA2571D2D8",
            //     ItemName: "Appleiphone",
            //     MerchantTradeDate: new Date().toLocaleString('zh-TW', {
            //         year: 'numeric',
            //         month: '2-digit',
            //         day: '2-digit',
            //         hour: '2-digit',
            //         minute: '2-digit',
            //         second: '2-digit',
            //         hour12: false,
            //         timeZone: 'UTC',
            //     }),
            //     MerchantTradeNo: 'test' + new Date().getTime(),
            //     ReturnURL: "https://www.google.com/",
            // },

        }
    },
    methods: {
        // 
        // addLastName: "1",
        //                 addFirstName: "2",
        //                 addMail: "3",
        //                 addPhone: "4",
        //                 addBirDate: "5",

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
            this.cookie = this.getCookie('donationAmt');
            // console.log(this.cookie)

            const cookieValue = this.cookie;

            if (cookieValue == 100) {
                // window.location.href = 'http://localhost/AJAX/APITEST/d100_createOrder.php';
                window.location.href = 'API/d100_createOrder.php';
            };
            if (cookieValue == 500) {
                // window.location.href = 'http://localhost/AJAX/APITEST/d500_createOrder.php';
                window.location.href = 'API/d500_createOrder.php';
            };
            if (cookieValue == 1000) {
                // window.location.href = 'http://localhost/AJAX/APITEST/d1000_createOrder.php';
                window.location.href = 'API/d1000_createOrder.php';
            };
            if (cookieValue == 2000) {
                // window.location.href = 'http://localhost/AJAX/APITEST/d2000_createOrder.php';
                window.location.href = 'API/d2000_createOrder.php';
            };
            // 參數
            // const data = '300';
            // console.log(data);
            // // const response = await fetch('API/d_createOrder.php', {
            // const response = await fetch('http://localhost/AJAX/APITEST/d_createOrder.php', {
            //     method: "POST",
            //     headers: {
            //         "Accept": "application/json",
            //         // "Content-Type": "application/json",
            //         "Content-Type": "text/plain",
            //     },
            //     body: String(data),
            //     //  {
            //     //     TotalAmount: '300',
            //     //     // ItemName: '範例商品一批',
            //     // },
            // });
            // const ecPayUrl = await response.text();
            // this.$router.push('/redirected');
            // window.location.href = 'http://localhost/AJAX/APITEST/d2000_createOrder.php';
            // window.location.href = 'API/d100_createOrder.php';

        }
        // 自己寫加密
        // async getSHA256Hash(input) {
        //     // const getSHA256Hash = (input) => {
        //     const textAsBuffer = new TextEncoder().encode(input);
        //     const hashBuffer = await window.crypto.subtle.digest("SHA-256", textAsBuffer);
        //     // const hashBuffer = window.crypto.subtle.digest("SHA-256", textAsBuffer);
        //     const hashArray = Array.from(new Uint8Array(hashBuffer));
        //     const hash = hashArray
        //         .map((item) => item.toString(16).padStart(2, "0"))
        //         .join("");
        //     return hash;
        // },
        // 套件
        //    使用套件
        // async handleECpay() {

        //     alert("suceess")

        //     const ecHashKey =
        //         "HashKey=pwFHCqoQZGmho4w6&" + "ChoosePayment=ALL & EncryptType=1& ItemName=" + this.ecpay.ItemName + "& MerchantID=" + this.ecpay.MerchantID + "&MerchantTradeDate=" + this.ecpay.MerchantTradeDate + "&MerchantTradeNo=" + this.ecpay.MerchantTradeNo + "& PaymentType=aio & ReturnURL=" + this.ecpay.ReturnURL + "&TotalAmount=30000&TradeDesc=促銷方案&" + "HashIV=EkRm7iFT261dpevs";

        //     // url encode
        //     const encoded = encodeURI(ecHashKey).toLowerCase();

        //     // console.log('Form submitted');
        //     // 加密套件
        //     // const getSHA256Hash = async (input) => {
        //     //     // const getSHA256Hash = (input) => {
        //     //     const textAsBuffer = new TextEncoder().encode(input);
        //     //     const hashBuffer = await window.crypto.subtle.digest("SHA-256", textAsBuffer);
        //     //     // const hashBuffer = window.crypto.subtle.digest("SHA-256", textAsBuffer);
        //     //     const hashArray = Array.from(new Uint8Array(hashBuffer));
        //     //     const hash = hashArray
        //     //         .map((item) => item.toString(16).padStart(2, "0"))
        //     //         .join("");
        //     //     return hash;
        //     // };

        //     const hash = await this.getSHA256Hash(encoded);
        //     console.log(hash)
        //     const hashcode = hash.toUpperCase();
        //     console.log(hashcode)

        //     axios.post('https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5')


        //     //                 const {data} = await axios.post('https://httpbin.org/post', {
        //     //     firstName: 'Fred',
        //     //     lastName: 'Flintstone',
        //     //     orders: [1, 2, 3]
        //     //   }, {
        //     //     headers: {
        //     //       'Content-Type': 'application/x-www-form-urlencoded'
        //     //     }
        //     // })
        //     //         body: {
        //     //             const ecPara: {
        //     //                 CustomField1: "1",
        //     //                 CustomField2: "2",
        //     //                 CustomField3: "3",
        //     //                 CustomField4: "4",
        //     //                 // MerchantID: "3002607",
        //     //                 HashKey: "pwFHCqoQZGmho4w6",
        //     //                 HashIV: "EkRm7iFT261dpevs",
        //     //                 // 
        //     //                 MerchantTradeDate: new Date().toLocaleString('zh-TW', {
        //     //                     year: 'numeric',
        //     //                     month: '2-digit',
        //     //                     day: '2-digit',
        //     //                     hour: '2-digit',
        //     //                     minute: '2-digit',
        //     //                     second: '2-digit',
        //     //                     hour12: false,
        //     //                     timeZone: 'UTC',
        //     //                 }),
        //     //     MerchantTradeNo: 'test' + new Date().getTime(),
        //     //     PaymentType: "aio",
        //     //     TotalAmount: "100",
        //     //     TradeDesc: "交易測試",
        //     //     ItemName: "123",
        //     //     ReturnURL: "http://localhost:5173/#/donate_basicinformation",
        //     //     ChoosePayment: "Credit",
        //     //     CheckMacValue: hashCode,
        //     //     EncryptType: "1",
        //     // }
        // }
    },

}
// },
// mounted() {

// }


// }
</script>