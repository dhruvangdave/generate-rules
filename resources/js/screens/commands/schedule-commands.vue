<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingClearCache || this.loadingInterrupt || this.loadingList || this.loadingRun || this.loadingWork || this.loadingTest;
        }
    },

    data() {
        return {
            loadingClearCache: false,
            loadingInterrupt: false,
            loadingList: false,
            loadingRun: false,
            loadingWork: false,
            loadingTest: false,
            dismissMessageTimer: null
        };
    },

    methods: {
        scheduleClearCache() {
            this.loadingClearCache = true;
            axios.post(Telescope.basePath + '/generate-rules-api/schedule-clear-cache')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error clearing cache: ' + error.message);
                })
                .finally(() => {
                    this.loadingClearCache = false;
                });
        },

        // @todo key need to be rendered dynamically
        scheduleInterrupt() {
            this.loadingInterrupt = true;
            axios.post(Telescope.basePath + '/generate-rules-api/schedule-interrupt')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingInterrupt = false;
                });
        },

        scheduleList() {
            this.loadingList = true;
            axios.post(Telescope.basePath + '/generate-rules-api/schedule-list')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingList = false;
                });
        },

        scheduleRun() {
            this.loadingRun = true;
            axios.post(Telescope.basePath + '/generate-rules-api/schedule-run')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingRun = false;
                });
        },

        scheduleTest() {
            this.loadingTest = true;
            axios.post(Telescope.basePath + '/generate-rules-api/schedule-test')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingTest = false;
                });
        },

        scheduleWork() {
            this.loadingWork = true;
            axios.post(Telescope.basePath + '/generate-rules-api/schedule-work')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingWork = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Schedule Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Schedule Clear Cache"
                title="Schedule Clear Cache"
                color="light"
                :loading="loadingClearCache"
                :isAnyLoading="isAnyLoading"
                @click="scheduleClearCache"
            ></secondary-button>

            <secondary-button
                buttonText="Schedule Interrupt"
                title="Schedule Interrupt"
                color="light"
                :loading="loadingInterrupt"
                :isAnyLoading="isAnyLoading"
                @click="scheduleInterrupt"
            ></secondary-button>

            <secondary-button
                buttonText="Schedule List"
                title="Schedule List"
                color="light"
                :loading="loadingList"
                :isAnyLoading="isAnyLoading"
                @click="scheduleList"
            ></secondary-button>

            <secondary-button
                buttonText="Schedule Run"
                title="Schedule Run"
                color="light"
                :loading="loadingRun"
                :isAnyLoading="isAnyLoading"
                @click="scheduleRun"
            ></secondary-button>

            <secondary-button
                buttonText="Schedule Test"
                title="Schedule Test"
                color="light"
                :loading="loadingTest"
                :isAnyLoading="isAnyLoading"
                @click="scheduleTest"
            ></secondary-button>

            <secondary-button
                buttonText="Schedule Work"
                title="Schedule Work"
                color="light"
                :loading="loadingWork"
                :isAnyLoading="true"
                @click="scheduleWork"
            ></secondary-button>
        </div>
    </div>
</template>

