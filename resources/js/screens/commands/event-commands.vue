<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";

export default {
    components: {ButtonClose},
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
            this.loadingList = true;
            axios.post(Telescope.basePath + '/generate-rules-api/event-list')
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
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Event Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Event Cache"
                    @click.prevent="eventCache">
                    <span v-if="loadingCache" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Event Cache</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Event Clear"
                    @click.prevent="eventClear">
                    <span v-if="loadingClear" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Event Clear</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Event Generate"
                    @click.prevent="eventGenerate">
                    <span v-if="loadingGenerate" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Event Generate</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Event List"
                    @click.prevent="eventList">
                    <span v-if="loadingList" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Event List</span>
            </button>
        </div>
    </div>
</template>
