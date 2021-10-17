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

        <HD
            v-if="orderForm.hd !== undefined"
            v-model="form.hd"
            :form-configs="formConfigs"
            @autosave="autosave"
        />
        <HF
            v-if="orderForm.hf !== undefined"
            v-model="form.hf"
            :form-configs="formConfigs"
            @autosave="autosave"
        />
        <SLEDD
            v-if="orderForm.sledd !== undefined"
            v-model="form.sledd"
            :form-configs="formConfigs"
            @autosave="autosave"
        />

        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <FormInput
            class="mt-2 md:bt-4 xl:mt-8"
            label="special order"
            name="special_order"
            v-model="form.special_order"
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

<script setup>
import HD from '@/Components/Forms/AcuteHD/HD';
import HF from '@/Components/Forms/AcuteHD/HF';
import SLEDD from '@/Components/Forms/AcuteHD/SLEDD';
import FormInput from '@/Components/Controls/FormInput';
import FormCheckbox from '@/Components/Controls/FormCheckbox';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import debounce from 'lodash/debounce';

const props = defineProps({
    orderForm: { type: Object, required: true },
    formConfigs: { type: Object, required: true },
});
const form = useForm({...props.orderForm});
watch (
    () => form,
    () => {
        autosave();
    },
    { deep: true }
);
const patchEndpoint = window.route('procedures.acute-hemodialysis.orders.update', form.record.slug);
const autosave = debounce(function () {
    window.axios
        .patch(patchEndpoint, form.data())
        .catch(error => {
            console.log(error);
        });
}, 2000);
const configs = reactive({...props.formConfigs});
</script>
<script>
import Layout from '@/Components/Layouts/Layout';
import { reactive } from '@vue/reactivity';
import { watch } from '@vue/runtime-core';
export default { layout: Layout };
</script>