<template>
    <!-- Use the dynamic classes and attributes for customization -->
    <button v-if="visible"
            @click="handleClick"
            :class="buttonClasses"
            :disabled="isAnyLoading"
            :title="title">

        <!-- Conditional rendering for loading icon -->
        <span v-if="loading" class="icon spin fill-text-color pr-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="icon spin">
            <path d="M12 10a2 2 0 0 1-3.41 1.41A2 2 0 0 1 10 8V0a9.97 9.97 0 0 1 10 10h-8zm7.9 1.41A10 10 0 1 1 8.59.1v2.03a8 8 0 1 0 9.29 9.29h2.02zm-4.07 0a6 6 0 1 1-7.25-7.25v2.1a3.99 3.99 0 0 0-1.4 6.57 4 4 0 0 0 6.56-1.42h2.1z"></path>
          </svg>
        </span>

        <!-- Default slot for button label -->
        <slot>{{ buttonText }}</slot>
    </button>
</template>

<script>
export default {
    props: {
        buttonText: {
            type: String,
            default: 'Button'
        },
        color: {
            type: String,
            default: 'primary'
        },
        isAnyLoading: {
            type: Boolean,
            default: false
        },
        loading: {
            type: Boolean,
            default: false
        },
        title: {
            type: String,
            default: 'Button'
        }
    },
    data() {
        return {
            visible: true
        };
    },
    computed: {
        buttonClasses() {
            // Compute classes based on props
            return [
                'btn',
                `btn-${this.color}`,
                { 'text-center': true, 'disabled': this.isAnyLoading }
            ];
        }
    },

    methods: {
        handleClick() {
            // Emit a custom event when the button is clicked
            this.visible = false;
            this.$emit('click');
            this.visible = true; // Optionally hide the button after click
        }
    }
};
</script>

<style scoped>
/* Scoped CSS for custom styling */
.spin {
    /* Custom spinning animation, if necessary */
}
</style>
