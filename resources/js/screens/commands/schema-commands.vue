<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingDump;
        }
    },

    data() {
        return {
            loadingDump: false,
        };
    },

    methods: {
        schemaDump() {
            this.loadingDump = true;
            axios.post(Telescope.basePath + '/generate-rules-api/schema-dump')
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
                    this.loadingDump = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Schema Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Schema Dump"
                title="Schema Dump"
                color="light"
                :loading="loadingDump"
                :isAnyLoading="isAnyLoading"
                @click="schemaDump"
            ></secondary-button>
        </div>
    </div>
</template>
