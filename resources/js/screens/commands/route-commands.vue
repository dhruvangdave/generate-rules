<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
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
            const route = 'route-list';
            const title = 'Route List';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        }
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Route Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Route Cache"
                title="Route Cache"
                color="light"
                :loading="loadingCache"
                :isAnyLoading="isAnyLoading"
                @click="routeCache"
            ></secondary-button>
            <secondary-button
                buttonText="Route Clear"
                title="Route Clear"
                color="light"
                :loading="loadingClear"
                :isAnyLoading="isAnyLoading"
                @click="routeClear"
            ></secondary-button>
            <secondary-button
                buttonText="Route List"
                title="Route List"
                color="light"
                :loading="loadingList"
                :isAnyLoading="isAnyLoading"
                @click="routeList"
            ></secondary-button>
        </div>
    </div>
</template>
