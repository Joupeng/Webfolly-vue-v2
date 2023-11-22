<template>
    <frontnav></frontnav>
    <front_aboutusMain> </front_aboutusMain>
    <frontfooter class="back_account_f"></frontfooter>
</template>

<script>
import frontnav from '@/components/front_header.vue'
import front_aboutusMain from '@/components/front_aboutusMain.vue'
import frontfooter from '@/components/front_footer.vue'

export default {
    components: {
        frontnav,
        front_aboutusMain,
        frontfooter,
    }
}
</script>