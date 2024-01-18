<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingPrune || this.loadingShow;
        }
    },

    data() {
        return {
            loadingPrune: false,
            loadingShow: false,
        };
    },

    methods: {
        modelPrune() {
            this.loadingPrune = true;
            axios.post(Telescope.basePath + '/generate-rules-api/model-prune')
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
                    this.loadingPrune = false;
                });
        },

        modelShow() {
            this.loadingShow = true;
            axios.post(Telescope.basePath + '/generate-rules-api/model-show', {'model': 'User'})
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
                    this.loadingShow = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Model Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Model Prune"
                title="Model Prune"
                color="light"
                :loading="loadingPrune"
                :isAnyLoading="isAnyLoading"
                @click="modelPrune"
            ></secondary-button>
            <secondary-button
                buttonText="Model Show"
                title="Model Show"
                color="light"
                :loading="loadingShow"
                :isAnyLoading="isAnyLoading"
                @click="modelShow"
            ></secondary-button>
        </div>
    </div>
</template>
