<template>
    <div>
        <div class="flex items-center">
            <p>
                <span class="form-label m-0">{{ label }}</span>
                <Icon
                    class="ml-1 w-4 h-4 inline-block opacity-25 animate-spin"
                    name="circle-notch"
                    v-if="busy"
                />
            </p>
            <button
                v-if="!readonly"
                class="ml-4"
                @click="useCamera.click()"
            >
                <Icon
                    class="w-4 h-4 text-thick-theme-light"
                    name="camera"
                />
            </button>
            <button
                v-if="!readonly"
                class="ml-4"
                @click="useGallery.click()"
            >
                <icon
                    class="w-4 h-4 text-thick-theme-light"
                    name="image"
                />
            </button>
            <button
                class="ml-4"
                v-if="modelValue"
                @click="show = !show"
            >
                <Icon
                    class="w-4 h-4 text-dark-theme-light"
                    :name="show ? 'eyes-slash':'eyes'"
                />
            </button>
        </div>
        <div
            v-if="error"
            class="text-red-700 text-sm"
        >
            {{ error }}
        </div>
        <img
            v-if="modelValue !== undefined && show"
            :src="route('uploads.show', {path: name, filename: filename })"
            @loadstart="busy = true"
            @load="$nextTick(() => busy = false)"
            alt=""
        >
        <input
            class="hidden"
            type="file"
            ref="useCamera"
            @input="fileInput"
            capture="environment"
            accept="image/*"
        >
        <input
            class="hidden"
            type="file"
            ref="useGallery"
            @input="fileInput"
            accept="image/*"
        >
    </div>
</template>

<script setup>
import Icon from '@/Components/Helpers/Icon';
import { ref } from '@vue/reactivity';
const emits = defineEmits(['update:modelValue', 'autosave']);
const props = defineProps({
    modelValue: { type: String, default: '' },
    label: { type: String, required: true },
    name: { type: String, required: true },
    error: { type: String, default: '' },
    readonly: { type: Boolean, },
});

const useCamera = ref(null);
const useGallery = ref(null);
const show = ref(false);
const busy = ref(false);
const filename = ref(props.modelValue);
const fileInput = (event) => {
    busy.value = true;
    let form = new FormData();
    form.append('file', event.target.files[0]);
    form.append('name', props.name);
    form.append('old', props.modelValue);
    window.axios
        .post(window.route('uploads.store'), form)
        .then(response => {
            filename.value = response.data.filename;
            emits('update:modelValue', response.data.filename);
            emits('autosave');
            if (!show.value) {
                show.value = true;
            }
        }).catch(error => {
            console.log(error);
        }).finally(() => {
            busy.value = false;
        });
    console.log(event.target.files[0]);
};
</script>