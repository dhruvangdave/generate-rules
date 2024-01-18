<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingClear;
        }
    },

    data() {
        return {
            loadingClear: false,
        };
    },

    methods: {
        optimizeClear() {
            const route = 'optimize-clear';
            const title = 'Optimize Clear';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Optimize Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Optimize Clear"
                title="Optimize Clear"
                color="light"
                :loading="loadingClear"
                :isAnyLoading="isAnyLoading"
                @click="optimizeClear"
            ></secondary-button>
        </div>
    </div>
</template>
