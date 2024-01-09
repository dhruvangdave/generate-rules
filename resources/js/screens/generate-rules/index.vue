<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";

export default {
    components: {ButtonClose},
    computed: {
        isAnyLoading() {
            return this.loadingGenerate;
        }
    },

    props: {
        defaultUserInput: String
    },

    data() {
        return {
            userInput: this.defaultUserInput,
            rules: [],
            loadingGenerate: false,
            errorMessage: ''
        };
    },

    methods: {
        generateRules() {
            this.loadingGenerate = true;
            axios.post(Telescope.basePath + '/generate-rules-api/rule-generator/generate', {'data': this.userInput})
                .then((res) => {
                    this.rules = res.data.rules;
                    this.errorMessage = res.data.error;
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.message || error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingGenerate = false;
                });
        },

        updateDefaultInput(updatedDefaultInput) {
            this.userInput = updatedDefaultInput;
        },
    }
}
</script>

<template>
    <index-screen title="Rules Generator" resource="rule-generator" @defaultInputUpdated="updateDefaultInput">
        <div slot="table-header" class="p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-floating">
                    <label for="floatingTextareaInput" class="font-weight-bold">Enter the migration code</label>
                    <textarea
                        v-model="userInput"
                        class="form-control"
                        style="white-space: pre"
                        placeholder="Enter your code to generate the Rules"
                        id="floatingTextareaInput"
                        rows="20"
                        cols="55"
                    ></textarea>
                </div>
                <div class="d-flex flex-column mb-3 justify-content-center">
                    <div class="d-flex justify-content-center">
                        <svg width="36px" height="36px" viewBox="0 -6.5 38 38" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>right-arrow</title> <desc>Created with Sketch.</desc> <g id="icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="ui-gambling-website-lined-icnos-casinoshunter" transform="translate(-1511.000000, -158.000000)" fill="#1C1C1F" fill-rule="nonzero"> <g id="1" transform="translate(1350.000000, 120.000000)"> <path d="M187.812138,38.5802109 L198.325224,49.0042713 L198.41312,49.0858421 C198.764883,49.4346574 198.96954,49.8946897 199,50.4382227 L198.998248,50.6209428 C198.97273,51.0514917 198.80819,51.4628128 198.48394,51.8313977 L198.36126,51.9580208 L187.812138,62.4197891 C187.031988,63.1934036 185.770571,63.1934036 184.990421,62.4197891 C184.205605,61.6415481 184.205605,60.3762573 184.990358,59.5980789 L192.274264,52.3739093 L162.99947,52.3746291 C161.897068,52.3746291 161,51.4850764 161,50.3835318 C161,49.2819872 161.897068,48.3924345 162.999445,48.3924345 L192.039203,48.3917152 L184.990421,41.4019837 C184.205605,40.6237427 184.205605,39.3584519 184.990421,38.5802109 C185.770571,37.8065964 187.031988,37.8065964 187.812138,38.5802109 Z" id="right-arrow"> </path> </g> </g> </g> </g></svg>
                    </div>
                    <button class="btn btn-primary text-center" :disabled="isAnyLoading" title="Queue Failed"
                            @click.prevent="generateRules">
                        <span v-if="loadingGenerate" class="icon spin fill-text-color">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 class="icon spin fill-text-color-white">
                                <path
                                    d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                            </svg>
                        </span>
                        <span v-else>Generate Rules</span>
                    </button>
                </div>
                <div class="form-floating">
                    <label for="floatingTextareaOutput" class="font-weight-bold">Generated Rules</label>
                    <textarea
                        v-model="rules"
                        class="form-control"
                        style="white-space: pre"
                        placeholder="Your generated code will be shown here"
                        id="floatingTextareaOutput"
                        rows="20"
                        cols="55"
                    ></textarea>
                </div>
            </div>
        </div>
    </index-screen>
</template>
