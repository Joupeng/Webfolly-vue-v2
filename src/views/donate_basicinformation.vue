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
                        <!-- <select class="list_block">
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
                        </select> -->
                        <select id="cities" class="list_block" v-model="selectedCity">
                            <option :value="city" v-for="city in cityList" :key="city.name" placeholder="請選擇縣市">{{ city.name
                            }} </option>
                        </select>
                        <!-- 鄉鎮市區 -->
                        <!-- <select class="list_block">
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
                        </select> -->
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
// import axios from 'axios'
// import { getSHA256Hash } from "boring-webcrypto-sha256";
import Datepicker from 'vue3-datepicker'
import { add } from 'date-fns'

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
            cityList: [
                {
                    "districts": [
                        {
                            "zip": "100",
                            "name": "中正區"
                        },
                        {
                            "zip": "103",
                            "name": "大同區"
                        },
                        {
                            "zip": "104",
                            "name": "中山區"
                        },
                        {
                            "zip": "105",
                            "name": "松山區"
                        },
                        {
                            "zip": "106",
                            "name": "大安區"
                        },
                        {
                            "zip": "108",
                            "name": "萬華區"
                        },
                        {
                            "zip": "110",
                            "name": "信義區"
                        },
                        {
                            "zip": "111",
                            "name": "士林區"
                        },
                        {
                            "zip": "112",
                            "name": "北投區"
                        },
                        {
                            "zip": "114",
                            "name": "內湖區"
                        },
                        {
                            "zip": "115",
                            "name": "南港區"
                        },
                        {
                            "zip": "116",
                            "name": "文山區"
                        }
                    ],
                    "name": "臺北市"
                },
                {
                    "districts": [
                        {
                            "zip": "200",
                            "name": "仁愛區"
                        },
                        {
                            "zip": "201",
                            "name": "信義區"
                        },
                        {
                            "zip": "202",
                            "name": "中正區"
                        },
                        {
                            "zip": "203",
                            "name": "中山區"
                        },
                        {
                            "zip": "204",
                            "name": "安樂區"
                        },
                        {
                            "zip": "205",
                            "name": "暖暖區"
                        },
                        {
                            "zip": "206",
                            "name": "七堵區"
                        }
                    ],
                    "name": "基隆市"
                },
                {
                    "districts": [
                        {
                            "zip": "207",
                            "name": "萬里區"
                        },
                        {
                            "zip": "208",
                            "name": "金山區"
                        },
                        {
                            "zip": "220",
                            "name": "板橋區"
                        },
                        {
                            "zip": "221",
                            "name": "汐止區"
                        },
                        {
                            "zip": "222",
                            "name": "深坑區"
                        },
                        {
                            "zip": "223",
                            "name": "石碇區"
                        },
                        {
                            "zip": "224",
                            "name": "瑞芳區"
                        },
                        {
                            "zip": "226",
                            "name": "平溪區"
                        },
                        {
                            "zip": "227",
                            "name": "雙溪區"
                        },
                        {
                            "zip": "228",
                            "name": "貢寮區"
                        },
                        {
                            "zip": "231",
                            "name": "新店區"
                        },
                        {
                            "zip": "232",
                            "name": "坪林區"
                        },
                        {
                            "zip": "233",
                            "name": "烏來區"
                        },
                        {
                            "zip": "234",
                            "name": "永和區"
                        },
                        {
                            "zip": "235",
                            "name": "中和區"
                        },
                        {
                            "zip": "236",
                            "name": "土城區"
                        },
                        {
                            "zip": "237",
                            "name": "三峽區"
                        },
                        {
                            "zip": "238",
                            "name": "樹林區"
                        },
                        {
                            "zip": "239",
                            "name": "鶯歌區"
                        },
                        {
                            "zip": "241",
                            "name": "三重區"
                        },
                        {
                            "zip": "242",
                            "name": "新莊區"
                        },
                        {
                            "zip": "243",
                            "name": "泰山區"
                        },
                        {
                            "zip": "244",
                            "name": "林口區"
                        },
                        {
                            "zip": "247",
                            "name": "蘆洲區"
                        },
                        {
                            "zip": "248",
                            "name": "五股區"
                        },
                        {
                            "zip": "249",
                            "name": "八里區"
                        },
                        {
                            "zip": "251",
                            "name": "淡水區"
                        },
                        {
                            "zip": "252",
                            "name": "三芝區"
                        },
                        {
                            "zip": "253",
                            "name": "石門區"
                        }
                    ],
                    "name": "新北市"
                },
                {
                    "districts": [
                        {
                            "zip": "260",
                            "name": "宜蘭市"
                        },
                        {
                            "zip": "263",
                            "name": "壯圍鄉"
                        },
                        {
                            "zip": "261",
                            "name": "頭城鎮"
                        },
                        {
                            "zip": "262",
                            "name": "礁溪鄉"
                        },
                        {
                            "zip": "264",
                            "name": "員山鄉"
                        },
                        {
                            "zip": "265",
                            "name": "羅東鎮"
                        },
                        {
                            "zip": "266",
                            "name": "三星鄉"
                        },
                        {
                            "zip": "267",
                            "name": "大同鄉"
                        },
                        {
                            "zip": "268",
                            "name": "五結鄉"
                        },
                        {
                            "zip": "269",
                            "name": "冬山鄉"
                        },
                        {
                            "zip": "270",
                            "name": "蘇澳鎮"
                        },
                        {
                            "zip": "272",
                            "name": "南澳鄉"
                        },
                        {
                            "zip": "290",
                            "name": "釣魚臺"
                        }
                    ],
                    "name": "宜蘭縣"
                },
                {
                    "districts": [
                        {
                            "zip": "209",
                            "name": "南竿鄉"
                        },
                        {
                            "zip": "210",
                            "name": "北竿鄉"
                        },
                        {
                            "zip": "211",
                            "name": "莒光鄉"
                        },
                        {
                            "zip": "212",
                            "name": "東引鄉"
                        }
                    ],
                    "name": "連江縣"
                },
                {
                    "districts": [
                        {
                            "zip": "300",
                            "name": "東區"
                        },
                        {
                            "zip": "300",
                            "name": "北區"
                        },
                        {
                            "zip": "300",
                            "name": "香山區"
                        }
                    ],
                    "name": "新竹市"
                },
                {
                    "districts": [
                        {
                            "zip": "308",
                            "name": "寶山鄉"
                        },
                        {
                            "zip": "302",
                            "name": "竹北市"
                        },
                        {
                            "zip": "303",
                            "name": "湖口鄉"
                        },
                        {
                            "zip": "304",
                            "name": "新豐鄉"
                        },
                        {
                            "zip": "305",
                            "name": "新埔鎮"
                        },
                        {
                            "zip": "306",
                            "name": "關西鎮"
                        },
                        {
                            "zip": "307",
                            "name": "芎林鄉"
                        },
                        {
                            "zip": "310",
                            "name": "竹東鎮"
                        },
                        {
                            "zip": "311",
                            "name": "五峰鄉"
                        },
                        {
                            "zip": "312",
                            "name": "橫山鄉"
                        },
                        {
                            "zip": "313",
                            "name": "尖石鄉"
                        },
                        {
                            "zip": "314",
                            "name": "北埔鄉"
                        },
                        {
                            "zip": "315",
                            "name": "峨眉鄉"
                        }
                    ],
                    "name": "新竹縣"
                },
                {
                    "districts": [
                        {
                            "zip": "320",
                            "name": "中壢區"
                        },
                        {
                            "zip": "324",
                            "name": "平鎮區"
                        },
                        {
                            "zip": "325",
                            "name": "龍潭區"
                        },
                        {
                            "zip": "326",
                            "name": "楊梅區"
                        },
                        {
                            "zip": "327",
                            "name": "新屋區"
                        },
                        {
                            "zip": "328",
                            "name": "觀音區"
                        },
                        {
                            "zip": "330",
                            "name": "桃園區"
                        },
                        {
                            "zip": "333",
                            "name": "龜山區"
                        },
                        {
                            "zip": "334",
                            "name": "八德區"
                        },
                        {
                            "zip": "335",
                            "name": "大溪區"
                        },
                        {
                            "zip": "336",
                            "name": "復興區"
                        },
                        {
                            "zip": "337",
                            "name": "大園區"
                        },
                        {
                            "zip": "338",
                            "name": "蘆竹區"
                        }
                    ],
                    "name": "桃園市"
                },
                {
                    "districts": [
                        {
                            "zip": "350",
                            "name": "竹南鎮"
                        },
                        {
                            "zip": "351",
                            "name": "頭份市"
                        },
                        {
                            "zip": "352",
                            "name": "三灣鄉"
                        },
                        {
                            "zip": "353",
                            "name": "南庄鄉"
                        },
                        {
                            "zip": "354",
                            "name": "獅潭鄉"
                        },
                        {
                            "zip": "356",
                            "name": "後龍鎮"
                        },
                        {
                            "zip": "357",
                            "name": "通霄鎮"
                        },
                        {
                            "zip": "358",
                            "name": "苑裡鎮"
                        },
                        {
                            "zip": "360",
                            "name": "苗栗市"
                        },
                        {
                            "zip": "361",
                            "name": "造橋鄉"
                        },
                        {
                            "zip": "362",
                            "name": "頭屋鄉"
                        },
                        {
                            "zip": "363",
                            "name": "公館鄉"
                        },
                        {
                            "zip": "364",
                            "name": "大湖鄉"
                        },
                        {
                            "zip": "365",
                            "name": "泰安鄉"
                        },
                        {
                            "zip": "366",
                            "name": "銅鑼鄉"
                        },
                        {
                            "zip": "367",
                            "name": "三義鄉"
                        },
                        {
                            "zip": "368",
                            "name": "西湖鄉"
                        },
                        {
                            "zip": "369",
                            "name": "卓蘭鎮"
                        }
                    ],
                    "name": "苗栗縣"
                },
                {
                    "districts": [
                        {
                            "zip": "400",
                            "name": "中區"
                        },
                        {
                            "zip": "401",
                            "name": "東區"
                        },
                        {
                            "zip": "402",
                            "name": "南區"
                        },
                        {
                            "zip": "403",
                            "name": "西區"
                        },
                        {
                            "zip": "404",
                            "name": "北區"
                        },
                        {
                            "zip": "406",
                            "name": "北屯區"
                        },
                        {
                            "zip": "407",
                            "name": "西屯區"
                        },
                        {
                            "zip": "408",
                            "name": "南屯區"
                        },
                        {
                            "zip": "411",
                            "name": "太平區"
                        },
                        {
                            "zip": "412",
                            "name": "大里區"
                        },
                        {
                            "zip": "413",
                            "name": "霧峰區"
                        },
                        {
                            "zip": "414",
                            "name": "烏日區"
                        },
                        {
                            "zip": "420",
                            "name": "豐原區"
                        },
                        {
                            "zip": "421",
                            "name": "后里區"
                        },
                        {
                            "zip": "422",
                            "name": "石岡區"
                        },
                        {
                            "zip": "423",
                            "name": "東勢區"
                        },
                        {
                            "zip": "424",
                            "name": "和平區"
                        },
                        {
                            "zip": "426",
                            "name": "新社區"
                        },
                        {
                            "zip": "427",
                            "name": "潭子區"
                        },
                        {
                            "zip": "428",
                            "name": "大雅區"
                        },
                        {
                            "zip": "429",
                            "name": "神岡區"
                        },
                        {
                            "zip": "432",
                            "name": "大肚區"
                        },
                        {
                            "zip": "433",
                            "name": "沙鹿區"
                        },
                        {
                            "zip": "434",
                            "name": "龍井區"
                        },
                        {
                            "zip": "435",
                            "name": "梧棲區"
                        },
                        {
                            "zip": "436",
                            "name": "清水區"
                        },
                        {
                            "zip": "437",
                            "name": "大甲區"
                        },
                        {
                            "zip": "438",
                            "name": "外埔區"
                        },
                        {
                            "zip": "439",
                            "name": "大安區"
                        }
                    ],
                    "name": "臺中市"
                },
                {
                    "districts": [
                        {
                            "zip": "500",
                            "name": "彰化市"
                        },
                        {
                            "zip": "502",
                            "name": "芬園鄉"
                        },
                        {
                            "zip": "503",
                            "name": "花壇鄉"
                        },
                        {
                            "zip": "504",
                            "name": "秀水鄉"
                        },
                        {
                            "zip": "505",
                            "name": "鹿港鎮"
                        },
                        {
                            "zip": "506",
                            "name": "福興鄉"
                        },
                        {
                            "zip": "507",
                            "name": "線西鄉"
                        },
                        {
                            "zip": "508",
                            "name": "和美鎮"
                        },
                        {
                            "zip": "509",
                            "name": "伸港鄉"
                        },
                        {
                            "zip": "510",
                            "name": "員林市"
                        },
                        {
                            "zip": "511",
                            "name": "社頭鄉"
                        },
                        {
                            "zip": "512",
                            "name": "永靖鄉"
                        },
                        {
                            "zip": "513",
                            "name": "埔心鄉"
                        },
                        {
                            "zip": "514",
                            "name": "溪湖鎮"
                        },
                        {
                            "zip": "515",
                            "name": "大村鄉"
                        },
                        {
                            "zip": "516",
                            "name": "埔鹽鄉"
                        },
                        {
                            "zip": "520",
                            "name": "田中鎮"
                        },
                        {
                            "zip": "521",
                            "name": "北斗鎮"
                        },
                        {
                            "zip": "522",
                            "name": "田尾鄉"
                        },
                        {
                            "zip": "523",
                            "name": "埤頭鄉"
                        },
                        {
                            "zip": "524",
                            "name": "溪州鄉"
                        },
                        {
                            "zip": "525",
                            "name": "竹塘鄉"
                        },
                        {
                            "zip": "526",
                            "name": "二林鎮"
                        },
                        {
                            "zip": "527",
                            "name": "大城鄉"
                        },
                        {
                            "zip": "528",
                            "name": "芳苑鄉"
                        },
                        {
                            "zip": "530",
                            "name": "二水鄉"
                        }
                    ],
                    "name": "彰化縣"
                },
                {
                    "districts": [
                        {
                            "zip": "540",
                            "name": "南投市"
                        },
                        {
                            "zip": "541",
                            "name": "中寮鄉"
                        },
                        {
                            "zip": "542",
                            "name": "草屯鎮"
                        },
                        {
                            "zip": "544",
                            "name": "國姓鄉"
                        },
                        {
                            "zip": "545",
                            "name": "埔里鎮"
                        },
                        {
                            "zip": "546",
                            "name": "仁愛鄉"
                        },
                        {
                            "zip": "551",
                            "name": "名間鄉"
                        },
                        {
                            "zip": "552",
                            "name": "集集鎮"
                        },
                        {
                            "zip": "553",
                            "name": "水里鄉"
                        },
                        {
                            "zip": "555",
                            "name": "魚池鄉"
                        },
                        {
                            "zip": "556",
                            "name": "信義鄉"
                        },
                        {
                            "zip": "557",
                            "name": "竹山鎮"
                        },
                        {
                            "zip": "558",
                            "name": "鹿谷鄉"
                        }
                    ],
                    "name": "南投縣"
                },
                {
                    "districts": [
                        {
                            "zip": "600",
                            "name": "西區"
                        },
                        {
                            "zip": "600",
                            "name": "東區"
                        }
                    ],
                    "name": "嘉義市"
                },
                {
                    "districts": [
                        {
                            "zip": "602",
                            "name": "番路鄉"
                        },
                        {
                            "zip": "603",
                            "name": "梅山鄉"
                        },
                        {
                            "zip": "604",
                            "name": "竹崎鄉"
                        },
                        {
                            "zip": "605",
                            "name": "阿里山鄉"
                        },
                        {
                            "zip": "606",
                            "name": "中埔鄉"
                        },
                        {
                            "zip": "607",
                            "name": "大埔鄉"
                        },
                        {
                            "zip": "608",
                            "name": "水上鄉"
                        },
                        {
                            "zip": "611",
                            "name": "鹿草鄉"
                        },
                        {
                            "zip": "612",
                            "name": "太保市"
                        },
                        {
                            "zip": "613",
                            "name": "朴子市"
                        },
                        {
                            "zip": "614",
                            "name": "東石鄉"
                        },
                        {
                            "zip": "615",
                            "name": "六腳鄉"
                        },
                        {
                            "zip": "616",
                            "name": "新港鄉"
                        },
                        {
                            "zip": "621",
                            "name": "民雄鄉"
                        },
                        {
                            "zip": "622",
                            "name": "大林鎮"
                        },
                        {
                            "zip": "623",
                            "name": "溪口鄉"
                        },
                        {
                            "zip": "624",
                            "name": "義竹鄉"
                        },
                        {
                            "zip": "625",
                            "name": "布袋鎮"
                        }
                    ],
                    "name": "嘉義縣"
                },
                {
                    "districts": [
                        {
                            "zip": "630",
                            "name": "斗南鎮"
                        },
                        {
                            "zip": "631",
                            "name": "大埤鄉"
                        },
                        {
                            "zip": "632",
                            "name": "虎尾鎮"
                        },
                        {
                            "zip": "633",
                            "name": "土庫鎮"
                        },
                        {
                            "zip": "634",
                            "name": "褒忠鄉"
                        },
                        {
                            "zip": "635",
                            "name": "東勢鄉"
                        },
                        {
                            "zip": "636",
                            "name": "臺西鄉"
                        },
                        {
                            "zip": "637",
                            "name": "崙背鄉"
                        },
                        {
                            "zip": "638",
                            "name": "麥寮鄉"
                        },
                        {
                            "zip": "640",
                            "name": "斗六市"
                        },
                        {
                            "zip": "643",
                            "name": "林內鄉"
                        },
                        {
                            "zip": "646",
                            "name": "古坑鄉"
                        },
                        {
                            "zip": "647",
                            "name": "莿桐鄉"
                        },
                        {
                            "zip": "648",
                            "name": "西螺鎮"
                        },
                        {
                            "zip": "649",
                            "name": "二崙鄉"
                        },
                        {
                            "zip": "651",
                            "name": "北港鎮"
                        },
                        {
                            "zip": "652",
                            "name": "水林鄉"
                        },
                        {
                            "zip": "653",
                            "name": "口湖鄉"
                        },
                        {
                            "zip": "654",
                            "name": "四湖鄉"
                        },
                        {
                            "zip": "655",
                            "name": "元長鄉"
                        }
                    ],
                    "name": "雲林縣"
                },
                {
                    "districts": [
                        {
                            "zip": "700",
                            "name": "中西區"
                        },
                        {
                            "zip": "701",
                            "name": "東區"
                        },
                        {
                            "zip": "702",
                            "name": "南區"
                        },
                        {
                            "zip": "704",
                            "name": "北區"
                        },
                        {
                            "zip": "708",
                            "name": "安平區"
                        },
                        {
                            "zip": "709",
                            "name": "安南區"
                        },
                        {
                            "zip": "710",
                            "name": "永康區"
                        },
                        {
                            "zip": "711",
                            "name": "歸仁區"
                        },
                        {
                            "zip": "712",
                            "name": "新化區"
                        },
                        {
                            "zip": "713",
                            "name": "左鎮區"
                        },
                        {
                            "zip": "714",
                            "name": "玉井區"
                        },
                        {
                            "zip": "715",
                            "name": "楠西區"
                        },
                        {
                            "zip": "716",
                            "name": "南化區"
                        },
                        {
                            "zip": "717",
                            "name": "仁德區"
                        },
                        {
                            "zip": "718",
                            "name": "關廟區"
                        },
                        {
                            "zip": "719",
                            "name": "龍崎區"
                        },
                        {
                            "zip": "720",
                            "name": "官田區"
                        },
                        {
                            "zip": "721",
                            "name": "麻豆區"
                        },
                        {
                            "zip": "722",
                            "name": "佳里區"
                        },
                        {
                            "zip": "723",
                            "name": "西港區"
                        },
                        {
                            "zip": "724",
                            "name": "七股區"
                        },
                        {
                            "zip": "725",
                            "name": "將軍區"
                        },
                        {
                            "zip": "726",
                            "name": "學甲區"
                        },
                        {
                            "zip": "727",
                            "name": "北門區"
                        },
                        {
                            "zip": "730",
                            "name": "新營區"
                        },
                        {
                            "zip": "731",
                            "name": "後壁區"
                        },
                        {
                            "zip": "732",
                            "name": "白河區"
                        },
                        {
                            "zip": "733",
                            "name": "東山區"
                        },
                        {
                            "zip": "734",
                            "name": "六甲區"
                        },
                        {
                            "zip": "735",
                            "name": "下營區"
                        },
                        {
                            "zip": "736",
                            "name": "柳營區"
                        },
                        {
                            "zip": "737",
                            "name": "鹽水區"
                        },
                        {
                            "zip": "741",
                            "name": "善化區"
                        },
                        {
                            "zip": "744",
                            "name": "新市區"
                        },
                        {
                            "zip": "742",
                            "name": "大內區"
                        },
                        {
                            "zip": "743",
                            "name": "山上區"
                        },
                        {
                            "zip": "745",
                            "name": "安定區"
                        }
                    ],
                    "name": "臺南市"
                },
                {
                    "districts": [
                        {
                            "zip": "800",
                            "name": "新興區"
                        },
                        {
                            "zip": "801",
                            "name": "前金區"
                        },
                        {
                            "zip": "802",
                            "name": "苓雅區"
                        },
                        {
                            "zip": "803",
                            "name": "鹽埕區"
                        },
                        {
                            "zip": "804",
                            "name": "鼓山區"
                        },
                        {
                            "zip": "805",
                            "name": "旗津區"
                        },
                        {
                            "zip": "806",
                            "name": "前鎮區"
                        },
                        {
                            "zip": "807",
                            "name": "三民區"
                        },
                        {
                            "zip": "811",
                            "name": "楠梓區"
                        },
                        {
                            "zip": "812",
                            "name": "小港區"
                        },
                        {
                            "zip": "813",
                            "name": "左營區"
                        },
                        {
                            "zip": "814",
                            "name": "仁武區"
                        },
                        {
                            "zip": "815",
                            "name": "大社區"
                        },
                        {
                            "zip": "817",
                            "name": "東沙群島"
                        },
                        {
                            "zip": "819",
                            "name": "南沙群島"
                        },
                        {
                            "zip": "820",
                            "name": "岡山區"
                        },
                        {
                            "zip": "821",
                            "name": "路竹區"
                        },
                        {
                            "zip": "822",
                            "name": "阿蓮區"
                        },
                        {
                            "zip": "823",
                            "name": "田寮區"
                        },
                        {
                            "zip": "824",
                            "name": "燕巢區"
                        },
                        {
                            "zip": "825",
                            "name": "橋頭區"
                        },
                        {
                            "zip": "826",
                            "name": "梓官區"
                        },
                        {
                            "zip": "827",
                            "name": "彌陀區"
                        },
                        {
                            "zip": "828",
                            "name": "永安區"
                        },
                        {
                            "zip": "829",
                            "name": "湖內區"
                        },
                        {
                            "zip": "830",
                            "name": "鳳山區"
                        },
                        {
                            "zip": "831",
                            "name": "大寮區"
                        },
                        {
                            "zip": "832",
                            "name": "林園區"
                        },
                        {
                            "zip": "833",
                            "name": "鳥松區"
                        },
                        {
                            "zip": "840",
                            "name": "大樹區"
                        },
                        {
                            "zip": "842",
                            "name": "旗山區"
                        },
                        {
                            "zip": "843",
                            "name": "美濃區"
                        },
                        {
                            "zip": "844",
                            "name": "六龜區"
                        },
                        {
                            "zip": "845",
                            "name": "內門區"
                        },
                        {
                            "zip": "846",
                            "name": "杉林區"
                        },
                        {
                            "zip": "847",
                            "name": "甲仙區"
                        },
                        {
                            "zip": "848",
                            "name": "桃源區"
                        },
                        {
                            "zip": "849",
                            "name": "那瑪夏區"
                        },
                        {
                            "zip": "851",
                            "name": "茂林區"
                        },
                        {
                            "zip": "852",
                            "name": "茄萣區"
                        }
                    ],
                    "name": "高雄市"
                },
                {
                    "districts": [
                        {
                            "zip": "900",
                            "name": "屏東市"
                        },
                        {
                            "zip": "901",
                            "name": "三地門鄉"
                        },
                        {
                            "zip": "902",
                            "name": "霧臺鄉"
                        },
                        {
                            "zip": "903",
                            "name": "瑪家鄉"
                        },
                        {
                            "zip": "904",
                            "name": "九如鄉"
                        },
                        {
                            "zip": "905",
                            "name": "里港鄉"
                        },
                        {
                            "zip": "906",
                            "name": "高樹鄉"
                        },
                        {
                            "zip": "907",
                            "name": "鹽埔鄉"
                        },
                        {
                            "zip": "908",
                            "name": "長治鄉"
                        },
                        {
                            "zip": "909",
                            "name": "麟洛鄉"
                        },
                        {
                            "zip": "911",
                            "name": "竹田鄉"
                        },
                        {
                            "zip": "912",
                            "name": "內埔鄉"
                        },
                        {
                            "zip": "913",
                            "name": "萬丹鄉"
                        },
                        {
                            "zip": "920",
                            "name": "潮州鎮"
                        },
                        {
                            "zip": "921",
                            "name": "泰武鄉"
                        },
                        {
                            "zip": "922",
                            "name": "來義鄉"
                        },
                        {
                            "zip": "923",
                            "name": "萬巒鄉"
                        },
                        {
                            "zip": "924",
                            "name": "崁頂鄉"
                        },
                        {
                            "zip": "925",
                            "name": "新埤鄉"
                        },
                        {
                            "zip": "926",
                            "name": "南州鄉"
                        },
                        {
                            "zip": "927",
                            "name": "林邊鄉"
                        },
                        {
                            "zip": "928",
                            "name": "東港鎮"
                        },
                        {
                            "zip": "929",
                            "name": "琉球鄉"
                        },
                        {
                            "zip": "931",
                            "name": "佳冬鄉"
                        },
                        {
                            "zip": "932",
                            "name": "新園鄉"
                        },
                        {
                            "zip": "940",
                            "name": "枋寮鄉"
                        },
                        {
                            "zip": "941",
                            "name": "枋山鄉"
                        },
                        {
                            "zip": "942",
                            "name": "春日鄉"
                        },
                        {
                            "zip": "943",
                            "name": "獅子鄉"
                        },
                        {
                            "zip": "944",
                            "name": "車城鄉"
                        },
                        {
                            "zip": "945",
                            "name": "牡丹鄉"
                        },
                        {
                            "zip": "946",
                            "name": "恆春鎮"
                        },
                        {
                            "zip": "947",
                            "name": "滿州鄉"
                        }
                    ],
                    "name": "屏東縣"
                },
                {
                    "districts": [
                        {
                            "zip": "950",
                            "name": "臺東市"
                        },
                        {
                            "zip": "951",
                            "name": "綠島鄉"
                        },
                        {
                            "zip": "952",
                            "name": "蘭嶼鄉"
                        },
                        {
                            "zip": "953",
                            "name": "延平鄉"
                        },
                        {
                            "zip": "954",
                            "name": "卑南鄉"
                        },
                        {
                            "zip": "955",
                            "name": "鹿野鄉"
                        },
                        {
                            "zip": "956",
                            "name": "關山鎮"
                        },
                        {
                            "zip": "957",
                            "name": "海端鄉"
                        },
                        {
                            "zip": "958",
                            "name": "池上鄉"
                        },
                        {
                            "zip": "959",
                            "name": "東河鄉"
                        },
                        {
                            "zip": "961",
                            "name": "成功鎮"
                        },
                        {
                            "zip": "962",
                            "name": "長濱鄉"
                        },
                        {
                            "zip": "963",
                            "name": "太麻里鄉"
                        },
                        {
                            "zip": "964",
                            "name": "金峰鄉"
                        },
                        {
                            "zip": "965",
                            "name": "大武鄉"
                        },
                        {
                            "zip": "966",
                            "name": "達仁鄉"
                        }
                    ],
                    "name": "臺東縣"
                },
                {
                    "districts": [
                        {
                            "zip": "970",
                            "name": "花蓮市"
                        },
                        {
                            "zip": "971",
                            "name": "新城鄉"
                        },
                        {
                            "zip": "972",
                            "name": "秀林鄉"
                        },
                        {
                            "zip": "973",
                            "name": "吉安鄉"
                        },
                        {
                            "zip": "974",
                            "name": "壽豐鄉"
                        },
                        {
                            "zip": "975",
                            "name": "鳳林鎮"
                        },
                        {
                            "zip": "976",
                            "name": "光復鄉"
                        },
                        {
                            "zip": "977",
                            "name": "豐濱鄉"
                        },
                        {
                            "zip": "978",
                            "name": "瑞穗鄉"
                        },
                        {
                            "zip": "979",
                            "name": "萬榮鄉"
                        },
                        {
                            "zip": "981",
                            "name": "玉里鎮"
                        },
                        {
                            "zip": "982",
                            "name": "卓溪鄉"
                        },
                        {
                            "zip": "983",
                            "name": "富里鄉"
                        }
                    ],
                    "name": "花蓮縣"
                },
                {
                    "districts": [
                        {
                            "zip": "880",
                            "name": "馬公市"
                        },
                        {
                            "zip": "881",
                            "name": "西嶼鄉"
                        },
                        {
                            "zip": "882",
                            "name": "望安鄉"
                        },
                        {
                            "zip": "883",
                            "name": "七美鄉"
                        },
                        {
                            "zip": "884",
                            "name": "白沙鄉"
                        },
                        {
                            "zip": "885",
                            "name": "湖西鄉"
                        }
                    ],
                    "name": "澎湖縣"
                },
                {
                    "districts": [
                        {
                            "zip": "890",
                            "name": "金沙鎮"
                        },
                        {
                            "zip": "891",
                            "name": "金湖鎮"
                        },
                        {
                            "zip": "892",
                            "name": "金寧鄉"
                        },
                        {
                            "zip": "893",
                            "name": "金城鎮"
                        },
                        {
                            "zip": "894",
                            "name": "烈嶼鄉"
                        },
                        {
                            "zip": "896",
                            "name": "烏坵鄉"
                        }
                    ],
                    "name": "金門縣"
                }
            ],
            selectedCity: "",
            selectedDistrict: "",
            selectedZipCode: "",
            // cityListTest: [],
            // disabledDates: {
            //     dates: [], // 在這裡不列舉具體的日期，表示所有日期都可選擇
            //     predicate: (targetDate) => targetDate > this.picked // 禁用當前日期之後的所有日期
            // },
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
        // handleAddMail() {
        //     // 4.設定信箱格式結尾
        //     let inpMail = this.donorInf.addMail;
        //     if (!inpMail.endsWith('.com') && !inpMail.endsWith('.com.tw')) {
        //         alert('信箱格式錯誤 請確認是否完整');
        //     }
        //     else {
        //         console.log(inpMail);
        //     };
        // },
        // handleAddPhone() {
        //     // 5.電話設定10碼並且是09開頭
        //     let inpPHONE = this.donorInf.addPhone;
        //     if (/^09\d{8}$/.test(this.inpPHONE)) {
        //         console.log(inpPHONE);
        //     } else {
        //         alert('請確認電話號碼是否正確');
        //     };
        // },
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
                        // window.location.href = 'http://localhost/AJAX/APITEST/d100_createOrder.php';
                        window.location.href = 'API/d100_createOrder.php';
                    };
                    if (this.cookie == 500) {
                        // window.location.href = 'http://localhost/AJAX/APITEST/d500_createOrder.php';
                        window.location.href = 'API/d500_createOrder.php';
                    };
                    if (this.cookie == 1000) {
                        // window.location.href = 'http://localhost/AJAX/APITEST/d1000_createOrder.php';
                        window.location.href = 'API/d1000_createOrder.php';
                    };
                    if (this.cookie == 2000) {
                        // window.location.href = 'http://localhost/AJAX/APITEST/d2000_createOrder.php';
                        window.location.href = 'API/d2000_createOrder.php';
                    };
                } else {
                    this.$router.push(`/donate`)
                }
            }

            // console.log(this.cookie)


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

    mounted() {
        this.getdate()
        // axios
        //     .get("../assets/json/TwCities.json")
        //     .then(response => {
        //         this.cityListTest = response.data.products;
        //         console.log(this.cityListTest)
        //     });
    }
}
// },


// }
</script>