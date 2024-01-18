<script>
import axios from "axios";
import SecondaryButton from "../../components/SecondaryButton";

export default {
    components: {SecondaryButton},

    computed: {
        isAnyLoading() {
            return this.loadingClear || this.loadingForget || this.loadingPruneStaleTags || this.loadingTable;
        }
    },

    data() {
        return {
            loadingClear: false,
            loadingForget: false,
            loadingPruneStaleTags: false,
            loadingTable: false,
            dismissMessageTimer: null
        };
    },

    methods: {
        cacheClear() {
            this.loadingClear = true;
            axios.post(Telescope.basePath + '/generate-rules-api/cache-clear')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error clearing cache: ' + error.message);
                })
                .finally(() => {
                    this.loadingClear = false;
                });
        },

        cacheForget() {
            this.$router.push({ name: 'cache-forget' });
        },

        cachePruneStaleTags() {
            this.loadingPruneStaleTags = true;
            axios.post(Telescope.basePath + '/generate-rules-api/cache-prune-stale-tags')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingPruneStaleTags = false;
                });
        },

        cacheTable() {
            this.loadingTable = true;
            axios.post(Telescope.basePath + '/generate-rules-api/cache-table')
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
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Cache Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">

            <!-- Clear Cache Button -->
            <secondary-button
                buttonText="Clear Cache"
                title="Clear Cache"
                color="light"
                :loading="loadingClear"
                :isAnyLoading="isAnyLoading"
                @click="cacheClear"
            ></secondary-button>

            <!-- Cache Forget Button -->
            <secondary-button
                buttonText="Cache Forget"
                title="Cache Forget"
                color="light"
                :loading="loadingForget"
                :isAnyLoading="isAnyLoading"
                @click="cacheForget"
            ></secondary-button>

            <!-- Clear Config Button -->
            <secondary-button
                buttonText="Cache Prune Stale Tags"
                title="Clear Config"
                color="light"
                :loading="loadingPruneStaleTags"
                :isAnyLoading="isAnyLoading"
                @click="cachePruneStaleTags"
            ></secondary-button>

            <!-- Cache Table Button -->
            <secondary-button
                buttonText="Cache Table"
                title="Clear Config"
                color="light"
                :loading="loadingTable"
                :isAnyLoading="isAnyLoading"
                @click="cacheTable"
            ></secondary-button>

        </div>
    </div>
</template>

