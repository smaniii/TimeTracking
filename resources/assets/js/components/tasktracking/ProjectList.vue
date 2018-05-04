<template>
    <div class="container-fluid">
        <div v-for="project in projects" class="mx-auto w-75">
            <project-summary :name="project.name" :max="project.cap" :value="project.billableHours" :projectId="project.Id"></project-summary>
        </div>
    </div>
</template>
<script>
    import ProjectSummary from "./ProjectSummary.vue";
    import axios from "axios";
    import {api} from "../../config";
    export default {
        components: {'project-summary': ProjectSummary},
        beforeMount () {
            axios.get(api.getProjects).then(response => {this.projects = response.data; console.log(response.data)})
        },
        data () {
            return {
                projects: []
            }
        }
    }
</script>