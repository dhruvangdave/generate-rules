<script>
import SecondaryButton from "../../components/SecondaryButton";
import axios from "axios";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingDiscover;
        }
    },

    data() {
        return {
            loadingDiscover: false,
        };
    },

    methods: {
        packageDiscover() {
            const route = 'package-discover';
            const title = 'Package Discover';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Package Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Package Discover"
                title="Package Discover"
                color="light"
                :loading="loadingDiscover"
                :isAnyLoading="isAnyLoading"
                @click="packageDiscover"
            ></secondary-button>
        </div>
    </div>
</template>
