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
    <hr class="border border-dashed my-2 md:my-4 xl:my-8">
    <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
        <FormSelect
            v-model="form.replacement_fluid_albumin"
            name="replacement_fluid_albumin"
            label="albumin"
            :options="configs.albumin"
        />
        <FormInput
            v-model="form.replacement_fluid_albumin_volume"
            type="tel"
            name="replacement_fluid_albumin_volume"
            label="albumin volume (ml)"
        />
        <FormInput
            v-model="form.replacement_fluid_ffp_volume"
            type="tel"
            name="replacement_fluid_ffp_volume"
            label="ffp volume (ml)"
        />
    </div>
    <Alert
        class="my-2 md:my-4 xl:my-8"
        title="Volume of exchange (l)"
        message="[1.5-2.0] EPV, EPV = 0.065 x weight (kg) x (1-hct)."
    />
    <hr class="border border-dashed my-2 md:my-4 xl:my-8">
    <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
        <FormInput
            v-model="form.blood_pumb"
            type="tel"
            name="blood_pumb"
            label="blood pumb (ml/min)"
        />
        <FormInput
            v-model="form.filtration_pumb"
            type="tel"
            name="filtration_pumb"
            label="filtration pumb (%)"
        />
        <FormInput
            v-model="form.replacement_pumb"
            type="tel"
            name="replacement_pumb"
            label="replacement pumb (%)"
        />
        <FormInput
            v-model="form.drain_pumb"
            type="tel"
            name="drain_pumb"
            label="drain pumb (%)"
        />
        <FormInput
            v-model="form.dialysate_temperature"
            type="number"
            name="dialysate_temperature"
            label="dialysate temperature (℃)"
        />
    </div>
    <hr class="border border-dashed my-2 md:my-4 xl:my-8">
    <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
        <FormInput
            v-model="form.calcium_gluconate_10_percent_volume"
            type="tel"
            name="calcium_gluconate_10_percent_volume"
            label="10% calcium gluconate volume (ml)"
        />
        <FormInput
            v-model="form.calcium_gluconate_10_percent_timing"
            type="number"
            name="calcium_gluconate_10_percent_timing"
            label="10% calcium gluconate timing (at hour)"
        />
    </div>
    <hr class="border border-dashed my-2 md:my-4 xl:my-8">
    <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8">
        <FormSelect
            v-model="form.anticoagulant"
            name="anticoagulant"
            label="anticoagulant"
            :options="configs.anticoagulants"
        />
    </div>
    <transition name="slide-fade">
        <div
            class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"
            v-if="form.anticoagulant == 'None'"
        >
            <FormCheckbox
                label="anticoagulant drip via peripheral IV"
                name="anticoagulant_none_drip_via_peripheral_iv"
                v-model="form.anticoagulant_none_drip_via_peripheral_iv"
            />
            <FormCheckbox
                label="NSS 200 ml flush q 1 hour"
                name="anticoagulant_none_nss_200ml_flush_q_hour"
                v-model="form.anticoagulant_none_nss_200ml_flush_q_hour"
            />
        </div>
        <div v-else-if="form.anticoagulant == 'Heparin'">
            <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8">
                <FormInput
                    label="loading dose (iu)"
                    name="heparin_loading_dose"
                    v-model="form.heparin_loading_dose"
                    type="number"
                    pattern="\d*"
                    @autosave="validate('heparin_loading_dose')"
                    :error="errors.heparin_loading_dose"
                    placeholder="[250, 2000] IU"
                />
                <FormInput
                    label="maintenance dose (iu/hour)"
                    name="heparin_maintenance_dose"
                    v-model="form.heparin_maintenance_dose"
                    type="number"
                    pattern="\d*"
                    @autosave="validate('heparin_maintenance_dose')"
                    :error="errors.heparin_maintenance_dose"
                    placeholder="[0, 1500] IU/Hour"
                />
            </div>
            <Alert
                title="Duration of maintenance (hours)"
                message="DLC/PC uses duration of dialysis. AVF/AVG uses duration of dialysis - 1."
            />
        </div>
        <div
            class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"
            v-else-if="form.anticoagulant == 'Enoxaparin'"
        >
            <FormInput
                label="dose (ml)"
                name="enoxaparin_dose"
                v-model="form.enoxaparin_dose"
                type="number"
                @autosave="validate('enoxaparin_dose')"
                :error="errors.enoxaparin_dose"
                placeholder="[0.3, 0.8] ml"
            />
        </div>
        <div
            class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"
            v-else-if="form.anticoagulant == 'Fondaparinux'"
        >
            <FormSelect
                label="bolus dose (iu)"
                name="fondaparinux_bolus_dose"
                v-model="form.fondaparinux_bolus_dose"
                :options="['500', '750']"
            />
        </div>
        <div
            class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"
            v-else-if="form.anticoagulant == 'Tinzaparin'"
        >
            <FormInput
                label="dose (iu)"
                name="tinzaparin_dose"
                v-model="form.tinzaparin_dose"
                type="number"
                pattern="\d*"
                @autosave="validate('tinzaparin_dose')"
                :error="errors.tinzaparin_dose"
                placeholder="[1500, 3500] IU"
            />
        </div>
        <div
            class="grid gap-2 md:gap-4 xl:gap-8 my-2 md:my-4 xl:my-8"
            v-else-if="form.anticoagulant == 'Other'"
        >
            <FormInput
                name="anticoagulant_other"
                v-model="form.anticoagulant_other"
                placeholder="please specify"
            />
        </div>
    </transition>
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

const errors = reactive({
    heparin_loading_dose: null,
    heparin_maintenance_dose: null,
    enoxaparin_dose: null,
    tinzaparin_dose: null,
    ultrafiltration: null,
    glucose_50_percent_iv_volume: null,
});
const validate = (fieldname) => {
    let validator = configs.validators.filter((rule) => rule.name === fieldname)[0];
    const value = validator.type == 'integer' ? parseInt(form[fieldname]) :  parseFloat(form[fieldname]);
    if (value < validator.min || value > validator.max) {
        errors[fieldname] = `${form[fieldname]} could not be saved. Accept range [${validator.min}, ${validator.max}].`;
        setTimeout(() => form[fieldname] = null, 1500);
    } else {
        errors[fieldname] = '';
    }
};

const configs = reactive({...props.formConfigs});
</script>