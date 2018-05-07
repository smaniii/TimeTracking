<template>
    <div class="container-fluid">
        <div class="mx-auto w-75">
            <project-summary :name="project.name" :max="project.cap" :value="project.billableHours" :projectid="project.id"></project-summary>
            <time-log :projectid="route" :max="project.cap"></time-log>
        </div>
    </div>
</template>
<script>
    import ProjectSummary from "./ProjectSummary.vue";
    import axios from "axios";
    import TimeLog from "./TimeLog.vue"
    import {api} from "../../config";
    export default {
        components: {'project-summary': ProjectSummary,
                    'time-log':TimeLog,},
        beforeMount () {
            //console.log(this.$route.params.id);
            axios.get(api.getProject + '/' + this.$route.params.id).then(response => {this.project = response.data; console.log(response.data)})
        },
        data () {
            return {
                project: [],
                route: parseInt(this.$route.params.id)
            }
        }
    }
</script>