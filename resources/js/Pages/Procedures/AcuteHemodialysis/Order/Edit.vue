<template>
    <div class="md:pb-12">
        <h2
            class="form-label text-lg italic text-thick-theme-light"
            id="reservation"
        >
            Reservation data
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <FormInput
                v-model="form.reservation.hn"
                name="hn"
                label="hn"
                :readonly="true"
            />
            <FormInput
                v-model="form.reservation.an"
                name="an"
                label="an"
                :readonly="true"
            />
            <FormInput
                v-model="form.reservation.dialysis_at"
                name="dialysis_at"
                label="dialysis at"
                :readonly="true"
            />
            <FormInput
                v-model="form.dialysis_type"
                name="dialysis_type"
                label="dialysis type"
                :readonly="true"
            />
        </div>
        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="prescription"
        >
            Prescription
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
                <alert
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
            <FormSelect
                label="20% albumin prime 100 ml"
                v-model="form.albumin_20_percent_prime_100ml"
                name="albumin_20_percent_prime_100ml"
                :options="['Yes', 'No']"
            />
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
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <FormSelect
                label="inotrope"
                v-model="form.inotrope"
                name="inotrope"
                :options="['Yes', 'No']"
            />
            <FormSelect
                label="o2 rx"
                v-model="form.o2_rx"
                name="o2_rx"
                :options="configs.o2_rx_options"
            />
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <label class="form-label">monitoring :</label>
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <FormCheckbox
                v-for="(monitor, key) in configs.monitors"
                :key="key"
                :label="monitor.label"
                :name="monitor.name"
                v-model="form.monitor[monitor.name]"
            />
            <FormInput
                label="other"
                name="monitoring_other"
                v-model="form.monitor.other"
            />
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <FormInput
            class="mt-2 md:bt-4 xl:mt-8"
            label="spacial order"
            name="spacial_order"
            v-model="form.spacial_order"
        />
        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="pre-dialysis-labs-request"
        >
            Pre-Dialysis Labs Request
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <div
            v-for="(labSet, key) in configs.lab_sets"
            :key="key"
        >
            <label
                class="form-label mb-2 md:mb-4 xl:mb-8"
                v-if="labSet.name"
            ><span class=" italic font-extralight text-dark-theme-light">{{ labSet.name }}</span></label>
            <div class="grid grid-cols-2 gap-2 md:gap-4 xl:gap-8 xl:grid-cols-4">
                <FormCheckbox
                    v-for="(lab, index) in labSet.labs"
                    :key="index"
                    :label="lab"
                    :name="lab"
                    v-model="form.labs[lab.replaceAll(' ', '_').toLowerCase()]"
                />
            </div>
            <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        </div>
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <FormInput
                label="crossmatch"
                name="lab_crossmatch"
                placeholder="please specify"
                v-model="form.labs.crossmatch"
            />
            <FormInput
                label="other"
                name="lab_other"
                v-model="form.labs.other"
            />
        </div>
        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="pre-dialysis-treatments-request"
        >
            Pre-Dialysis Treatments Request
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <FormInput
            class="mt-2 md:bt-4 xl:mt-8"
            name="pre_treatments"
            v-model="form.pre_treatments"
        />
        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="post-dialysis-treatments-request"
        >
            post-Dialysis Treatments Request
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <div v-if="form.access_type == 'Perm cath' || form.access_type == 'DLC'">
            <label class="form-label">DLC/PC lock solution</label>
            <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
                <FormInput
                    label="heparin"
                    name="post_treatment_heparin"
                    v-model="form.post_treatments.heparin"
                />
                <FormInput
                    label="heparin dose"
                    name="post_treatment_heparin_dose"
                    v-model="form.post_treatments.heparin_dose"
                />
                <FormInput
                    label="citrate"
                    name="post_treatment_citrate"
                    v-model="form.post_treatments.citrate"
                />
                <FormInput
                    label="citrate dose"
                    name="post_treatment_citrate_dose"
                    v-model="form.post_treatments.citrate_dose"
                />
                <FormInput
                    label="antibiotic"
                    name="post_treatment_antibiotic"
                    v-model="form.post_treatments.antibiotic"
                />
                <FormInput
                    label="antibiotic dose"
                    name="post_treatment_antibiotic_dose"
                    v-model="form.post_treatments.antibiotic_dose"
                />
            </div>
            <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        </div>
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <FormInput
                label="ESA"
                name="post_treatment_ESA"
                v-model="form.post_treatments.esa"
            />
            <FormInput
                label="ESA dose"
                name="post_treatment_ESA_dose"
                v-model="form.post_treatments.esa_dose"
            />
            <FormInput
                label="Iron iv"
                name="post_treatment_iron_iv"
                v-model="form.post_treatments.iron_iv"
            />
            <FormInput
                label="Iron iv dose"
                name="post_treatment_iron_iv_dose"
                v-model="form.post_treatments.iron_iv_dose"
            />
        </div>
    </div>
</template>

<script>
import FormCheckbox from '@/Components/Controls/FormCheckbox.vue';
import FormInput from '@/Components/Controls/FormInput.vue';
import FormSelect from '@/Components/Controls/FormSelect.vue';
import Layout from '@/Components/Layouts/Layout.vue';
import Alert from '@/Components/Helpers/Alert.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { reactive } from '@vue/reactivity';
import debounce from 'lodash/debounce';
import { watch } from '@vue/runtime-core';
export default {
    layout: Layout,
    props: {
        orderForm: { type: Object, required: true },
        formConfigs: { type: Object, required: true },
    },
    components: {
        FormCheckbox,
        FormInput,
        FormSelect,
        Alert,
        Link,
    },
    setup (props) {
        const form = useForm({...props.orderForm});
        const reset = {
            anticoagulant: null
        };
        const patchEndpoint = window.route('procedures.acute-hemodialysis.orders.update', form.record.slug);
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

                let data = val.data();
                delete data.reservation;
                delete data.record;
                autosave(patchEndpoint, data);
            },
            { deep: true }
        );
        const autosave = debounce(function (url, data) {
            window.axios
                .patch(url, data)
                .catch(error => {
                    console.log(error);
                });
        }, 2000);

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

        return {
            form,
            errors,
            validate,
            configs,
        };
    }
};
</script>