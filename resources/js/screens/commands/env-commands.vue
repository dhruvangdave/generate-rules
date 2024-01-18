<script>
import SecondaryButton from "../../components/SecondaryButton";

export default {
    components: {SecondaryButton},
    computed: {
        isAnyLoading() {
            return this.loadingEncrypt || this.loadingDecrypt;
        }
    },

    data() {
        return {
            loadingEncrypt: false,
            loadingDecrypt: false,
        };
    },

    methods: {
        envEncrypt() {
            const route = 'env-encryption';
            const title = 'ENV Encryption';
            this.$router.push({ name: 'command-logs-page', query: { route, title } });
        },

        envDecrypt() {
            this.$router.push({ name: 'env-decryption' });
        },
    }
}
</script>

<template>
    <div slot="cache-commands">
        <h6 class="px-3 pt-3 mb-0 text-sm">Environment Commands</h6>
        <div class="p-3 d-flex" style="gap: 1rem;">
            <secondary-button
                buttonText="Environment Encryption"
                title="Environment Encryption"
                color="light"
                :loading="loadingEncrypt"
                :isAnyLoading="isAnyLoading"
                @click="envEncrypt"
            ></secondary-button>
            <secondary-button
                buttonText="Environment Decryption"
                title="Environment Decryption"
                color="light"
                :loading="loadingDecrypt"
                :isAnyLoading="isAnyLoading"
                @click="envDecrypt"
            ></secondary-button>
        </div>
    </div>
</template>
