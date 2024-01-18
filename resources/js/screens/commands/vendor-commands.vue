<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingPublish;
        }
    },

    data() {
        return {
            loadingPublish: false,
        };
    },

    methods: {
        vendorPublish() {
            this.loadingPublish = true;
            axios.post(Telescope.basePath + '/generate-rules-api/vendor-publish')
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
                    this.loadingPublish = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Vendor Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Vendor Publish"
                title="Vendor Publish"
                color="light"
                :loading="loadingPublish"
                :isAnyLoading="isAnyLoading"
                @click="vendorPublish"
            ></secondary-button>
        </div>
    </div>
</template>
