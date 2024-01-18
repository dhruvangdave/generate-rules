<script>
import ButtonClose from "../../components/ButtonClose";
import axios from "axios";
import SecondaryButton from "../../components/SecondaryButton";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingList;
        }
    },

    data() {
        return {
            loadingList: false,
        };
    },

    methods: {
        channelList() {
            const route = 'channel-list';
            const title = 'Channel List';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Channel Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Channel List"
                title="Channel List"
                color="light"
                :loading="loadingList"
                :isAnyLoading="isAnyLoading"
                @click="channelList"
            ></secondary-button>
        </div>
    </div>
</template>
