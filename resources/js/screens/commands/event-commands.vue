<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";
import SecondaryButton from "../../components/SecondaryButton";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingCache || this.loadingClear || this.loadingGenerate || this.loadingList;
        }
    },

    data() {
        return {
            loadingCache: false,
            loadingClear: false,
            loadingGenerate: false,
            loadingList: false,
        };
    },

    methods: {
        eventCache() {
            this.loadingCache = true;
            axios.post(Telescope.basePath + '/generate-rules-api/event-cache')
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
                    this.loadingCache = false;
                });
        },

        eventClear() {
            this.loadingClear = true;
            axios.post(Telescope.basePath + '/generate-rules-api/event-clear')
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
                    this.loadingClear = false;
                });
        },

        eventGenerate() {
            this.loadingGenerate = true;
            axios.post(Telescope.basePath + '/generate-rules-api/event-generate')
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
                    this.loadingGenerate = false;
                });
        },

        eventList() {
            const route = 'event-list';
            const title = 'Event List';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Event Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Event Cache"
                title="Event Cache"
                color="light"
                :loading="loadingCache"
                :isAnyLoading="isAnyLoading"
                @click="eventCache"
            ></secondary-button>
            <secondary-button
                buttonText="Event Clear"
                title="Event Clear"
                color="light"
                :loading="loadingClear"
                :isAnyLoading="isAnyLoading"
                @click="eventClear"
            ></secondary-button>
            <secondary-button
                buttonText="Event Generate"
                title="Event Generate"
                color="light"
                :loading="loadingGenerate"
                :isAnyLoading="isAnyLoading"
                @click="eventGenerate"
            ></secondary-button>
            <secondary-button
                buttonText="Event List"
                title="Event List"
                color="light"
                :loading="loadingList"
                :isAnyLoading="isAnyLoading"
                @click="eventList"
            ></secondary-button>
        </div>
    </div>
</template>

