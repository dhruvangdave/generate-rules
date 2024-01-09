<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";

export default {
    components: {ButtonClose},
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
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Batches Table"
                    @click.prevent="queueBatchesTable">
                    <span v-if="loadingBatchesTable" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Batches Table</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Clear"
                    @click.prevent="queueClear">
                    <span v-if="loadingClear" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Clear</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Failed"
                    @click.prevent="queueFailed">
                    <span v-if="loadingFailed" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Failed</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Failed Table"
                    @click.prevent="queueFailedTable">
                    <span v-if="loadingFailedTable" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Failed Table</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Flush"
                    @click.prevent="queueFlush">
                    <span v-if="loadingFlush" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Flush</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Forget"
                    @click.prevent="queueForget">
                    <span v-if="loadingForget" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Forget</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="true" title="Queue Listen"
                    @click.prevent="queueListen">
                    <span v-if="loadingListen" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Listen</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Monitor"
                    @click.prevent="queueMonitor">
                    <span v-if="loadingMonitor" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Monitor</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Prune Batches"
                    @click.prevent="queuePruneBatches">
                    <span v-if="loadingPruneBatches" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Prune Batches</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Prune Failes"
                    @click.prevent="queuePruneFailed">
                    <span v-if="loadingPruneFailed" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Prune Failed</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Restart"
                    @click.prevent="queueRestart">
                    <span v-if="loadingRestart" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Restart</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Retry"
                    @click.prevent="queueRetry">
                    <span v-if="loadingRetry" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Retry</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Retry Batch"
                    @click.prevent="queueRetryBatch">
                    <span v-if="loadingRetryBatch" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Retry Batch</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Table"
                    @click.prevent="queueTable">
                    <span v-if="loadingTable" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Table</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="true" title="Queue Work"
                    @click.prevent="queueWork">
                    <span v-if="loadingWork" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Queue Work</span>
            </button>
        </div>
    </div>
</template>
