<template>
    <h2
        class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
        id="prescription"
    >
        TPE Prescription
    </h2>
    <hr class="my-4 border-b border-bitter-theme-light">
    <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
        <FormSelect
            label="access type"
            v-model="form.access_type"
            name="access_type"
            :options="configs.access_types"
        />
        <FormSelect
            label="access site coagulant"
            v-model="form.access_site_coagulant"
            name="access_site_coagulant"
            :options="(form.access_type && form.access_type.startsWith('AV')) ? configs.av_access_sites : configs.non_av_access_sites"
            :disabled="!form.access_type"
        />
        <FormSelect
            v-model="form.dialyzer"
            name="dialyzer"
            label="dialyzer"
            :options="configs.tpe_dialyzers"
        />
    </div>
</template>

<script setup>
import FormCheckbox from '@/Components/Controls/FormCheckbox';
import FormInput from '@/Components/Controls/FormInput';
import FormSelect from '@/Components/Controls/FormSelect';
import FormRadio from '@/Components/Controls/FormRadio';
import Alert from '@/Components/Helpers/Alert';
import { reactive } from '@vue/reactivity';
import { watch } from '@vue/runtime-core';

const props = defineProps({
    modelValue: { type: Object, required: true },
    formConfigs: { type: Object, required: true },
});
const emit = defineEmits(['update:modelValue', 'autosave']);

const form = reactive({...props.modelValue});
const reset = {
    anticoagulant: null
};

watch (
    () => form,
    (val) => {
        if (val.anticoagulant !== reset.anticoagulant) {
            val.anticoagulant_none_drip_via_peripheral_iv = false;
            val.anticoagulant_none_nss_200ml_flush_q_hour = false;
            val.heparin_loading_dose = null;
            val.heparin_maintenance_dose = null;
            val.enoxaparin_dose = null;
            val.fondaparinux_bolus_dose = null;
            val.tinzaparin_dose = null;
            val.anticoagulant_other = null;
            reset.anticoagulant = val.anticoagulant;
        }

        emit('update:modelValue', val);
        emit('autosave');
    },
    { deep: true }
);

// const errors = reactive({
//     heparin_loading_dose: null,
//     heparin_maintenance_dose: null,
//     enoxaparin_dose: null,
//     tinzaparin_dose: null,
//     ultrafiltration: null,
//     glucose_50_percent_iv_volume: null,
// });
// const validate = (fieldname) => {
//     let validator = configs.validators.filter((rule) => rule.name === fieldname)[0];
//     const value = validator.type == 'integer' ? parseInt(form[fieldname]) :  parseFloat(form[fieldname]);
//     if (value < validator.min || value > validator.max) {
//         errors[fieldname] = `${form[fieldname]} could not be saved. Accept range [${validator.min}, ${validator.max}].`;
//         setTimeout(() => form[fieldname] = null, 1500);
//     } else {
//         errors[fieldname] = '';
//     }
// };

const configs = reactive({...props.formConfigs});
</script>