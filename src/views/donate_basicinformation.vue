<template>
    <frontnav></frontnav>
    <section class="donate_basicinformation">


        <div class="banner">
            <img src="/src/assets/images/donate/donate_finish_banner.svg" alt="">
        </div>
        <!-- bannerNew -->

        <front_donate_flow></front_donate_flow>

        <div class="main_block">
            <div class="inner_block">
                <h1>基本資料填寫</h1>
                <div>
                    <p>姓氏</p>
                    <input type="text">
                </div>
                <div>
                    <p>名字</p>
                    <input type="text">
                </div>
                <div>
                    <p>電子信箱</p>
                    <input type="text">
                </div>
                <div>
                    <p>手機電話</p>
                    <input type="text">
                </div>

                <div class="gender-options">
                    <p>性別</p>
                    <div class="gender-inner">
                        <label class="gender-option">
                            <input type="radio" name="gender" value="male"> 男
                        </label>
                        <label class="gender-option">
                            <input type="radio" name="gender" value="female"> 女
                        </label>
                        <label class="gender-option">
                            <input type="radio" name="gender" value="other"> 其他
                        </label>
                    </div>
                </div>

                <div>
                    <p>生日</p>
                    <input type="text">
                </div>

                <!-- 地址 -->
                <div>
                    <p>地址</p>
                    <input type="text" placeholder=" 郵遞區號" class="PostalCode">

                    <div class="drop-down_menu_block">

                        <!-- 縣市 -->
                        <select class="list_block">
                            <div class="list_inside_block1">
                                <option class="choose_month">
                                    <p>縣市</p>
                                </option>
                                <option class="li_month">
                                    <p>臺北市</p>
                                </option>
                                <option class="li_month">
                                    <p>新北市</p>
                                </option>
                                <option class="li_month">
                                    <p>桃園市</p>
                                </option>
                                <option class="li_month">
                                    <p>臺中市</p>
                                </option>
                                <option class="li_month">
                                    <p>高雄市</p>
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

                    <div class="Receipt-inner">

                        <label class="Receipt-option">
                            <input type="radio" name="Receipt" value="male"> 直接上傳至國稅局，免寄紙本收據
                            (為節省資源建議選此項，需填身分
                            證字號)
                        </label>

                        <label class="Receipt-option">
                            <input type="radio" name="Receipt" value="female"> 寄送紙本收據(地址為必填;單筆捐
                            款每次寄發，定期捐款年度寄發)
                        </label>

                        <label class="Receipt-option">
                            <input type="radio" name="Receipt" value="other"> 不需收據(無抵稅需求/不用寄給我
                            收據)
                        </label>

                        <label class="Receipt-option">
                            <input type="radio" name="Receipt" value="other"> 我同意隱私權條款
                        </label>

                    </div>
                </div>



                <div class="gender-options">
                    <p>
                        您的支持對我們至關重要，為了讓您掌握更多網中愚的訊息，我們將不定期提供更多媒體視讀報告、活動通知、捐款呼籲等相關資料。
                    </p>
                    <label class="gender-option">
                        <input type="radio" name="gender" value="male">是，我願意接收相關訊息
                    </label>
                    <label class="gender-option">
                        <input type="radio" name="gender" value="female">不，我不願意接收相關訊息
                    </label>

                </div>


            </div>


        </div>

        <!-- 查詢捐款按鈕 -->
        <div class="donate_btn_outer">
            <router-link :to="{ name: 'back_donate_basicinformation_02' }" class="donate_btn"><span
                    :class="{ 'frontheader_menu-on': $route.name == 'donate' }">確認送出</span>
            </router-link>
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


export default {
    components: {
        frontnav,
        frontfooter,
        front_donate_flow,
        front_donate_subfooter
    }
}
</script>