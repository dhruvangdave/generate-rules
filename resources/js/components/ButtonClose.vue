<template>
    <button v-if="visible" @click="handleClick" type="button" :class="['btn', svgClasses]">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="10"
            height="10"
            viewBox="278.046 126.846 235.908 235.908"
        >
            <path
                d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"/>
        </svg>
    </button>
</template>

<script>
export default {
    data() {
        return {
            visible: true, // Visibility controlled within the component
        };
    },

    props: {
        color: {
            type: String,
            required: true
        },
        onClick: {
            type: Function,
            required: true
        }
    },
    computed: {
        svgClasses() {
            return {
                'text-danger': this.color === 'red',
                'text-success': this.color === 'green',
                // 'group-hover' does not have a direct Bootstrap equivalent
            };
        }
    },
    methods: {
        handleClick() {
            this.onClick();
            this.visible = false; // Hide the button
        }
    }
};
</script>
