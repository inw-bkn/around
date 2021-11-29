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
        <TPE
            v-if="orderForm.tpe !== undefined"
            v-model="form.tpe"
            :form-configs="formConfigs"
            @autosave="autosave"
        />

        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="predialysis๘evaluation"
        >
            predialysis evaluation
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <label class="form-label">hemodynamic :</label>
        <FormCheckbox
            name="hemodynamic_stable"
            v-model="form.predialysis_evaluations.hemodynamic_stable"
            label="Stable"
            :toggler="true"
        />
        <transition name="slide-fade">
            <div
                v-if="!form.predialysis_evaluations.hemodynamic_stable"
                class="mt-2 md:mt-4 xl:mt-8 space-y-2 md:space-y-4 lg:space-y-0 lg:grid grid-flow-col grid-cols-2 grid-rows-3 gap-4"
            >
                <FormCheckbox
                    v-for="symptom in configs.hemodynamic_symptoms"
                    :key="symptom.name"
                    name="hypotension"
                    v-model="form.predialysis_evaluations[symptom.name]"
                    :label="symptom.label"
                />
            </div>
        </transition>

        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <label class="form-label">Respiration :</label>
        <FormCheckbox
            name="respiration_stable"
            v-model="form.predialysis_evaluations.respiration_stable"
            label="Stable"
            :toggler="true"
        />
        <transition name="slide-fade">
            <div
                v-if="!form.predialysis_evaluations.respiration_stable"
                class="mt-2 md:mt-4 xl:mt-8 space-y-2 md:space-y-4 xl:space-y-4"
            >
                <FormCheckbox
                    v-for="symptom in configs.raspiration_options"
                    :key="symptom.name"
                    name="hypotension"
                    v-model="form.predialysis_evaluations[symptom.name]"
                    :label="symptom.label"
                />
            </div>
        </transition>

        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <label class="form-label">Oxygen support :</label>
        <FormSelect
            v-model="form.predialysis_evaluations.oxygen_support"
            name="oxygen_support"
            :options="configs.oxygen_options"
        />

        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <label class="form-label">Neurological evaluation :</label>
        <FormCheckbox
            name="neurological_stable"
            v-model="form.predialysis_evaluations.neurological_stable"
            label="Stable"
            :toggler="true"
        />
        <transition name="slide-fade">
            <div
                v-if="!form.predialysis_evaluations.neurological_stable"
                class="mt-2 md:mt-4 xl:mt-8 space-y-2 md:space-y-4 lg:space-y-0 lg:grid grid-flow-col grid-cols-2 grid-rows-1 gap-4"
            >
                <FormCheckbox
                    v-for="symptom in configs.neurological_options"
                    :key="symptom.name"
                    name="hypotension"
                    v-model="form.predialysis_evaluations[symptom.name]"
                    :label="symptom.label"
                />
            </div>
        </transition>

        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <label class="form-label">Life threatening condition in the past 24 hours :</label>
        <FormCheckbox
            name="life_threatening_condition"
            v-model="form.predialysis_evaluations.life_threatening_condition"
            label="Stable"
            :toggler="true"
        />
        <transition name="slide-fade">
            <div
                v-if="!form.predialysis_evaluations.life_threatening_condition"
                class="mt-2 md:mt-4 xl:mt-8 space-y-2 md:space-y-4 lg:space-y-0 lg:grid grid-flow-col grid-cols-2 grid-rows-3 gap-4"
            >
                <FormCheckbox
                    v-for="symptom in configs.life_threatening_condition_options"
                    :key="symptom.name"
                    name="hypotension"
                    v-model="form.predialysis_evaluations[symptom.name]"
                    :label="symptom.label"
                />
            </div>
        </transition>

        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="predialysis๘evaluation"
        >
            monitoring
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <FormCheckbox
            name="standard"
            v-model="form.monitor.standard"
            label="Standard (MAP ≥ 65 mmHg)"
            :toggler="true"
        />
        <transition name="slide-fade">
            <div v-if="!form.monitor.standard">
                <div class="mt-2 md:mt-4 xl:mt-8 space-y-2 md:space-y-4 lg:space-y-0 lg:grid grid-flow-col grid-cols-2 grid-rows-2 gap-4">
                    <FormCheckbox
                        v-for="(monitor, key) in configs.monitors"
                        :key="key"
                        :label="monitor.label"
                        :name="monitor.name"
                        v-model="form.monitor[monitor.name]"
                    />
                </div>
                <FormTextarea
                    class="mt-2 md:mt-4 xl:mt-8"
                    label="other"
                    placeholder="others..."
                    name="monitoring_other"
                    v-model="form.monitor.other"
                />
            </div>
        </transition>

        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="predialysis๘evaluation"
        >
            special orders
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <FormCheckbox
            class="mt-2 md:bt-4 xl:mt-8"
            name="predialysis_labs_request"
            v-model="form.predialysis_labs_request"
            label="Predialysis Labs request"
            :toggler="true"
        />
        <FormCheckbox
            class="mt-2 md:mt-4 xl:mt-8"
            name="postdialysis_esa"
            v-model="form.postdialysis_esa"
            label="Postdialysis ESA"
            :toggler="true"
        />
        <FormCheckbox
            class="mt-2 md:mt-4 xl:mt-8"
            name="predialysis_iron_iv"
            v-model="form.predialysis_iron_iv"
            label="Predialysis Iron IV"
            :toggler="true"
        />
        <FormTextarea
            class="mt-2 md:mt-4 xl:mt-8"
            label="treatments request"
            name="treatments_request"
            v-model="form.treatments_request"
        />
    </div>
</template>

<script setup>
import HD from '@/Components/Forms/AcuteHD/HD';
import HF from '@/Components/Forms/AcuteHD/HF';
import SLEDD from '@/Components/Forms/AcuteHD/SLEDD';
import TPE from '@/Components/Forms/AcuteHD/TPE';
import FormInput from '@/Components/Controls/FormInput';
import FormCheckbox from '@/Components/Controls/FormCheckbox';
import FormSelect from '@/Components/Controls/FormSelect';
import FormTextarea from '@/Components/Controls/FormTextarea';
import FormRadio from '@/Components/Controls/FormRadio';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { reactive } from '@vue/reactivity';
import { watch } from '@vue/runtime-core';
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
