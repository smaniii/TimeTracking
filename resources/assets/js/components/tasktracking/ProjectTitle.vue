<template>
    <h2><a :href="'/project/' + projectId">{{title}}</a></h2>
</template>
<script>
    export default {
        props: {
            title: {
                type: String,
                default: "No Title"
            },
            projectId: {
                type: Number,
                default: "1"
            }
        },
        computed: {
            getProjectId: function () {
                return this.projectId;
            }
        }
    }
</script>