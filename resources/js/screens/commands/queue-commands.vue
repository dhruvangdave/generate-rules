<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingBatchesTable || this.loadingClear || this.loadingFailed || this.loadingFailedTable || this.loadingFlush || this.loadingForget || this.loadingListen || this.loadingMonitor || this.loadingPruneBatches || this.loadingPruneFailed || this.loadingRestart || this.loadingRetry || this.loadingRetryBatch || this.loadingTable || this.loadingWork;
        }
    },

    data() {
        return {
            loadingBatchesTable: false,
            loadingClear: false,
            loadingFailed: false,
            loadingFailedTable: false,
            loadingFlush: false,
            loadingForget: false,
            loadingListen: false,
            loadingMonitor: false,
            loadingPruneBatches: false,
            loadingPruneFailed: false,
            loadingRestart: false,
            loadingRetry: false,
            loadingRetryBatch: false,
            loadingTable: false,
            loadingWork: false,
        };
    },

    methods: {
        queueBatchesTable() {
            this.loadingBatchesTable = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-batches-table')
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
                    this.loadingBatchesTable = false;
                });
        },

        queueClear() {
            this.loadingClear = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-clear')
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
                    this.loadingClear = false;
                });
        },

        queueFailed() {
            this.loadingFailed = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-failed')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingFailed = false;
                });
        },

        queueFailedTable() {
            this.loadingFailedTable = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-failed-table')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingFailedTable = false;
                });
        },

        queueFlush() {
            this.loadingFlush = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-flush')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingFlush = false;
                });
        },

        // Id needs to be taken from the user
        queueForget() {
            this.loadingForget = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-forget', {'id': '12345'})
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingForget = false;
                });
        },

        queueListen() {
            this.loadingListen = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-listen')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingListen = false;
                });
        },

        // Queues need to be taken from the user
        queueMonitor() {
            this.loadingMonitor = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-monitor', { 'queues': '12345'})
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingMonitor = false;
                });
        },

        queuePruneBatches() {
            this.loadingPruneBatches = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-prune-batches')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingPruneBatches = false;
                });
        },

        queuePruneFailed() {
            this.loadingPruneFailed = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-prune-failed')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingPruneFailed = false;
                });
        },

        queueRestart() {
            this.loadingRestart = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-restart')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingRestart = false;
                });
        },

        queueRetry() {
            this.loadingRetry = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-retry')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingRetry = false;
                });
        },

        queueRetryBatch() {
            this.loadingRetryBatch = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-retry-batch')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingRetryBatch = false;
                });
        },

        queueTable() {
            this.loadingTable = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-table')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingTable = false;
                });
        },

        queueWork() {
            this.loadingWork = true;
            axios.post(Telescope.basePath + '/generate-rules-api/queue-work')
                .then((res) => {
                    console.log('res', res?.data);
                    this.message = res.data.result;
                    this.errorMessage = null;

                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response?.data?.error || error.message));
                })
                .finally(() => {
                    this.loadingWork = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Queue Commands</h6>
        <div class="p-3 d-flex flex-wrap" style="gap: 1rem;">
            <!-- Converted all buttons to secondary-button components -->
            <secondary-button
                buttonText="Queue Batches Table"
                title="Queue Batches Table"
                color="light"
                :loading="loadingBatchesTable"
                :isAnyLoading="isAnyLoading"
                @click="queueBatchesTable"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Clear"
                title="Queue Clear"
                color="light"
                :loading="loadingClear"
                :isAnyLoading="isAnyLoading"
                @click="queueClear"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Failed"
                title="Queue Failed"
                color="light"
                :loading="loadingFailed"
                :isAnyLoading="isAnyLoading"
                @click="queueFailed"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Failed Table"
                title="Queue Failed Table"
                color="light"
                :loading="loadingFailedTable"
                :isAnyLoading="isAnyLoading"
                @click="queueFailedTable"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Flush"
                title="Queue Flush"
                color="light"
                :loading="loadingFlush"
                :isAnyLoading="isAnyLoading"
                @click="queueFlush"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Forget"
                title="Queue Forget"
                color="light"
                :loading="loadingForget"
                :isAnyLoading="isAnyLoading"
                @click="queueForget"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Listen"
                title="Queue Listen"
                color="light"
                :loading="loadingListen"
                :isAnyLoading="true"
                @click="queueListen"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Monitor"
                title="Queue Monitor"
                color="light"
                :loading="loadingMonitor"
                :isAnyLoading="isAnyLoading"
                @click="queueMonitor"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Prune Batches"
                title="Queue Prune Batches"
                color="light"
                :loading="loadingPruneBatches"
                :isAnyLoading="isAnyLoading"
                @click="queuePruneBatches"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Prune Failed"
                title="Queue Prune Failed"
                color="light"
                :loading="loadingPruneFailed"
                :isAnyLoading="isAnyLoading"
                @click="queuePruneFailed"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Restart"
                title="Queue Restart"
                color="light"
                :loading="loadingRestart"
                :isAnyLoading="isAnyLoading"
                @click="queueRestart"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Retry"
                title="Queue Retry"
                color="light"
                :loading="loadingRetry"
                :isAnyLoading="isAnyLoading"
                @click="queueRetry"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Table"
                title="Queue Table"
                color="light"
                :loading="loadingTable"
                :isAnyLoading="isAnyLoading"
                @click="queueTable"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Work"
                title="Queue Work"
                color="light"
                :loading="loadingWork"
                :isAnyLoading="isAnyLoading"
                @click="queueWork"
            ></secondary-button>

            <secondary-button
                buttonText="Queue Pause"
                title="Queue Pause"
                color="light"
                :loading="loadingRetryBatch"
                :isAnyLoading="isAnyLoading"
                @click="queueRetryBatch"
            ></secondary-button>
        </div>
    </div>
</template>

