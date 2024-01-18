<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";
import SecondaryButton from "../../components/SecondaryButton";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingMonitor || this.loadingSeed || this.loadingShow || this.loadingTable || this.loadingWipe;
        }
    },

    data() {
        return {
            loadingMonitor: false,
            loadingSeed: false,
            loadingShow: false,
            loadingTable: false,
            loadingWipe: false,
        };
    },

    methods: {
        dbMonitor() {
            const route = 'db-monitor';
            const title = 'Database Monitor List';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },
        dbSeed() {
            this.loadingSeed = true;
            axios.post(Telescope.basePath + '/generate-rules-api/db-seed' , {'class': 'DatabaseSeeder'})
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingSeed = false;
                });
        },
        dbShow() {
            this.loadingShow = true;
            axios.post(Telescope.basePath + '/generate-rules-api/db-show')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingShow = false;
                });
        },
        dbTable() {
            this.loadingTable = true;
            axios.post(Telescope.basePath + '/generate-rules-api/db-table')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingTable = false;
                });
        },
        dbWipe() {
            this.loadingWipe = true;
            axios.post(Telescope.basePath + '/generate-rules-api/db-wipe')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingWipe = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">DB Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Database Monitor"
                title="Database Monitor"
                color="light"
                :loading="loadingMonitor"
                :isAnyLoading="isAnyLoading"
                @click="dbMonitor"
            ></secondary-button>

            <secondary-button
                buttonText="Database Seed"
                title="Database Seed"
                color="light"
                :loading="loadingSeed"
                :isAnyLoading="isAnyLoading"
                @click="dbSeed"
            ></secondary-button>

            <secondary-button
                buttonText="Database Show"
                title="Database Show"
                color="light"
                :disabled="true"
                :loading="loadingShow"
                @click="dbShow"
            ></secondary-button>

            <secondary-button
                buttonText="Database Table"
                title="Database Table"
                color="light"
                :disabled="true"
                :loading="loadingTable"
                @click="dbTable"
            ></secondary-button>

            <secondary-button
                buttonText="Database Wipe"
                title="Database Wipe"
                color="light"
                :loading="loadingWipe"
                :isAnyLoading="isAnyLoading"
                @click="dbWipe"
            ></secondary-button>
        </div>
    </div>
</template>

