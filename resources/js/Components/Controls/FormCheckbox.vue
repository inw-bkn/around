<template>
    <div>
        <label class="inline-flex items-center cursor-pointer">
            <input
                type="checkbox"
                class="shadow-xs text-gray-600 h-6 w-6 transition-all duration-200 ease-in-out appearance-none color inline-block align-middle border select-none flex-shrink-0 rounded cursor-pointer focus:outline-none"
                :checked="modelValue"
                @change="change"
            >
            <span class="ml-4 text-lg">{{ label }}</span>
        </label>
    </div>
</template>

<script>
export default {
    emits: ['update:modelValue', 'autosave'],
    props: {
        modelValue: { type: Boolean },
        label: { type: String, default: '' }
    },
    methods: {
        change () {
            this.$emit('update:modelValue', !this.modelValue);
            this.$emit('autosave');
        },
        check () {
            this.$emit('update:modelValue', !this.modelValue);
        }
    }
};
</script>