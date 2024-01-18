<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingLink;
        }
    },

    data() {
        return {
            loadingLink: false,
        };
    },

    methods: {
        storageLink() {
            this.loadingLink = true;
            axios.post(Telescope.basePath + '/generate-rules-api/storage-link')
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
                    this.loadingLink = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Storage Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Storage Link"
                title="Storage Link"
                color="light"
                :loading="loadingLink"
                :isAnyLoading="isAnyLoading"
                @click="storageLink"
            ></secondary-button>
        </div>
    </div>
</template>
