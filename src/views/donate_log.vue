<template>
    <frontnav></frontnav>
    <section class="donate_log">

        <!-- 捐款徵信紀錄 -->
        <div class="titleBlock">
            <div class="titleBlockA">
                <p class="titleText">捐款徵信紀錄</p>
            </div>
        </div>

        <div class="two_block">
            <div class="img_block">
                <img src="../assets/images/donate/donate_record_01.png" alt="">
            </div>
            <div class="content_block">
                <p>捐款日期(年/月)</p>
                <div class="drop-down_menu_block">
                    <!-- 年份 -->
                    <select class="list_block" v-model="Dyear">
                        <option disabled value="" class="choose_year">請選擇年份</option>
                        <option class="li_year" v-for="year in years" :key="year">{{ year }}</option>
                    </select>
                    <!-- 月份 -->
                    <select class="list_block" v-model="Dmonth">
                        <option disabled value="" class="choose_month">請選擇月份</option>
                        <option class="li_month" v-for="(month, index) in months" :key="index + 1" :value="index + 1">{{
                            month }}</option>
                    </select>



                </div>

                <div class="verification_code_block">


                    <input type="text" placeholder="請輸入驗證碼" class="text_here unified_input input"
                        v-model.trim="inputValidCode">
                    <!-- 驗證碼匡 -->
                    <div class="text_here2 underline validcode" id="validcode" @click="updateNumber()">
                        {{ validCode }}
                    </div>
                </div>




                <!-- 查詢捐款按鈕 -->
                <!-- queryDonations -->

                <button class="donate_btn" type="button" @click="handleDonation">
                    查詢捐款 &#128269
                </button>



            </div>


        </div>


    </section>


    <section class="donate_record_result">

        <ul>
            <li class="first_li">
                <div>
                    <p>姓名</p>
                    <p>捐款金額</p>
                    <p>捐款時間</p>
                </div>
            </li>


            <li v-for="(donation, index) in donations" :class="{ 'white_li': index % 2 === 0, 'gray_li': index % 2 !== 0 }">
                <div>
                    <p>{{ donation.LNAME }}{{ donation.FNAME }} </p>
                    <p>{{ donation.MONEY }}</p>
                    <p>{{ donation.DYEAR }}/{{ donation.DMONTH }}</p>
                </div>
            </li>

            <!-- <li class="white_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="gray_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="white_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="gray_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="white_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="gray_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="white_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="gray_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="white_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li>
            <li class="gray_li">
                <div>
                    <p>XXX</p>
                    <p>NT$200</p>
                    <p>2023/02</p>
                </div>
            </li> -->
        </ul>





    </section>

    <front_donate_subfooter></front_donate_subfooter>
    <frontfooter></frontfooter>
</template>

<script>
import front_donate_subfooter from '@/components/front_donate_subfooter.vue'
import frontnav from '@/components/front_header.vue'
import frontfooter from '@/components/front_footer.vue'

export default {
    components: {
        frontnav,
        frontfooter,
        front_donate_subfooter
    },
    data() {
        return {
            donations: [],
            validCode: "",
            serverData: [],  // 添加 serverData 属性

            // 輸入年月的選單欄位
            selectedYear: null,
            selectedMonth: null,
            inputValidCode: "", // 使用者輸入的驗證碼
            validCode: "", // 這裡使用一個固定的驗證碼，你可以根據實際需求修改
            years: ["2012", "2014", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"],
            months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            Dyear: 2012,
            Dmonth: 1,
        };
    },
    mounted() {

    },

    // 進入畫面就生成驗證碼
    created() {
        // 在 Vue 實例被創建時生成驗證碼
        this.generateNumber();
    },

    methods: {



        // ==== 生成驗證碼
        generateNumber() {
            // 改成英文字母
            let letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            let validCode = "";
            for (let i = 1; i <= 4; i++) {

                let randomIndex = Math.floor(Math.random() * letters.length);
                validCode += letters.charAt(randomIndex);
            }
            this.validCode = validCode;
            this.verifyCode = true;
        },
        // ==== 更新驗證碼
        updateNumber() {
            this.generateNumber()
        },


        handleDonation() {
            // 驗證碼比對
            if (this.inputValidCode.toUpperCase() === this.validCode) {
                // 驗證碼正確，執行查詢捐款的邏輯
                // console.log("查詢捐款");

                // 使用 fetch 發送請求
                // http://localhost/API/donate_log.php


                // 'http://localhost/API/donate_log.php?DYEAR='+ this.Dyear
                // `http://localhost/API/donate_log.php?DYEAR=${this.Dyear}&DMONTH=${this.Dmonth}`

                fetch(`API/donate_log.php?DYEAR=${this.Dyear}&DMONTH=${this.Dmonth}`, {
                    method: 'GET',
                    // mode: 'cors',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        // 將取得的資料映射为前端需要的格式
                        this.donations = data.map(donation => ({
                            FNAME: donation.FNAME,
                            LNAME: donation.LNAME,
                            MONEY: donation.MONEY,
                            DYEAR: donation.DYEAR,
                            DMONTH: donation.DMONTH,
                        }));
                        // 检查是否有捐款记录
                        if (this.donations.length === 0) {
                            alert('沒有捐款紀錄');
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching data:", error);
                        console.log("Response status:", error.status);
                    });
            } else {
                // 驗證碼錯誤，顯示錯誤訊息
                alert("輸入驗證碼錯誤");
            }
        },



        // queryDonations() {
        //     console.log("查询条件:", this.selectedYear, this.selectedMonth, this.verificationCode);

        //     // 使用 fetch 发送请求
        //     // http://localhost/API/donate_log.php
        //     // http://localhost/API/donate_log.php?DYEAR=2023&DMONTH=12

        //     fetch('API/donate_log.php?DYEAR=2023&DMONTH=12', {
        //         method: 'GET',
        //         // mode: 'cors',
        //         headers: {
        //             'Content-Type': 'application/json',
        //         },
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             console.log(data);
        //         })
        //         .catch(error => {
        //             console.error("Error fetching data:", error);
        //             console.log("Response status:", error.status);
        //         });
        // }

    }
}

</script>