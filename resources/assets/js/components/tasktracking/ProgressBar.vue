<template>
    <b-progress :max="getMaxOrValue" :value="value" :variant="getVariant" :show-progress="getShowProgress" :animated="getAnimated"></b-progress>
</template>
<script>
    import bProgress from 'bootstrap-vue/es/components/progress/progress';

    export default {
        components: {
            'bProgress': bProgress,
        },
        props: {
            max: {
                type: Number,
                default: 0
            },
            value: {
                type: Number,
                default: 0
            }
        },
        computed: {
            getMaxOrValue: function () {
                if(this.max === 0) {
                    return this.value;
                }
                return this.max;
            },
            getVariant: function () {
                if (this.max === 0) {
                    return "secondary";
                }
                return "primary";
            },
            getShowProgress: function () {
                if (this.max === 0) {
                    return false;
                }
                return true;
            },
            getAnimated: function () {
                if (this.max === 0) {
                    return false;
                }
                return true;
            }
        }
    }

</script>