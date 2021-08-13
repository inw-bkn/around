<template>
    <teleport to="body">
        <Modal
            ref="modal"
            width-mode="form-cols-1"
            @closed="resetAdmission"
        >
            <template #header>
                <div class="font-semibold text-thick-theme-light">
                    {{ heading }}
                </div>
            </template>
            <template #body>
                <div class="py-4 my-2 md:py-6 md:my-4 border-t border-b border-bitter-theme-light">
                    <FormInput
                        name="an"
                        label="an"
                        v-model="an"
                        pattern="\d*"
                        type="number"
                        ref="anInput"
                        :error="anError"
                        @keydown.enter="searchAn"
                    />
                    <SpinnerButton
                        :spin="busy"
                        class="btn-dark w-full mt-2"
                        @click="searchAn"
                        :disabled="!an.length"
                    >
                        SEARCH
                    </SpinnerButton>
                    <hr class="my-4 md:my-6">
                    <span class="form-label block">Admission Data</span>
                    <div
                        v-if="!admission.hn"
                        class="bg-white rounded shadow p-2 lg:p-4 text-sm"
                        :class="{ 'animate-pulse': busy }"
                    >
                        <div
                            class="mt-1"
                            v-for="key in Object.keys(admission)"
                            :key="key"
                        >
                            <span class="bg-gray-100 text-gray-100 whitespace-nowrap">
                                {{ key }} placeholder
                            </span>
                        </div>
                    </div>
                    <div
                        v-else
                        class="bg-white rounded shadow p-2 lg:p-4 text-sm"
                    >
                        <p
                            class="mt-1 whitespace-nowrap"
                            v-for="key in Object.keys(admission)"
                            :key="key"
                        >
                            <span class="text-thick-theme-light uppercase font-semibold">{{ key.replaceAll('_', ' ') }} : </span> {{ admission[key] }}
                        </p>
                    </div>
                </div>
            </template>
            <template #footer>
                <div class="flex justify-end items-center">
                    <button
                        class="btn btn-bitter"
                        @click="confirm"
                        :disabled="!admission.hn"
                    >
                        {{ confirmLabel }}
                    </button>
                </div>
            </template>
        </Modal>
    </teleport>
</template>

<script>
import Modal from '@/Components/Helpers/Modal';
import FormInput from '@/Components/Controls/FormInput';
import SpinnerButton from '@/Components/Controls/SpinnerButton';
import { reactive, ref } from '@vue/reactivity';
import { nextTick } from '@vue/runtime-core';
export default {
    components: { FormInput, Modal, SpinnerButton },
    emits: ['confirmed'],
    props: {
        heading: { type: String, default: 'Search AN'},
        confirmLabel: { type: String, default: 'CONFIRM'}
    },
    setup (props, context) {
        const modal = ref(null);
        const anInput = ref(null);
        const an = ref('');
        const anError = ref('');
        const busy = ref(false);
        const admission = reactive({
            hn: '',
            name: '',
            gender: '',
            age: '',
            ward_admit: '',
            admitted_at: '',
        });

        const searchAn = () => {
            busy.value = true;
            anError.value = '';
            admission.hn = '';
            window.axios
                .get(window.route('resources.api.admissions.show', an.value))
                .then(response => {
                    if (! response.data.found) {
                        anError.value = response.data.message;
                        return;
                    }
                    admission.hn = response.data.hn;
                    admission.name = response.data.name;
                    admission.gender = response.data.gender;
                    admission.age = response.data.age;
                    admission.ward_admit = response.data.ward_admit;
                    admission.admitted_at = response.data.admitted_at;
                }).catch(error => {
                    console.log(error);
                }).finally(() => busy.value = false);
        };

        const resetAdmission = () => {
            an.value = '';
            anError.value = '';
            admission.hn = '';
        };

        const open = () => {
            modal.value.open();
            nextTick(() => anInput.value.focus());
        };

        const confirm = () => {
            modal.value.close();
            context.emit('confirmed', an.value);
        };

        return {
            modal,
            anInput,
            open,
            busy,
            an,
            anError,
            admission,
            searchAn,
            resetAdmission,
            confirm,
        };
    }
};
</script>