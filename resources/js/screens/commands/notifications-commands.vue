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
        notificationsTable() {
            this.loadingTable = true;
            axios.post(Telescope.basePath + '/generate-rules-api/notifications-table')
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
        <h6 class="px-3 pt-3 mb-0 text-sm">Notifications Table</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Notifications Table"
                title="Notifications Table"
                color="light"
                :loading="loadingTable"
                :isAnyLoading="isAnyLoading"
                @click="notificationsTable"
            ></secondary-button>
        </div>
    </div>
</template>
