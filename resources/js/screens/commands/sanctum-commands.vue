<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingPruneExpired;
        }
    },

    data() {
        return {
            loadingPruneExpired: false,
        };
    },

    methods: {
        authClearResets() {
            this.loadingPruneExpired = true;
            axios.post(Telescope.basePath + '/generate-rules-api/sanctum-prune-expired')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    console.log(error);
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingPruneExpired = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Sanctum Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Sanctum Prune Expired"
                title="Sanctum Prune Expired"
                color="light"
                :loading="loadingPruneExpired"
                :isAnyLoading="isAnyLoading"
                @click="authClearResets"
            ></secondary-button>
        </div>
    </div>
</template>
