<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";

export default {
    components: {ButtonClose},
    computed: {
        isAnyLoading() {
            return this.loadingCache || this.loadingClear || this.loadingList;
        }
    },

    data() {
        return {
            loadingCache: false,
            loadingClear: false,
            loadingList: false,
        };
    },

    methods: {
        routeCache() {
            this.loadingCache = true;
            axios.post(Telescope.basePath + '/generate-rules-api/route-cache')
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
                    this.loadingCache = false;
                });
        },

        // @todo key need to be rendered dynamically
        routeClear() {
            this.loadingClear = true;
            axios.post(Telescope.basePath + '/generate-rules-api/route-clear')
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

        routeList() {
            this.loadingList = true;
            axios.post(Telescope.basePath + '/generate-rules-api/route-list')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingList = false;
                });
        }
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Route Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Route Cache"
                    @click.prevent="routeCache">
                    <span v-if="loadingCache" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Route Cache</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Route Clear"
                    @click.prevent="routeClear">
                    <span v-if="loadingClear" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Route Clear</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Route List"
                    @click.prevent="routeList">
                    <span v-if="loadingList" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Route List</span>
            </button>
        </div>
    </div>
</template>
