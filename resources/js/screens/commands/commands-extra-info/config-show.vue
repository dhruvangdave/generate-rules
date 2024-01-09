<script>
import axios from "axios";

export default {

    data() {
        return {
            configShowInput: '',
            data: '',
            loadingData: false
        }
    },

    methods: {
        configShow() {
            this.loadingData = true;
            axios.post(Telescope.basePath + '/generate-rules-api/config-show', {'config': this.configShowInput})
                .then((res) => {
                    console.log('res', res.data.result);
                    this.data = res.data.result
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingData = false;
                });
        },
    }
}
</script>

<template>
    <index-screen title="Config Show" resource="commands">
        <div slot="table-header">
            <div class="p-3 d-flex flex-column" style="gap: 1rem;">
                <p class="mb-0 font-weight-bold">Please enter the name of the config.</p>
                <input type="text" class="form-control w-100"
                       id="configShowInput"
                       placeholder="Config to show E.g. app" v-model="configShowInput">
                <button class="btn btn-primary text-center" title="Clear View" @click.prevent="configShow">
                    <span v-if="loadingData" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                    <span v-else>Show Config</span>
                </button>
            </div>
            <div class="d-flex justify-content-center" v-if="data">
                <div class="code-bg p-2 mb-3 text-white">
                    <copy-clipboard :data="data">
                        <pre v-if="data" class="text-white mb-0">
                            {{ this.data }}
                        </pre>
                    </copy-clipboard>
                </div>
            </div>
        </div>
    </index-screen>
</template>
