<template>
    <template v-if="form.hf !== undefined">
        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="prescription"
        >
            HF Prescription
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <div>
                <label class="form-label">perform at</label>
                <FormRadio
                    class="grid grid-cols-2 gap-x-2"
                    name="with_hf"
                    v-model="form.hf.perform_at"
                    :options="['Pre HD', 'Post HD']"
                />
            </div>
            <FormInput
                pattern="\d*"
                label="uf (ml.)"
                v-model="form.hf.ultrafiltration"
                name="ultrafiltration_hf"
                type="number"
                @autosave="validate('ultrafiltration_hf')"
                :error="errors.ultrafiltration_hf"
                placeholder="[0, 4000] ml"
            />
        </div>
    </template>
    <h2
        class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
        id="prescription"
    >
        HD Prescription
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
            :options="configs.dialyzers"
        />
        <FormSelect
            v-model="form.dialysate"
            name="dialysate"
            label="dialysate"
            :options="configs.dialysates"
        />
        <FormInput
            v-model:model-value="form.dialysate_flow"
            v-model:model-checkbox="form.reverse_flow"
            type="number"
            pattern="\d*"
            name="dialysate_flow"
            label="dialysate flow (ml/min)"
            switch-label="Reverse flow"
        />
        <FormInput
            v-model="form.blood_flow"
            type="number"
            pattern="\d*"
            name="blood_flow"
            label="blood flow (ml/min)"
        />
        <FormInput
            v-model="form.dialysate_temperature"
            type="number"
            name="dialysate_temperature"
            label="dialysate temperature (℃)"
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
    <hr class="border border-dashed my-2 md:my-4 xl:my-8">
    <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
        <FormInput
            pattern="\d*"
            label="uf (ml.)"
            v-model="form.ultrafiltration"
            name="ultrafiltration"
            type="number"
            @autosave="validate('ultrafiltration')"
            :error="errors.ultrafiltration"
            placeholder="[0, 4000] ml"
        />
        <FormInput
            label="dry weight (kg.)"
            v-model="form.dry_weight"
            name="dry_weight"
            type="number"
        />
        <FormInput
            label="50% Glucose IV volume (ml)"
            v-model="form.glucose_50_percent_iv_volume"
            name="glucose_50_percent_iv_volume"
            pattern="\d*"
            type="number"
            @autosave="validate('glucose_50_percent_iv_volume')"
            :error="errors.glucose_50_percent_iv_volume"
            placeholder="[50, 100] ml"
        />
        <FormSelect
            label="50% glucose iv at"
            v-model="form.glucose_50_percent_iv_at"
            name="glucose_50_percent_iv_at"
            :options="configs.iv_gluclose_options"
        />
        <div>
            <label class="form-label">20% albumin prime 100 ml</label>
            <FormRadio
                class="grid grid-cols-2 gap-x-2"
                name="albumin_20_percent_prime_100ml"
                v-model="form.albumin_20_percent_prime_100ml"
                :options="['Yes', 'No']"
            />
        </div>
        <FormInput
            label="nutrition iv type"
            v-model="form.nutrition_iv_type"
            name="nutrition_iv_type"
        />
        <FormInput
            label="nutrition iv volume (ml)"
            v-model="form.nutrition_iv_volume"
            name="nutrition_iv_volume"
            type="number"
            pattern="\d*"
        />
    </div>
    <hr class="border border-dashed my-2 md:my-4 xl:my-8">
    <label class="form-label">transfustion :</label>
    <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
        <FormInput
            label="prc volume (unit)"
            name="prc_volume"
            v-model="form.prc_volume"
            type="number"
        />
        <FormInput
            label="ffp volume (ml)"
            name="ffp_volume"
            v-model="form.ffp_volume"
            type="number"
            pattern="\d*"
        />
        <FormInput
            label="platelet volume (unit)"
            name="platelet_volume"
            v-model="form.platelet_volume"
            type="number"
        />
        <FormInput
            label="other"
            name="transfusion_other"
            v-model="form.transfusion_other"
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