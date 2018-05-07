<template>
    <v-app>
        <v-card>
            <v-card-title>
                Time Log:
                <v-spacer></v-spacer>
                <v-text-field
                        append-icon="search"
                        label="Search"
                        single-line
                        hide-details
                        v-model="search"
                ></v-text-field>
            </v-card-title>
            <v-data-table
                    :headers="headers"
                    :items="times"
                    :search="search"
            >
                <template slot="items" slot-scope="props">
                    <td>{{ props.item.id }}</td>
                    <td class="text-xs-right">{{ props.item.hoursWorked }}</td>
                    <v-edit-dialog
                            :return-value.sync="props.item.hoursBilled"
                            lazy
                    > {{ props.item.hoursBilled }}
                        <v-text-field
                                slot="input"
                                label="Edit"
                                v-model="props.item.hoursBilled"
                                single-line
                                :rules="[rules.required,rules.number]"
                                @change="updateTable([props.item.id,props.item.hoursBilled])"
                        ></v-text-field>
                    </v-edit-dialog>
                    <td class="text-xs-right">{{ props.item.name }}</td>
                </template>
                <v-alert slot="no-results" :value="true" color="error" icon="warning">
                    Your search for "{{ search }}" found no results.
                </v-alert>
            </v-data-table>
            <v-form @submit="updateCap([projectid,max])">
                <v-text-field style="width: 50%"
                        v-model="max"
                        :rules="[rules.required,rules.number]"
                        :counter="10"
                        label="Project Cap"
                ></v-text-field>
                <v-btn @click="updateCap([projectid,max])">
                    submit
                </v-btn>
            </v-form>
        </v-card>
    </v-app>
</template>

<script>
    import {api} from "../../config"
    import axios from "axios";
    export default {
        props: {
            projectid: {
                type: Number,
                default: 1
            },
            max: {
                type: Number,
                default: 0
            }
        },
        beforeMount () {
            axios.get(api.getTimeLog + '/' + this.projectid).then(response => {this.times = response.data; /*console.log(response.data)*/});
        },
        data () {
            return {
                search: '',
                headers: [
                    {
                        text: 'Id',
                        align: 'left',
                        value: 'id'
                    },
                    { text: 'Hours Worked', value: 'hoursWorked' },
                    { text: 'Hours Billed', value: 'hoursBilled' },
                    { text: 'Dev Name', value: 'name' },
                ],
                times: [],
                rules: {
                    required: (value) => !!value || 'Required.',
                    number: (value) =>  !isNaN(value)|| 'Needs to be a number',
                }
            }
        },
        methods: {
            updateTable: function (event) {
                console.log(event);
                axios.put(api.updateTimeLog+ '/'+ event[0] , {
                    hoursBilled: event[1],
                }).then(response => {
                        console.log(response);
                });
                this.$router.go(this.$router.currentRoute);
            },
            updateCap: function (event) {
                console.log(event);
                axios.put(api.updateProjectCap+ '/'+ event[0] , {
                    cap: event[1],
                }).then(response => {
                    console.log(response);
                });
                this.$router.go(this.$router.currentRoute);
            }
        }
    }
</script>