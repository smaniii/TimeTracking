<template>
    <div>
        <projecttitle value="title"></projecttitle>
        <progressbar :max="100" :value="50"></progressbar>
    </div>
</template>
<script>
    import Progressbar from "./progressbar.vue";
    import projecttitle from "./projecttitle.vue"
    export default {
        components: {
            Progressbar,
            projecttitle,
        }
    }
</script>