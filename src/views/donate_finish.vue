<template>
    <frontnav></frontnav>
    <front_donate_success></front_donate_success>
    <!-- <front_donate_fail></front_donate_fail> -->
    <front_donate_subfooter></front_donate_subfooter>
    <frontfooter></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import front_donate_success from '@/components/front_donate_success.vue'
// import front_donate_fail from '@/components/front_donate_fail.vue'
import front_donate_subfooter from '@/components/front_donate_subfooter.vue'
import frontfooter from '@/components/front_footer.vue'

export default {
    components: {
        frontnav,
        front_donate_success,
        // front_donate_fail,
        front_donate_subfooter,
        frontfooter,
    }
}
</script>