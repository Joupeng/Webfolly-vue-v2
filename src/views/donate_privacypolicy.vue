<template>
    <frontnav></frontnav>

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