<script>
import axios from "axios";

export default {

    data() {
        return {
            envDecryptInput: ''
        }
    },

    methods: {
        envDecrypt() {
            this.loadingDecrypt = true;
            axios.post(Telescope.basePath + '/generate-rules-api/env-decrypt', {'key': this.envDecryptInput})
                .then((res) => {
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingDecrypt = false;
                });
        },
    }
}
</script>

<template>
    <index-screen title="Decrypt ENV" resource="commands">
        <div slot="table-header">
            <div class="p-3 d-flex flex-column" style="gap: 1rem;">
                <p class="mb-0 font-weight-bold">Please provide the decryption key.</p>
                <input type="text" class="form-control w-100"
                       id="envDecryptInput"
                       placeholder="Decryption key" v-model="envDecryptInput">
                <button class="btn btn-primary text-center" title="Clear View" @click.prevent="envDecrypt">
                    Decrypt ENV
                </button>
            </div>
        </div>
    </index-screen>
</template>
