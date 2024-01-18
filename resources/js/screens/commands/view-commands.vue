<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingCache || this.loadingClear;
        }
    },

    data() {
        return {
            loadingCache: false,
            loadingClear: false,
        };
    },

    methods: {
        viewCache() {
            this.loadingCache = true;
            axios.post(Telescope.basePath + '/generate-rules-api/view-cache')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingCache = false;
                });
        },

        viewClear() {
            this.loadingClear = true;
            axios.post(Telescope.basePath + '/generate-rules-api/view-clear')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingClear = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">View Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="View Cache"
                title="View Cache"
                color="light"
                :loading="loadingCache"
                :isAnyLoading="isAnyLoading"
                @click="viewCache"
            ></secondary-button>
            <secondary-button
                buttonText="View Clear"
                title="View Clear"
                color="light"
                :loading="loadingClear"
                :isAnyLoading="isAnyLoading"
                @click="viewClear"
            ></secondary-button>
        </div>
    </div>
</template>
