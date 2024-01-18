<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingGenerate;
        }
    },

    data() {
        return {
            loadingGenerate: false,
        };
    },

    methods: {
        keyGenerate() {
            this.loadingGenerate = true;
            axios.post(Telescope.basePath + '/generate-rules-api/key-generate')
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
                    this.loadingGenerate = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Key Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Key Generate"
                title="Key Generate"
                color="light"
                :loading="loadingGenerate"
                :isAnyLoading="isAnyLoading"
                @click="keyGenerate"
            ></secondary-button>
        </div>
    </div>
</template>
