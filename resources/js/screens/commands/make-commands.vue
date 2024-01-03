<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";

export default {
    components: {ButtonClose},
    computed: {
        isAnyLoading() {
            return this.loadingCast || this.loadingChannel || this.loadingCommand || this.loadingComponent || this.loadingController || this.loadingEvent || this.loadingException || this.loadingFactory || this.loadingJob || this.loadingListener || this.loadingMail || this.loadingMiddleware || this.loadingMigration || this.loadingModel || this.loadingNotification || this.loadingObserver || this.loadingPolicy || this.loadingProvider || this.loadingRequest || this.loadingResource || this.loadingRule || this.loadingScope || this.loadingSeeder || this.loadingTest || this.loadingView;
        }
    },

    data() {
        return {
            loadingCast: false,
            loadingChannel: false,
            loadingCommand: false,
            loadingComponent: false,
            loadingController: false,
            loadingEvent: false,
            loadingException: false,
            loadingFactory: false,
            loadingJob: false,
            loadingListener: false,
            loadingMail: false,
            loadingMiddleware: false,
            loadingMigration: false,
            loadingModel: false,
            loadingNotification: false,
            loadingObserver: false,
            loadingPolicy: false,
            loadingProvider: false,
            loadingRequest: false,
            loadingResource: false,
            loadingRule: false,
            loadingScope: false,
            loadingSeeder: false,
            loadingTest: false,
            loadingView: false,
        };
    },

    methods: {
        makeCast() {
            this.loadingCast = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-cast', {'name': 'name'})
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
                    this.loadingCast = false;
                });
        },

        makeChannel() {
            this.loadingChannel = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-channel')
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
                    this.loadingChannel = false;
                });
        },

        makeCommand() {
            this.loadingCommand = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-command')
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
                    this.loadingCommand = false;
                });
        },

        makeComponent() {
            this.loadingComponent = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-component')
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
                    this.loadingComponent = false;
                });
        },

        makeController() {
            this.loadingController = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-controller')
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
                    this.loadingController = false;
                });
        },

        // Id needs to be taken from the user
        makeEvent() {
            this.loadingEvent = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-event', {'id': '12345'})
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
                    this.loadingEvent = false;
                });
        },

        makeException() {
            this.loadingException = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-exception')
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
                    this.loadingException = false;
                });
        },

        // Queues need to be taken from the user
        makeFactory() {
            this.loadingFactory = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-factory', { 'queues': '12345'})
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
                    this.loadingFactory = false;
                });
        },

        makeJob() {
            this.loadingJob = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-job')
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
                    this.loadingJob = false;
                });
        },

        makeListener() {
            this.loadingListener = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-listener')
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
                    this.loadingListener = false;
                });
        },

        makeMail() {
            this.loadingMail = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-mail')
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
                    this.loadingMail = false;
                });
        },

        makeMiddleware() {
            this.loadingMiddleware = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-middleware')
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
                    this.loadingMiddleware = false;
                });
        },

        makeMigration() {
            this.loadingMigration = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-migration')
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
                    this.loadingMigration = false;
                });
        },

        makeModel() {
            this.loadingModel = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-model')
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
                    this.loadingModel = false;
                });
        },

        makeNotification() {
            this.loadingNotification = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-notification')
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
                    this.loadingNotification = false;
                });
        },

        makeObserver() {
            this.loadingObserver = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-observer')
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
                    this.loadingObserver = false;
                });
        },

        makePolicy() {
            this.loadingPolicy = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-policy')
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
                    this.loadingPolicy = false;
                });
        },

        makeProvider() {
            this.loadingProvider = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-provider')
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
                    this.loadingProvider = false;
                });
        },

        makeRequest() {
            this.loadingRequest = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-request')
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
                    this.loadingRequest = false;
                });
        },

        makeResource() {
            this.loadingResource = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-resource')
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
                    this.loadingResource = false;
                });
        },

        makeRule() {
            this.loadingRule = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-rule')
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
                    this.loadingRule = false;
                });
        },

        makeScope() {
            this.loadingScope = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-scope')
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
                    this.loadingScope = false;
                });
        },

        makeSeeder() {
            this.loadingSeeder = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-seeder')
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
                    this.loadingSeeder = false;
                });
        },

        makeTest() {
            this.loadingTest = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-test')
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
                    this.loadingTest = false;
                });
        },

        makeView() {
            this.loadingView = true;
            axios.post(Telescope.basePath + '/generate-rules-api/make-view')
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
                    this.loadingView = false;
                });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Make Commands</h6>
        <div class="p-3 d-flex flex-wrap" style="gap: 1rem;">
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Cast"
                    @click.prevent="makeCast">
                    <span v-if="loadingCast" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Cast</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Channel"
                    @click.prevent="makeChannel">
                    <span v-if="loadingChannel" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Channel</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Command"
                    @click.prevent="makeCommand">
                    <span v-if="loadingCommand" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Command</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Component"
                    @click.prevent="makeComponent">
                    <span v-if="loadingComponent" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Component</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Controller"
                    @click.prevent="makeController">
                    <span v-if="loadingController" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Controller</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Event"
                    @click.prevent="makeEvent">
                    <span v-if="loadingEvent" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Event</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Exception"
                    @click.prevent="makeException">
                    <span v-if="loadingException" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Exception</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Factory"
                    @click.prevent="makeFactory">
                    <span v-if="loadingFactory" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Factory</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Job"
                    @click.prevent="makeJob">
                    <span v-if="loadingJob" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Job</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Listener"
                    @click.prevent="makeListener">
                    <span v-if="loadingListener" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Listener</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Mail"
                    @click.prevent="makeMail">
                    <span v-if="loadingMail" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Mail</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Middleware"
                    @click.prevent="makeMiddleware">
                    <span v-if="loadingMiddleware" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Middleware</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Migration"
                    @click.prevent="makeMigration">
                    <span v-if="loadingMigration" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Migration</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Model"
                    @click.prevent="makeModel">
                    <span v-if="loadingModel" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Model</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Notification"
                    @click.prevent="makeNotification">
                    <span v-if="loadingNotification" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Notification</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Observer"
                    @click.prevent="makeObserver">
                    <span v-if="loadingObserver" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Observer</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Policy"
                    @click.prevent="makePolicy">
                    <span v-if="loadingPolicy" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Policy</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Request"
                    @click.prevent="makeRequest">
                    <span v-if="loadingRequest" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Request</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Resource"
                    @click.prevent="makeResource">
                    <span v-if="loadingResource" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Resource</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Rule"
                    @click.prevent="makeRule">
                    <span v-if="loadingRule" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Rule</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Scope"
                    @click.prevent="makeScope">
                    <span v-if="loadingScope" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Scope</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Seeder"
                    @click.prevent="makeSeeder">
                    <span v-if="loadingSeeder" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Seeder</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make Test"
                    @click.prevent="makeTest">
                    <span v-if="loadingTest" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make Test</span>
            </button>
            <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Make View"
                    @click.prevent="makeView">
                    <span v-if="loadingView" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                <span v-else>Make View</span>
            </button>
        </div>
    </div>
</template>
