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
            const type = 'cast'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeChannel() {
            const type = 'channel'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeCommand() {
            const type = 'command'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeComponent() {
            const type = 'component'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeController() {
            const type = 'controller'
            this.$router.push({ name: 'make', query: { type }  })
        },

        // Id needs to be taken from the user
        makeEvent() {
            const type = 'event'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeException() {
            const type = 'exception'
            this.$router.push({ name: 'make', query: { type }  })
        },

        // Queues need to be taken from the user
        makeFactory() {
            const type = 'factory'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeJob() {
            const type = 'job'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeListener() {
            const type = 'listener'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeMail() {
            const type = 'mail'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeMiddleware() {
            const type = 'middleware'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeMigration() {
            const type = 'migration'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeModel() {
            const type = 'model'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeNotification() {
            const type = 'notification'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeObserver() {
            const type = 'observer'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makePolicy() {
            const type = 'policy'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeProvider() {
            const type = 'provider'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeRequest() {
            const type = 'request'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeResource() {
            const type = 'resource'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeRule() {
            const type = 'rule'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeScope() {
            const type = 'scope'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeSeeder() {
            const type = 'seeder'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeTest() {
            const type = 'test'
            this.$router.push({ name: 'make', query: { type }  })
        },

        makeView() {
            const type = 'view'
            this.$router.push({ name: 'make', query: { type }  })
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
