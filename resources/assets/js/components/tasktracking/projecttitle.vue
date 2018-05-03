<template>
    <h2 :value="value">{{getValue}}</h2>
</template>
<script>
    export default {
        props: {
            value: {
                type: String,
                default: "No Title"
            }
        },
        computed: {
            getValue: function () {
                return this.value;
            },
        }
    }
</script>