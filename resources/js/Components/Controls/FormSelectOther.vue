<template>
    <teleport to="body">
        <Modal
            ref="modal"
            width-mode="form-cols-1"
            @opened="$refs.otherItemInput.focus()"
            @closed="$emit('closed', otherItemModel)"
        >
            <template #header>
                <div class="font-semibold text-dark-theme-light">
                    {{ placeholder }}
                </div>
            </template>
            <template #body>
                <div class="py-4 my-2 md:py-6 md:my-4 border-t border-b border-bitter-theme-light">
                    <FormInput
                        v-model="otherItemModel"
                        name="otherItemModel"
                        ref="otherItemInput"
                    />
                </div>
            </template>
            <template #footer>
                <div class="flex justify-end items-center">
                    <button
                        class="btn btn-dark px-5"
                        @click="$refs.modal.close()"
                        :disabled="!otherItemModel"
                    >
                        Add
                    </button>
                </div>
            </template>
        </Modal>
    </teleport>
</template>

<script>
import FormInput from '@/Components/Controls/FormInput';
import Modal from '@/Components/Helpers/Modal';
import { ref } from '@vue/reactivity';
export default {
    emits: ['closed'],
    components: { FormInput, Modal },
    props: {
        placeholder: { type: String, default: 'โปรดระบุ' },
    },
    setup () {
        const otherItemInput = ref(null);
        const otherItemModel = ref('');
        const modal = ref(null);
        const open = () => {
            modal.value.open();
        };

        return {
            otherItemInput,
            otherItemModel,
            modal,
            open
        };
    }
};
</script>