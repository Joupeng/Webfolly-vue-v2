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
                    <select class="list_block">
                        <option class="choose_year" placeholder="請選擇年份">請選擇年份</option>
                        <option class="li_year" v-for="year in years" :key="year">{{ year }}</option>
                    </select>
                    <!-- 月份 -->
                    <select class="list_block">
                        <option class="choose_month">請選擇月份</option>
                        <option class="li_month" v-for="(month, index) in months" :key="index + 1">{{ month }}</option>
                    </select>



                </div>

                <div class="verification_code_block">

                    <input type="text" placeholder="請輸入驗證碼(不分大小寫)" class="text_here unified_input input"
                        v-model.trim="inputValidCode">
                    <!-- 驗證碼匡 -->
                    <div class="text_here2 underline validcode" id="validcode" @click="updateNumber()">
                        {{ validCode }}
                    </div>
                </div>




                <!-- 查詢捐款按鈕 -->
                <!-- <div class="donate_btn_outer"> -->

                <button class="donate_btn" type="button" @click="queryDonations">
                    查詢捐款 &#128269
                </button>

                <!-- </div> -->

                <!-- 舊版 -->
                <!-- <div class="donate_btn_outer">
                    <router-link :to="{ name: 'donate_record_result' }" @click="closeNav" class="donate_btn"><span
                            :class="{ 'frontheader_menu-on': $route.name == 'donate' }">查詢捐款 &#128269</span>
                    </router-link>
                </div> -->


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
                    <p>{{ donation.FNAME }} {{ donation.LNAME }}</p>
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

            // 輸入年月的選單欄位
            selectedYear: null,
            selectedMonth: null,
            inputValidCode: "", // 使用者輸入的驗證碼
            validCode: "點擊此處獲得驗證碼", // 這裡使用一個固定的驗證碼，你可以根據實際需求修改
            years: ["2012", "2014", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"],
            months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"]

        };
    },
    mounted() {


        // 模拟异步获取数据库数据
        setTimeout(() => {
            const serverData = [
                { FNAME: 'John', LNAME: 'Doe', MONEY: 'NT$200', donation_time: '2023-02-15' },
                // 其他数据...
            ];

            this.donations = serverData.map(donation => ({
                FNAME: donation.FNAME,
                LNAME: donation.LNAME,
                MONEY: donation.MONEY,
                DYEAR: new Date(donation.donation_time).getFullYear(),
                DMONTH: new Date(donation.donation_time).getMonth() + 1,
            }));
        }, 500); // 模拟延迟
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





        queryDonations() {
            // 在这里编写查询捐款信息的逻辑
            // 你可以使用 selectedYear、selectedMonth、verificationCode 的值进行查询
            // 示例：在控制台打印查询条件
            console.log("查询条件:", this.selectedYear, this.selectedMonth, this.verificationCode);

            // 使用 fetch 发送请求
            fetch('http://localhost/API/donate_log.php', {
                method: 'GET', // 或 'POST'，視你的 API 設計
                headers: {
                    'Content-Type': 'application/json', // 請根據實際需求調整
                    // 可添加其他 headers
                },
                // 如果使用 POST 方法，需要提供 body
                // body: JSON.stringify({ key: 'value' }) // 根據你的需求，將數據轉換為 JSON 字符串
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    console.log("Response status:", error.status); // 输出 HTTP 响应状态
                });
        }

    }
}

</script>