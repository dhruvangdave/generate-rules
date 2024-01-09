<script>
import axios from "axios";

export default {

    data() {
        return {
            cacheForgetInput: ''
        }
    },

    methods: {
        // @todo key need to be rendered dynamically
        cacheForget() {
            this.loadingForget = true;
            axios.post(Telescope.basePath + '/generate-rules-api/cache-forget', {'key': this.cacheForgetInput})
                .then((res) => {
                    console.log('res', res.data.result);
                    this.alertSuccess(res.data.result);
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingForget = false;
                });
        },
    }
}
</script>

<template>
    <index-screen title="Cache Forget" resource="commands">
        <div slot="table-header">
            <div class="p-3 d-flex flex-column" style="gap: 1rem;">
                <p class="mb-0 font-weight-bold">Please enter the name of the cache you want to forget.</p>
                <input type="text" class="form-control w-100"
                       id="cacheForgetInput"
                       placeholder="Cache to forget" v-model="cacheForgetInput">
                <button class="btn btn-primary text-center" title="Clear View" @click.prevent="cacheForget">
                    Forget Cache
                </button>
            </div>
        </div>
    </index-screen>
</template>
