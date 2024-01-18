<template>
    <div :class="`form-check ${className}`">
        <input
            class="form-check-input"
            type="checkbox"
            :id="name"
            :name="name"
            :value="value"
            :checked="checked"
            @change="$emit('change', $event.target.checked)"
        >
        <label class="form-check-label" :for="name">
            <slot></slot>
        </label>
    </div>
</template>

<script>
export default {
    name: 'Checkbox',
    props: {
        name: String,
        value: [String, Number, Boolean],
        handleChange: Function,
        className: {
            type: String,
            default: ''
        },
        checked: Boolean
    }
};
</script>

<style scoped>
/* Add any specific styles if needed */
</style>
