<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingGenerate;
        },

        isThroughFieldReq() {
            return ['HasManyThrough', 'HasOneThrough'].includes(this.userInput.relation);
        },

        isPolymorphicSelected() {
            return ['MorphMany', 'MorphOne'].includes(this.userInput.relation);
        },

        getLabel() {
            this.currentLabel = this.relationOptions.find(item => item.value === this.userInput.relation)?.label;
            this.relationMethod = '';
            return this.currentLabel ? this.currentLabel : ''
        }
    },

    props: {
        defaultUserInput: String
    },

    data() {
        return {
            userInput: {
                from: '',
                to: '',
                through: '',
                relation: '0',
                morphParent: [''],
                morphChild: '',
            },
            currentLabel: '',
            maxParentModels: 10,
            relationMethod: '',
            loadingGenerate: false,
            errorMessage: '',
            relationOptions: [
                {value: "BelongsTo", label: "Belongs To One", dropDownText: 'Belonging to one relation : (Ex. Van belongs to Owner)', ph1: 'Ex. Van', ph2: 'Ex. Owner'},
                {value: "BelongsToMany", label: "Belongs To Many", dropDownText: 'Belonging to many relation : (Ex. Class belongs to many Students)', ph1: 'Ex. Class', ph2: 'Ex. Student'},
                {value: "HasOne", label: "Has One", dropDownText: 'Has one relation : (Ex. Raj has one Bag)', ph1: 'Ex. Raj', ph2: 'Ex. Bag'},
                {value: "HasMany", label: "Has Many", dropDownText: 'Has many relation : (Ex. Raju has many Pens)', ph1: 'Ex. Raju', ph2: 'Ex. Pen'},
                {value: "HasOneThrough", label: "Has One Through", dropDownText: 'Has one through relation : (Ex. Ram has made contact to Raj through Sita)', ph1: 'Ex. Ram', ph2: 'Ex. Raj', ph3: 'Sita'},
                {value: "HasManyThrough", label: "Has Many Through", dropDownText: 'Has many through relation : (Ex. Ram got these certification through Sita)', ph1: 'Ex. Ram', ph2: 'Ex. Certificate', ph3: 'Sita'},
                {value: "MorphOne", label: "Morph One", dropDownText: 'Belonging to one relation : (Ex. Image can belongs to any User or Post)', ph1: 'Ex. Image', ph2: 'Ex. User, Post'},
                {value: "MorphMany", label: "Morph Many", dropDownText: 'Belonging to many relation : (Ex. Multiple Comments can belongs to any Post or Video.)', ph1: 'Ex. Comment', ph2: 'Ex. Post, Video'}
            ]
        };
    },

    methods: {
        generateRelations() {
            console.log('Data', this.userInput);
            if (this.userInput.relation === '0') {
                return this.alertError('Error : Please Select Appropriate Relation.');
            }
            this.loadingGenerate = true;
            axios.post(Telescope.basePath + '/generate-rules-api/relations-generator/generate', {'data': this.userInput})
                .then((res) => {
                    console.log('Okay', res)
                    this.relationMethod = res.data.relationMethod;
                })
                .catch(error => {
                    this.alertError('Error : ' + (error.response.data.message || error.response.data.error || error.message));
                })
                .finally(() => {
                    this.loadingGenerate = false;
                });
        },

        addParentModel() {
            if (this.userInput.morphParent.length < this.maxParentModels) {
                this.userInput.morphParent.push('');
            }
        },
    }
}
</script>

<template>
    <index-screen title="Relations Generator" resource="relations-generator">
        <div slot="table-header" class="p-4">
            <div class="d-flex flex-column" style="gap: 1rem;">
                <div class="container">
                    <div class="form-floating d-flex flex-column">
                        <label for="floatingTextareaInput0" class="font-weight-bold">Please select the relation</label>
                        <select v-model="userInput.relation" @onchange="getLabel" id="floatingTextareaInput0"
                                class="p-1 border-1 rounded-pill bg-light form-control">
                            <option disabled value="0">Select Option</option>
                            <option v-for="option in relationOptions" :key="option.value" :value="option.value">
                                {{ option?.dropDownText }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="container" v-if="!isPolymorphicSelected" style="gap: 1rem;">
                    <div class="row" v-if="this.userInput.relation !== '0'">
                        <div class="d-flex align-items-end" v-if="!isThroughFieldReq && this.userInput.relation !== '0'">
                            <label class="font-weight-bold">This</label>
                        </div>
                        <div class="form-floating d-flex flex-column col">
                            <label for="floatingTextareaInput1" class="font-weight-bold">Model</label>
                            <input
                                v-model="userInput.from"
                                id="floatingTextareaInput1"
                                :placeholder="relationOptions.find((item) => item.value === userInput.relation).ph1"
                                class="form-control"
                            />
                        </div>
                        <div class="form-floating d-flex justify-content-center align-items-end"
                             v-if="!isThroughFieldReq && this.userInput.relation !== '0'">
                            <label for="floatingTextareaInput3" class="font-weight-bold mb-1">{{
                                    this.currentLabel.toLowerCase()
                                }}</label>
                        </div>
                        <div class="form-floating d-flex flex-column col" v-if="isThroughFieldReq">
                            <label for="floatingTextareaInput3" class="font-weight-bold">Intermediate Model</label>
                            <input
                                v-model="userInput.through"
                                id="floatingTextareaInput3"
                                :placeholder="relationOptions.find((item) => item.value === userInput.relation).ph3"
                                class="form-control"
                            />
                        </div>
                        <div class="form-floating d-flex flex-column col">
                            <label for="floatingTextareaInput2" class="font-weight-bold">Model</label>
                            <input
                                v-model="userInput.to"
                                id="floatingTextareaInput2"
                                :placeholder="relationOptions.find((item) => item.value === userInput.relation).ph2"
                                class="form-control"
                            />
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center font-weight-bold p-2 mb-2 mx-3 bg-light rounded-pill" v-if="this.currentLabel && this.userInput.from && this.userInput.to">
                    {{ 'Check The Representation: This "' + this.userInput.from + '" ' + this.currentLabel.toLowerCase() + ' "' + this.userInput.to + '".'}}
                </div>
                <div v-if="isPolymorphicSelected">
                    <div class="form-floating d-flex flex-column col">
                        <label for="floatingMorphInputChild" class="font-weight-bold">Model</label>
                        <input
                            v-model="userInput.morphChild"
                            id="floatingMorphInputChild"
                            :placeholder="relationOptions.find((item) => item.value === userInput.relation).ph1"
                            class="form-control"
                        />
                    </div>
                    <div class="form-floating d-flex justify-content-center align-items-end mt-2"
                         v-if="!isThroughFieldReq && this.userInput.relation !== '0'">
                        <label for="floatingTextareaInput3" class="font-weight-bold mb-0">is associate with</label>
                    </div>
                    <div class="form-floating d-flex flex-column col" v-for="(parent, index) in userInput.morphParent"
                         :key="index">
                        <label :for="'floatingMorphInputParent' + index" class="font-weight-bold">Model {{
                                index + 1
                            }}</label>
                        <input
                            v-model="userInput.morphParent[index]"
                            :id="'floatingMorphInputParent' + index"
                            :placeholder="relationOptions.find((item) => item.value === userInput.relation).ph2"
                            class="form-control"
                        />
                    </div>
                    <div class="d-flex justify-content-center">
                        <secondary-button
                            class="rounded-pill mt-3 bg-info"
                            @click="addParentModel"
                            :disabled="userInput.morphParent.length >= maxParentModels">
                            + Add Another Model
                        </secondary-button>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center mx-3">
                    <secondary-button
                        buttonText="Generate Relations"
                        title="Generate Relations"
                        color="primary"
                        :loading="loadingGenerate"
                        :isAnyLoading="isAnyLoading"
                        @click="generateRelations"
                    ></secondary-button>
                </div>

                <div class="d-flex justify-content-center" v-if="relationMethod">
                    <div class="code-bg p-2 my-3 text-white">
                        <copy-clipboard :data="relationMethod">
                        <pre v-if="relationMethod" class="text-white mb-0">
                            {{ this.relationMethod }}
                        </pre>
                        </copy-clipboard>
                    </div>
                </div>
            </div>
        </div>
    </index-screen>
</template>
