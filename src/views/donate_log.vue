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
                <img src="/src/assets/images/donate/donate_record_01.png" alt="">
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


                    <!-- bootstap寫法 -->
                    <!-- <div class="btn-group">
                        <button type="button" class="btn btn-danger">月</button>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">一月</a></li>
                            <li><a class="dropdown-item" href="#">二月</a></li>
                            <li><a class="dropdown-item" href="#">三月</a></li>
                            <li><a class="dropdown-item" href="#">四月</a></li>
                            <li><a class="dropdown-item" href="#">五月</a></li>
                            <li><a class="dropdown-item" href="#">六月</a></li>
                            <li><a class="dropdown-item" href="#">七月</a></li>
                            <li><a class="dropdown-item" href="#">八月</a></li>
                            <li><a class="dropdown-item" href="#">九月</a></li>
                            <li><a class="dropdown-item" href="#">十月</a></li>
                            <li><a class="dropdown-item" href="#">十一月</a></li>
                            <li><a class="dropdown-item" href="#">十二月</a></li>
                        </ul>
                    </div> -->
                </div>

                <div class="verification_code_block">

                    <input type="text" placeholder="請輸入驗證碼" class="text_here">
                    <div class="text_here2 underline">STEX</div>
                    <!-- 按鈕 -->


                </div>
                <!-- 查詢捐款按鈕 -->
                <div class="donate_btn_outer">
                    <router-link :to="{ name: 'donate_record_result' }" @click="closeNav" class="donate_btn"><span
                            :class="{ 'frontheader_menu-on': $route.name == 'donate' }">查詢捐款 &#128269</span>
                    </router-link>
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
    }
}
</script>