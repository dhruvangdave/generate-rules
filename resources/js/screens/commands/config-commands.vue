<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";
import _ from "lodash";
import SecondaryButton from "../../components/SecondaryButton";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingClear || this.loadingCache || this.loadingShow || this.loadingTable;
        }
    },

    data() {
        return {
            loadingClear: false,
            loadingForget: false,
            loadingCache: false,
            loadingShow: false,
            dismissMessageTimer: null
        };
    },

    methods: {
        configClear() {
            this.loadingClear = true;
            axios.post(Telescope.basePath + '/generate-rules-api/config-clear')
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

        configCache() {
            this.loadingCache = true;
            axios.post(Telescope.basePath + '/generate-rules-api/config-cache')
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

        configShow() {
            this.$router.push({ name: 'config-show' });
        }
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Config Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Config Clear"
                title="Config Clear"
                color="light"
                :loading="loadingClear"
                :isAnyLoading="isAnyLoading"
                @click="configClear"
            ></secondary-button>
            <secondary-button
                buttonText="Config Cache"
                title="Config Cache"
                color="light"
                :loading="loadingCache"
                :isAnyLoading="isAnyLoading"
                @click="configCache"
            ></secondary-button>
            <secondary-button
                buttonText="Config Show"
                title="Config Show"
                color="light"
                :loading="loadingShow"
                :isAnyLoading="isAnyLoading"
                @click="configShow"
            ></secondary-button>
        </div>
    </div>
</template>
