<template>
    <div class="w-full">
        <label
            v-if="label"
            class="form-label"
            :for="name"
        >{{ label }} :</label>
        <input
            :id="name"
            :name="name"
            ref="input"
            @input="$emit('update:modelValue', $refs.input.value)"
            @change="$emit('autosave')"
            :type="type"
            :placeholder="placeholder"
            :pattern="pattern"
            :readonly="readonly"
            :value="modelValue"
            class="form-input"
            :class="{ 'border-red-400': errors.length }"
        >
        <div
            v-if="errors.length"
            class="text-red-700 mt-2 text-sm"
        >
            {{ errors[0] }}
        </div>
    </div>
</template>

<script>
export default {
    emits: ['autosave', 'update:modelValue'],
    props: {
        modelValue: { type: String, required: true },
        name: { type: String, required: true },
        label: { type: String, default: '' },
        type: { type: String, default: 'text' },
        placeholder: { type: String, default: '' },
        pattern: { type: String, default: '' },
        readonly: { type: Boolean },
        errors: { type: Array, default: () => [] }
    },
    methods: {
        focus () {
            this.$refs.input.focus();
        }
    }
};
</script>