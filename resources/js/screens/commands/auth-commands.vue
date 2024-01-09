<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingClearResets;
        }
    },

    data() {
        return {
            loadingClearResets: false,
        };
    },

    methods: {
        authClearResets() {
            this.loadingClearResets = true;
            axios.post(Telescope.basePath + '/generate-rules-api/auth-clear-resets')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingClearResets = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Auth Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Auth Clear Resets"
                title="Auth Clear Resets"
                color="light"
                :loading="loadingClearResets"
                :isAnyLoading="isAnyLoading"
                @click="authClearResets"
            ></secondary-button>
        </div>
    </div>
</template>
