<template>
    <h2><a :href="'/project/' + projectid">{{title}}</a></h2>
</template>
<script>
    export default {
        props: {
            title: {
                type: String,
                default: "No Title"
            },
            projectid: {
                type: Number,
                default: "1"
            }
        },
        computed: {
            getProjectid: function () {
                return this.projectid;
            }
        }
    }
</script>