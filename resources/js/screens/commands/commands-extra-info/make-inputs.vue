<script>
import axios from "axios";
import Checkbox from "../../../components/Checkbox";

export default {
    components: {Checkbox},
    computed: {
        hideAll() {
            return !['model'].includes(this.type);
        },

        hideInbound() {
            return !['cast'].includes(this.type);
        },

        hideInline() {
            return !['component'].includes(this.type);
        },

        hideController() {
            return !['model'].includes(this.type);
        },

        hideFactory() {
            return !['model'].includes(this.type);
        },

        hideMigration() {
            return !['model'].includes(this.type);
        },

        hideMorphPivot() {
            return !['model'].includes(this.type);
        },

        hidePolicy() {
            return !['model'].includes(this.type);
        },

        hideSeed() {
            return !['model'].includes(this.type);
        },

        hidePivot() {
            return !['model'].includes(this.type);
        },

        hideImplicit() {
            return !['rule'].includes(this.type);
        },

        hideCollection() {
            return !['resource'].includes(this.type);
        },

        hideView() {
            return !['component'].includes(this.type);
        },

        hideTest() {
            return !['command', 'component', 'controller', 'job', 'listener', 'mail', 'middleware', 'model', 'notification', 'view'].includes(this.type);
        },

        hidePest() {
            return !['command', 'component', 'controller', 'job', 'listener', 'mail', 'middleware', 'model', 'notification', 'test', 'view'].includes(this.type);
        },

        hideApi() {
            return !['controller', 'model'].includes(this.type);
        },

        hideUnit() {
            return !['test'].includes(this.type);
        },

        hideInvokable() {
            return !['controller'].includes(this.type);
        },

        hideResource() {
            return !['controller', 'model'].includes(this.type);
        },

        hideRequests() {
            return !['controller', 'model'].includes(this.type);
        },

        hideSingleton() {
            return !['controller'].includes(this.type);
        },

        hideCreatable() {
            return !['controller'].includes(this.type);
        },

        hideRender() {
            return !['exception'].includes(this.type);
        },

        hideReport() {
            return !['exception'].includes(this.type);
        },

        hideSync() {
            return !['job'].includes(this.type);
        },

        hideQueued() {
            return !['listener'].includes(this.type);
        },

        hideQuiet() {
            return [''].includes(this.type);
        },

        hideForce() {
            return ['factory', 'migration'].includes(this.type);
        },

        hideVersion() {
            return [''].includes(this.type);
        },

        hideHelp() {
            return [''].includes(this.type);
        },
    },

    data() {
        return {
            type: '',
            userInput: '',
            data: '',
            loadingData: false,
            extras: {
                inbound: false,
                force: false,
                quiet: false,
                version: false,
                help: false,
                test: false,
                pest: false,
                inline: false,
                view: false,
                api: false,
                invokable: false,
                resource: false,
                requests: false,
                singleton: false,
                creatable: false,
                render: false,
                report: false,
                sync: false,
                queued: false,
                all: false,
                controller: false,
                factory: false,
                migration: false,
                morphPivot: false,
                policy: false,
                seed: false,
                pivot: false,
                collection: false,
                implicit: false,
                unit: false,
            }
        }
    },

    mounted() {
        this.type = this.$route.query.type;
    },

    methods: {
        make() {
            this.loadingData = true;
            axios.post(Telescope.basePath + `/generate-rules-api/make-${this.type}`, {'name': this.userInput, 'extras': this.extras})
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

        makeTitle() {
            return `Make ${this.type}`;
        },

        handleCheckboxChange(checkboxName, newCheckedValue) {
            this.extras[checkboxName] = newCheckedValue;
        },
    }
}
</script>

<template>
    <index-screen :title="makeTitle()" resource="commands">
        <div slot="table-header">
            <div class="p-3 d-flex flex-column" style="gap: 1rem;">
                <p class="mb-0 font-weight-bold">Please enter the name of the {{ this.type }}.</p>
                <input type="text" class="form-control w-100"
                       id="userInput"
                       :placeholder="'Enter the name of ' + this.type" v-model="userInput">
                <div class="d-flex flex-wrap" style="gap: 1rem;">
                    <checkbox
                        name="all"
                        :value="extras.all"
                        :checked="extras.all"
                        @change="handleCheckboxChange('all', $event)"
                        :class="{ 'd-none': hideAll }"
                    >
                        All
                    </checkbox>
                    <checkbox
                        name="unit"
                        :value="extras.unit"
                        :checked="extras.unit"
                        @change="handleCheckboxChange('unit', $event)"
                        :class="{ 'd-none': hideUnit }"
                    >
                        Unit
                    </checkbox>
                    <checkbox
                        name="api"
                        :value="extras.api"
                        :checked="extras.api"
                        @change="handleCheckboxChange('api', $event)"
                        :class="{ 'd-none': hideApi }"
                    >
                        Api
                    </checkbox>
                    <checkbox
                        name="controller"
                        :value="extras.controller"
                        :checked="extras.controller"
                        @change="handleCheckboxChange('controller', $event)"
                        :class="{ 'd-none': hideController }"
                    >
                        Controller
                    </checkbox>
                    <checkbox
                        name="factory"
                        :value="extras.factory"
                        :checked="extras.factory"
                        @change="handleCheckboxChange('factory', $event)"
                        :class="{ 'd-none': hideFactory }"
                    >
                        Factory
                    </checkbox>
                    <checkbox
                        name="migration"
                        :value="extras.migration"
                        :checked="extras.migration"
                        @change="handleCheckboxChange('migration', $event)"
                        :class="{ 'd-none': hideMigration }"
                    >
                        Migration
                    </checkbox>
                    <checkbox
                        name="morphPivot"
                        :value="extras.morphPivot"
                        :checked="extras.morphPivot"
                        @change="handleCheckboxChange('morphPivot', $event)"
                        :class="{ 'd-none': hideMorphPivot }"
                    >
                        Morph-pivot
                    </checkbox>
                    <checkbox
                        name="policy"
                        :value="extras.policy"
                        :checked="extras.policy"
                        @change="handleCheckboxChange('policy', $event)"
                        :class="{ 'd-none': hidePolicy }"
                    >
                        Policy
                    </checkbox>
                    <checkbox
                        name="seed"
                        :value="extras.seed"
                        :checked="extras.seed"
                        @change="handleCheckboxChange('seed', $event)"
                        :class="{ 'd-none': hideSeed }"
                    >
                        Seed
                    </checkbox>
                    <checkbox
                        name="pivot"
                        :value="extras.pivot"
                        :checked="extras.pivot"
                        @change="handleCheckboxChange('pivot', $event)"
                        :class="{ 'd-none': hidePivot }"
                    >
                        Pivot
                    </checkbox>
                    <checkbox
                        name="collection"
                        :value="extras.collection"
                        :checked="extras.collection"
                        @change="handleCheckboxChange('collection', $event)"
                        :class="{ 'd-none': hideCollection }"
                    >
                        Collection
                    </checkbox>
                    <checkbox
                        name="implicit"
                        :value="extras.implicit"
                        :checked="extras.implicit"
                        @change="handleCheckboxChange('implicit', $event)"
                        :class="{ 'd-none': hideImplicit }"
                    >
                        Implicit
                    </checkbox>
                    <checkbox
                        name="invokable"
                        :value="extras.invokable"
                        :checked="extras.invokable"
                        @change="handleCheckboxChange('invokable', $event)"
                        :class="{ 'd-none': hideInvokable }"
                    >
                        Invokable
                    </checkbox>
                    <checkbox
                        name="resource"
                        :value="extras.resource"
                        :checked="extras.resource"
                        @change="handleCheckboxChange('resource', $event)"
                        :class="{ 'd-none': hideResource }"
                    >
                        Resource
                    </checkbox>
                    <checkbox
                        name="requests"
                        :value="extras.requests"
                        :checked="extras.requests"
                        @change="handleCheckboxChange('requests', $event)"
                        :class="{ 'd-none': hideRequests }"
                    >
                        Requests
                    </checkbox>
                    <checkbox
                        name="singleton"
                        :value="extras.singleton"
                        :checked="extras.singleton"
                        @change="handleCheckboxChange('singleton', $event)"
                        :class="{ 'd-none': hideSingleton }"
                    >
                        Singleton
                    </checkbox>
                    <checkbox
                        name="creatable"
                        :value="extras.creatable"
                        :checked="extras.creatable"
                        @change="handleCheckboxChange('creatable', $event)"
                        :class="{ 'd-none': hideCreatable }"
                    >
                        Creatable
                    </checkbox>
                    <checkbox
                        name="inbound"
                        :value="extras.inbound"
                        :checked="extras.inbound"
                        @change="handleCheckboxChange('inbound', $event)"
                        :class="{ 'd-none': hideInbound }"
                    >
                        Inbound
                    </checkbox>
                    <checkbox
                        name="render"
                        :value="extras.render"
                        :checked="extras.render"
                        @change="handleCheckboxChange('render', $event)"
                        :class="{ 'd-none': hideRender }"
                    >
                        Render
                    </checkbox>
                    <checkbox
                        name="report"
                        :value="extras.report"
                        :checked="extras.report"
                        @change="handleCheckboxChange('report', $event)"
                        :class="{ 'd-none': hideReport }"
                    >
                        Report
                    </checkbox>
                    <checkbox
                        name="inline"
                        :value="extras.inline"
                        :checked="extras.inline"
                        @change="handleCheckboxChange('inline', $event)"
                        :class="{ 'd-none': hideInline }"
                    >
                        Inline
                    </checkbox>
                    <checkbox
                        name="view"
                        :value="extras.view"
                        :checked="extras.view"
                        @change="handleCheckboxChange('view', $event)"
                        :class="{ 'd-none': hideView }"
                    >
                        View
                    </checkbox>
                    <checkbox
                        name="sync"
                        :value="extras.sync"
                        :checked="extras.sync"
                        @change="handleCheckboxChange('sync', $event)"
                        :class="{ 'd-none': hideSync }"
                    >
                        Sync
                    </checkbox>
                    <checkbox
                        name="queued"
                        :value="extras.queued"
                        :checked="extras.queued"
                        @change="handleCheckboxChange('queued', $event)"
                        :class="{ 'd-none': hideQueued }"
                    >
                        Queued
                    </checkbox>
                    <checkbox
                        name="force"
                        :value="extras.force"
                        :checked="extras.force"
                        @change="handleCheckboxChange('force', $event)"
                        :class="{ 'd-none': hideForce }"
                    >
                        Force
                    </checkbox>
                    <checkbox
                        name="quiet"
                        :value="extras.quiet"
                        :checked="extras.quiet"
                        @change="handleCheckboxChange('quiet', $event)"
                        :class="{ 'd-none': hideQuiet }"
                    >
                        Quiet
                    </checkbox>
                    <checkbox
                        name="test"
                        :value="extras.test"
                        :checked="extras.test"
                        @change="handleCheckboxChange('test', $event)"
                        :class="{ 'd-none': hideTest }"
                    >
                        Test
                    </checkbox>
                    <checkbox
                        name="pest"
                        :value="extras.pest"
                        :checked="extras.pest"
                        @change="handleCheckboxChange('pest', $event)"
                        :class="{ 'd-none': hidePest }"
                    >
                        Pest
                    </checkbox>
                    <checkbox
                        name="version"
                        :value="extras.version"
                        :checked="extras.version"
                        @change="handleCheckboxChange('version', $event)"
                        :class="{ 'd-none': hideVersion }"
                    >
                        Version
                    </checkbox>
                    <checkbox
                        name="help"
                        :value="extras.help"
                        :checked="extras.help"
                        @change="handleCheckboxChange('help', $event)"
                        :class="{ 'd-none': hideHelp }"
                    >
                        Help
                    </checkbox>
                </div>
                <button class="btn btn-primary text-center" :title="makeTitle()" @click.prevent="make">
                    <span v-if="loadingData" class="icon spin fill-text-color">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="icon spin fill-text-color-white">
                            <path
                                d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
                        </svg>
                    </span>
                    <span v-else>{{ makeTitle() }}</span>
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
