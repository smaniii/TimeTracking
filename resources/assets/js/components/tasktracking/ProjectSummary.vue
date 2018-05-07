<template>
    <div>
        <project-title class="text-center" :title="name" :projectid="projectid"></project-title>
        <progress-bar :max="max" :value="value"></progress-bar>
    </div>
</template>
<script>
    import ProgressBar from "./ProgressBar.vue";
    import ProjectTitle from "./ProjectTitle.vue"
    export default {
        components: {
            'progress-bar' : ProgressBar,
            'project-title' : ProjectTitle,
        },
        props: {
            name: {
                type: String,
                default: "No Title"
            },
            max: {
                type: Number,
                default: 0
            },
            value: {
                type: Number,
                default: 0
            },
            projectid: {
                type: Number,
                default: 1
            }
        }
    }
</script>