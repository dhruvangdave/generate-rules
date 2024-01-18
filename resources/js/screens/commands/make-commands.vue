<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
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
            <secondary-button
                buttonText="Make Cast"
                title="Make Cast"
                color="light"
                :loading="loadingCast"
                :isAnyLoading="isAnyLoading"
                @click="makeCast"
            ></secondary-button>

            <secondary-button
                buttonText="Make Channel"
                title="Make Channel"
                color="light"
                :loading="loadingChannel"
                :isAnyLoading="isAnyLoading"
                @click="makeChannel"
            ></secondary-button>

            <secondary-button
                buttonText="Make Command"
                title="Make Command"
                color="light"
                :loading="loadingCommand"
                :isAnyLoading="isAnyLoading"
                @click="makeCommand"
            ></secondary-button>

            <secondary-button
                buttonText="Make Component"
                title="Make Component"
                color="light"
                :loading="loadingComponent"
                :isAnyLoading="isAnyLoading"
                @click="makeComponent"
            ></secondary-button>

            <secondary-button
                buttonText="Make Controller"
                title="Make Controller"
                color="light"
                :loading="loadingController"
                :isAnyLoading="isAnyLoading"
                @click="makeController"
            ></secondary-button>

            <secondary-button
                buttonText="Make Event"
                title="Make Event"
                color="light"
                :loading="loadingEvent"
                :isAnyLoading="isAnyLoading"
                @click="makeEvent"
            ></secondary-button>

            <secondary-button
                buttonText="Make Exception"
                title="Make Exception"
                color="light"
                :loading="loadingException"
                :isAnyLoading="isAnyLoading"
                @click="makeException"
            ></secondary-button>

            <secondary-button
                buttonText="Make Factory"
                title="Make Factory"
                color="light"
                :loading="loadingFactory"
                :isAnyLoading="isAnyLoading"
                @click="makeFactory"
            ></secondary-button>

            <secondary-button
                buttonText="Make Job"
                title="Make Job"
                color="light"
                :loading="loadingJob"
                :isAnyLoading="isAnyLoading"
                @click="makeJob"
            ></secondary-button>

            <secondary-button
                buttonText="Make Listener"
                title="Make Listener"
                color="light"
                :loading="loadingListener"
                :isAnyLoading="isAnyLoading"
                @click="makeListener"
            ></secondary-button>

            <secondary-button
                buttonText="Make Mail"
                title="Make Mail"
                color="light"
                :loading="loadingMail"
                :isAnyLoading="isAnyLoading"
                @click="makeMail"
            ></secondary-button>

            <secondary-button
                buttonText="Make Middleware"
                title="Make Middleware"
                color="light"
                :loading="loadingMiddleware"
                :isAnyLoading="isAnyLoading"
                @click="makeMiddleware"
            ></secondary-button>

            <secondary-button
                buttonText="Make Migration"
                title="Make Migration"
                color="light"
                :loading="loadingMigration"
                :isAnyLoading="isAnyLoading"
                @click="makeMigration"
            ></secondary-button>

            <secondary-button
                buttonText="Make Model"
                title="Make Model"
                color="light"
                :loading="loadingModel"
                :isAnyLoading="isAnyLoading"
                @click="makeModel"
            ></secondary-button>

            <secondary-button
                buttonText="Make Notification"
                title="Make Notification"
                color="light"
                :loading="loadingNotification"
                :isAnyLoading="isAnyLoading"
                @click="makeNotification"
            ></secondary-button>

            <secondary-button
                buttonText="Make Observer"
                title="Make Observer"
                color="light"
                :loading="loadingObserver"
                :isAnyLoading="isAnyLoading"
                @click="makeObserver"
            ></secondary-button>

            <secondary-button
                buttonText="Make Policy"
                title="Make Policy"
                color="light"
                :loading="loadingPolicy"
                :isAnyLoading="isAnyLoading"
                @click="makePolicy"
            ></secondary-button>

            <secondary-button
                buttonText="Make Provider"
                title="Make Provider"
                color="light"
                :loading="loadingProvider"
                :isAnyLoading="isAnyLoading"
                @click="makeProvider"
            ></secondary-button>

            <secondary-button
                buttonText="Make Request"
                title="Make Request"
                color="light"
                :loading="loadingRequest"
                :isAnyLoading="isAnyLoading"
                @click="makeRequest"
            ></secondary-button>

            <secondary-button
                buttonText="Make Resource"
                title="Make Resource"
                color="light"
                :loading="loadingResource"
                :isAnyLoading="isAnyLoading"
                @click="makeResource"
            ></secondary-button>

            <secondary-button
                buttonText="Make Rule"
                title="Make Rule"
                color="light"
                :loading="loadingRule"
                :isAnyLoading="isAnyLoading"
                @click="makeRule"
            ></secondary-button>

            <secondary-button
                buttonText="Make Seeder"
                title="Make Seeder"
                color="light"
                :loading="loadingSeeder"
                :isAnyLoading="isAnyLoading"
                @click="makeSeeder"
            ></secondary-button>

            <secondary-button
                buttonText="Make Test"
                title="Make Test"
                color="light"
                :loading="loadingTest"
                :isAnyLoading="isAnyLoading"
                @click="makeTest"
            ></secondary-button>

            <secondary-button
                buttonText="Make View"
                title="Make View"
                color="light"
                :loading="loadingView"
                :isAnyLoading="isAnyLoading"
                @click="makeView"
            ></secondary-button>

            <secondary-button
                buttonText="Make Scope"
                title="Make Scope"
                color="light"
                :loading="loadingScope"
                :isAnyLoading="isAnyLoading"
                @click="makeScope"
            ></secondary-button>
        </div>
    </div>
</template>

