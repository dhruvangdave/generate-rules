<script>
import axios from "axios";
import SecondaryButton from "../../components/SecondaryButton";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingAbout || this.loadingClearCompiled || this.loadingCompletion || this.loadingDb || this.loadingDocs || this.loadingUp || this.loadingDown || this.loadingEnv || this.loadingHelp || this.loadingInspire || this.loadingList || this.loadingMigrate || this.loadingOptimize;
        }
    },

    data() {
        return {
            loadingAbout: false,
            loadingClearCompiled: false,
            loadingCompletion: false,
            loadingDb: false,
            loadingDocs: false,
            loadingUp: false,
            loadingDown: false,
            loadingEnv: false,
            loadingHelp: false,
            loadingInspire: false,
            loadingList: false,
            loadingMigrate: false,
            loadingOptimize: false
        };
    },

    methods: {
        about() {
            const route = 'about';
            const title = 'About';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        clearCompiled() {
            this.loadingClearCompiled = true;
            axios.post(Telescope.basePath + '/generate-rules-api/clear-compiled')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingClearCompiled = false;
                });
        },

        completion() {
            this.loadingCompletion = true;
            axios.post(Telescope.basePath + '/generate-rules-api/completion')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingCompletion = false;
                });
        },

        db() {
            this.loadingDb = true;
            axios.post(Telescope.basePath + '/generate-rules-api/db')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingDb = false;
                });
        },

        docs() {
            this.loadingDocs = true;
            axios.post(Telescope.basePath + '/generate-rules-api/docs')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingDocs = false;
                });
        },

        up() {
            this.loadingUp = true;
            axios.post(Telescope.basePath + '/generate-rules-api/up')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingUp = false;
                });
        },

        down() {
            this.loadingDown = true;
            axios.post(Telescope.basePath + '/generate-rules-api/down')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingDown = false;
                });
        },

        env() {
            this.loadingEnv = true;
            axios.post(Telescope.basePath + '/generate-rules-api/env')
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingEnv = false;
                });
        },

        help() {
            const route = 'help';
            const title = 'Help';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        inspire() {
            const route = 'inspire';
            const title = 'Inspire';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        list() {
            const route = 'list';
            const title = 'List';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        migrate() {
            const route = 'migrate';
            const title = 'Migrate';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        optimize() {
            const route = 'optimize';
            const title = 'Optimize';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Common Commands</h6>
        <div class="p-3 d-flex flex-wrap" style="gap: 1rem;">
            <!-- About Button (already converted) -->
            <secondary-button
                buttonText="About"
                title="About"
                color="light"
                :loading="loadingAbout"
                :isAnyLoading="isAnyLoading"
                @click="about"
            />

            <!-- Clear Compiled Button -->
            <secondary-button
                buttonText="Clear Compiled"
                title="Clear Compiled"
                color="light"
                :loading="loadingClearCompiled"
                :isAnyLoading="isAnyLoading"
                @click="clearCompiled"
            />

            <!-- Completion Button -->
            <secondary-button
                buttonText="Completion"
                title="Completion"
                color="light"
                :loading="loadingCompletion"
                :isAnyLoading="isAnyLoading"
                @click="completion"
            />

            <!-- DB Button -->
            <secondary-button
                buttonText="DB"
                title="DB"
                color="light"
                :loading="loadingDb"
                :isAnyLoading="isAnyLoading"
                @click="db"
            />

            <!-- Docs Button -->
            <secondary-button
                buttonText="Docs"
                title="Docs"
                color="light"
                :loading="loadingDocs"
                :disabled="true"
                @click="docs"
            />

            <!-- Up Button -->
            <secondary-button
                buttonText="Up"
                title="Up"
                color="light"
                :loading="loadingUp"
                :isAnyLoading="isAnyLoading"
                @click="up"
            />

            <!-- Down Button -->
            <secondary-button
                buttonText="Down"
                title="Down"
                color="light"
                :loading="loadingDown"
                :isAnyLoading="isAnyLoading"
                @click="down"
            />

            <!-- Env Button -->
            <secondary-button
                buttonText="Env"
                title="Env"
                color="light"
                :loading="loadingEnv"
                :isAnyLoading="isAnyLoading"
                @click="env"
            />

            <!-- Help Button -->
            <secondary-button
                buttonText="Help"
                title="Help"
                color="light"
                :loading="loadingHelp"
                :isAnyLoading="isAnyLoading"
                @click="help"
            />

            <!-- Inspire Button -->
            <secondary-button
                buttonText="Inspire"
                title="Inspire"
                color="light"
                :loading="loadingInspire"
                :isAnyLoading="isAnyLoading"
                @click="inspire"
            />
        </div>
    </div>
</template>

