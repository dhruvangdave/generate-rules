<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingTable;
        }
    },

    data() {
        return {
            loadingTable: false,
        };
    },

    methods: {
        sessionTable() {
            this.loadingTable = true;
            axios.post(Telescope.basePath + '/generate-rules-api/session-table')
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
                    this.loadingTable = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Session Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Session Table"
                title="Session Table"
                color="light"
                :loading="loadingTable"
                :isAnyLoading="isAnyLoading"
                @click="sessionTable"
            ></secondary-button>
        </div>
    </div>
</template>
