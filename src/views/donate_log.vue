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
                        <div class="list_inside_block">
                            <option class="choose_year">請選擇年份</option>
                            <option class="li_year">2012</option>
                            <option class="li_year">2014</option>
                            <option class="li_year">2014</option>
                            <option class="li_year">2015</option>
                            <option class="li_year">2016</option>
                            <option class="li_year">2017</option>
                            <option class="li_year">2018</option>
                            <option class="li_year">2019</option>
                            <option class="li_year">2020</option>
                            <option class="li_year">2021</option>
                            <option class="li_year">2022</option>
                            <option class="li_year">2023</option>
                        </div>
                    </select>
                    <!-- 月份 -->
                    <select class="list_block">
                        <div class="list_inside_block">
                            <option class="choose_month">請選擇月份</option>
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

                <div class="verification_code_block">

                    <input type="text" placeholder="請輸入驗證碼" class="text_here">
                    <div class="text_here2 underline">STEX</div>
                    <!-- 按鈕 -->


                </div>
                <!-- 查詢捐款按鈕 -->
                <div class="donate_btn_outer">

                    <button class="donate_btn" type="button">
                        查詢捐款 &#128269
                    </button>

                </div>

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
            donations: []
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
        queryDonations() {
            // 在这里编写查询捐款信息的逻辑
            // 你可以使用 selectedYear、selectedMonth、verificationCode 的值进行查询
            // 示例：在控制台打印查询条件
            console.log("查询条件:", this.selectedYear, this.selectedMonth, this.verificationCode);

            // 使用 fetch 发送请求
            fetch('http://localhost/path/to/donate_log.php')
                .then(response => {
                    // 确保请求成功
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    // 将响应的 JSON 数据解析成对象
                    return response.json();
                })
                .then(data => {
                    // 请求成功，将数据更新到 donations
                    this.donations = data;
                })
                .catch(error => {
                    // 请求失败，处理错误
                    console.error('请求失败:', error);
                });
        }
    }
}

</script>