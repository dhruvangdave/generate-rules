<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingFresh || this.loadingInstall || this.loadingRefresh || this.loadingReset || this.loadingRollback || this.loadingStatus;
        }
    },

    data() {
        return {
            loadingFresh: false,
            loadingInstall: false,
            loadingRefresh: false,
            loadingReset: false,
            loadingRollback: false,
            loadingStatus: false,
        };
    },

    methods: {
        migrateFresh() {
            const route = 'migrate-fresh';
            const title = 'Migrate Fresh';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        migrateInstall() {
            this.loadingInstall = true;
            axios.post(Telescope.basePath + '/generate-rules-api/migrate-install')
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
                    this.loadingInstall = false;
                });
        },

        migrateRefresh() {
            const route = 'migrate-refresh';
            const title = 'Migrate Refresh';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
            this.$router.push({ name: 'migrate-refresh' });
        },

        migrateReset() {
            this.loadingReset = true;
            axios.post(Telescope.basePath + '/generate-rules-api/migrate-reset')
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
                    this.loadingReset = false;
                });
        },

        migrateRollback() {
            const route = 'migrate-rollback';
            const title = 'Migrate Rollback';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        migrateStatus() {
            const route = 'migrate-status';
            const title = 'Migrate Status';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Migrate Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Migrate Fresh"
                title="Migrate Fresh"
                color="light"
                :disabled="isAnyLoading"
                :loading="loadingFresh"
                @click.prevent="migrateFresh"
            ></secondary-button>

            <secondary-button
                buttonText="Migrate Install"
                title="Migrate Install"
                color="light"
                :disabled="isAnyLoading"
                :loading="loadingInstall"
                @click.prevent="migrateInstall"
            ></secondary-button>

            <secondary-button
                buttonText="Migrate Refresh"
                title="Migrate Refresh"
                color="light"
                :disabled="isAnyLoading"
                :loading="loadingRefresh"
                @click.prevent="migrateRefresh"
            ></secondary-button>

            <secondary-button
                buttonText="Migrate Reset"
                title="Migrate Reset"
                color="light"
                :disabled="isAnyLoading"
                :loading="loadingReset"
                @click.prevent="migrateReset"
            ></secondary-button>

            <secondary-button
                buttonText="Migrate Rollback"
                title="Migrate Rollback"
                color="light"
                :disabled="isAnyLoading"
                :loading="loadingRollback"
                @click.prevent="migrateRollback"
            ></secondary-button>

            <secondary-button
                buttonText="Migrate Status"
                title="Migrate Status"
                color="light"
                :disabled="isAnyLoading"
                :loading="loadingStatus"
                @click.prevent="migrateStatus"
            ></secondary-button>
        </div>
    </div>
</template>
