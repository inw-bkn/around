<template>
    <div class="md:pb-12">
        <h2
            class="form-label text-lg italic text-thick-theme-light"
            id="case-record"
        >
            Case record
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <div class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8">
            <FormInput
                label="hn"
                :readonly="true"
                name="encountered_at_text"
                v-model="form.record.hn"
            />
            <FormInput
                label="an"
                :readonly="true"
                name="encountered_at_text"
                v-model="form.admission.an"
                placeholder="No active admission"
            />
            <FormInput
                label="first dialysis on"
                :readonly="true"
                name="first_dialysis_at"
                v-model="dateFirstDialysis"
            />
            <FormInput
                label="last dialysis on"
                :readonly="true"
                name="last_dialysis_at"
                v-model="form.last_dialysis_at"
            />
            <template v-if="form.admission.an">
                <FormInput
                    label="admitted on"
                    :readonly="true"
                    name="encountered_at_text"
                    v-model="form.admission.encountered_at_text"
                />
                <FormInput
                    label="discharged on"
                    :readonly="true"
                    name="dismissed_at_text"
                    v-model="form.admission.dismissed_at_text"
                />
                <FormInput
                    label="ward admit"
                    :readonly="true"
                    name="ward_admit"
                    v-model="form.admission.place_name"
                />
                <FormAutocomplete
                    label="ward discharge"
                    :endpoint="route('resources.api.wards')"
                    v-model="form.ward_discharge"
                    name="ward_discharge"
                />
            </template>
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Outcome :
        </h3>
        <div class="grid gap-2 md:grid-cols-2 md:gap-4 xl:gap-6">
            <div>
                <FormRadio
                    label="renal outcome"
                    name="renal_outcome"
                    v-model="form.renal_outcome"
                    :options="['Recovery', 'ESRD', 'KT']"
                />
                <transition name="slide-fade">
                    <FormInput
                        v-if="form.renal_outcome === 'Recovery'"
                        label="last creatinine before discharge"
                        class="mt-2 md:mt-t xl:mt-6"
                        name="cr_before_discharge"
                        v-model="form.cr_before_discharge"
                    />
                </transition>
            </div>
            <div>
                <FormRadio
                    label="patient outcome"
                    name="patient_outcome"
                    v-model="form.patient_outcome"
                    :options="['Alive', 'Dead']"
                />
                <transition name="slide-fade">
                    <FormInput
                        v-if="form.patient_outcome === 'Dead'"
                        label="cause of dead"
                        class="mt-2 md:mt-t xl:mt-6"
                        name="cause_of_dead"
                        v-model="form.cause_of_dead"
                    />
                </transition>
            </div>
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">

        <!-- previous crrt -->
        <FormCheckbox
            class="mt-4 md:mb-4 md:mt-8 xl:mt-16"
            label="Previous crrt"
            v-model="form.previous_crrt"
            :toggler="true"
        />
        <transition name="slide-fade">
            <div
                class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8"
                v-if="form.previous_crrt"
            >
                <FormDatetime
                    label="date start crrt"
                    name="date_start_crrt"
                    v-model="form.date_start_crrt"
                />
                <FormDatetime
                    label="date end crrt"
                    name="date_end_crrt"
                    v-model="form.date_end_crrt"
                />
            </div>
        </transition>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Renal diagnosis :
        </h3>
        <FormRadio
            class="sm:grid grid-cols-2 gap-x-2 lg:grid-cols-4"
            name="renal_diagnosis"
            v-model="form.renal_diagnosis"
            :options="configs.renal_diagnosis"
        />
        <!-- <div class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8">
        </div> -->
        <!-- <div class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8">
            <div>
                <FormCheckbox
                    class="mt-2 md:mt-4 -mb-1"
                    label="AKI"
                    v-model="form.renal_diagnosis_aki.check"
                    :toggler="true"
                />
                <transition name="slide-fade">
                    <div
                        v-if="form.renal_diagnosis_aki.check"
                        class="ml-2 pl-2 pt-2 md:pt-4 border-l-2 border-bitter-theme-light"
                    >
                        <div class="grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                            <FormCheckbox
                                v-for="(diag, key) in configs.renal_diagnosis_aki"
                                :key="key"
                                :name="diag.name"
                                :label="diag.label"
                                v-model="form.renal_diagnosis_aki[diag.name]"
                            />
                        </div>
                        <FormInput
                            class="mt-2 md:mt-4 xl:mt-6"
                            name="renal_diagnosis_aki_other"
                            label="Other AKI diagnosis"
                            v-model="form.renal_diagnosis_aki.other"
                        />
                    </div>
                </transition>
            </div>
            <div>
                <FormCheckbox
                    class="mt-2 md:mt-4 -mb-1"
                    label="CKD"
                    v-model="form.renal_diagnosis_ckd.check"
                    :toggler="true"
                />
                <transition name="slide-fade">
                    <div
                        v-if="form.renal_diagnosis_ckd.check"
                        class="ml-2 pl-2 pt-2 md:pt-4 border-l-2 border-bitter-theme-light"
                    >
                        <div class="grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                            <FormCheckbox
                                v-for="(diag, key) in configs.renal_diagnosis_ckd"
                                :key="key"
                                :name="diag.name"
                                :label="diag.label"
                                v-model="form.renal_diagnosis_ckd[diag.name]"
                            />
                        </div>
                        <FormInput
                            class="mt-2 md:mt-4 xl:mt-6"
                            name="CKD_other"
                            label="Other CKD diagnosis"
                            v-model="form.renal_diagnosis_ckd.other"
                        />
                    </div>
                </transition>
            </div>
        </div> -->
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">

        <template v-if="form.admission.an">
            <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
                admission diagnosis :
            </h3>
            <FormInput
                name="admission_diagnosis"
                v-model="form.admission_diagnosis"
            />
            <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        </template>

        <!-- comorbid and indication -->
        <div class="sm:hidden">
            <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
                Comorbidities :
            </h3>
            <div class="mt-2 md:mt-4 xl:mt-6 grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                <FormCheckbox
                    v-for="(disease, key) in configs.comorbidities"
                    :key="key"
                    :name="disease.name"
                    :label="disease.label"
                    v-model="form.comorbidities[disease.name]"
                />
            </div>
            <FormInput
                class="mt-2 md:mt-4 xl:mt-6 h-auto"
                name="comorbidities_other"
                label="Other comorbidities"
                v-model="form.comorbidities.other"
            />
            <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
                Indication for dialysis :
            </h3>
            <div class="mt-2 md:mt-4 xl:mt-6 grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                <FormCheckbox
                    v-for="(disease, key) in configs.indications"
                    :key="key"
                    :name="disease.name"
                    :label="disease.label"
                    v-model="form.indications[disease.name]"
                />
            </div>
            <FormInput
                class="mt-2 md:mt-4 xl:mt-6 h-auto"
                name="indications_other"
                label="Other indications"
                v-model="form.indications.other"
            />
        </div>
        <div class="hidden sm:grid grid-cols-2 gap-2">
            <div>
                <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
                    Comorbidities :
                </h3>
                <div class="mt-2 md:mt-4 xl:mt-6 grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                    <FormCheckbox
                        v-for="(disease, key) in configs.comorbidities"
                        :key="key"
                        :name="disease.name"
                        :label="disease.label"
                        v-model="form.comorbidities[disease.name]"
                    />
                </div>
            </div>
            <div>
                <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
                    Indication for dialysis :
                </h3>
                <div class="mt-2 md:mt-4 xl:mt-6 grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                    <FormCheckbox
                        v-for="(disease, key) in configs.indications"
                        :key="key"
                        :name="disease.name"
                        :label="disease.label"
                        v-model="form.indications[disease.name]"
                    />
                </div>
            </div>
            <FormInput
                class="mt-2 md:mt-4 xl:mt-6 h-auto"
                name="comorbidities_other"
                label="Other comorbidities"
                v-model="form.comorbidities.other"
            />
            <FormInput
                class="mt-2 md:mt-4 xl:mt-6 h-auto"
                name="indications_other"
                label="Other indications"
                v-model="form.indications.other"
            />
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Serology :
        </h3>
        <div class="grid gap-2 md:grid-cols-2 md:gap-4 xl:gap-6">
            <div>
                <label class="form-label">HBs Ag</label>
                <FormRadio
                    class="grid lg:grid-cols-2 gap-x-2"
                    name="hbs_ag"
                    v-model="form.hbs_ag"
                    :options="['Positive', 'Intermediate', 'Negative']"
                />
            </div>
            <FormDatetime
                label="date HBs Ag"
                name="date_hbs_ag"
                v-model="form.date_hbs_ag"
            />
            <div>
                <label class="form-label">anti hcv</label>
                <FormRadio
                    class="grid lg:grid-cols-2 gap-x-2"
                    name="anti_hcv"
                    v-model="form.anti_hcv"
                    :options="['Positive', 'Intermediate', 'Negative']"
                />
            </div>
            <FormDatetime
                label="date anti hcv"
                name="date_anti_hcv"
                v-model="form.date_anti_hcv"
            />
            <div>
                <label class="form-label">anti HIV</label>
                <FormRadio
                    class="grid lg:grid-cols-2 gap-x-2"
                    name="anti_hiv"
                    v-model="form.anti_hiv"
                    :options="['Positive', 'Intermediate', 'Negative']"
                />
            </div>
            <FormDatetime
                label="date anti HIV"
                name="date_anti_hiv"
                v-model="form.date_anti_hiv"
            />
        </div>

        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <!-- consent signed -->
        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Consent :
        </h3>
        <ImageUploader
            label="๏ opd consent form"
            name="opd_consent_form"
            v-model="form.opd_consent_form"
        />
        <template v-if="form.admission.an">
            <ImageUploader
                label="๏ ipd consent form"
                name="ipd_consent_form"
                v-model="form.ipd_consent_form"
            />
            <FormCheckbox
                label="Same consent form"
                name="same_consent_form"
                v-model="form.same_consent_form"
                :toggler="true"
            />
        </template>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Medical scheme :
        </h3>
        <FormRadio
            name="insurance"
            class="md:grid grid-cols-2 gap-2"
            v-model="form.insurance"
            :options="configs.insurances"
            :allow-other="true"
            ref="insurance"
        />

        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="orders"
        >
            Orders
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <Orders :orders="orders" />

        <h2
            class="mt-6 md:mt-12 xl:mt-24 form-label italic text-xl text-thick-theme-light"
            id="reservation"
        >
            Reservation
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">

        <div class="md:grid grid-cols-2 gap-2 lg:gap-6">
            <FormAutocomplete
                label="dialysis at"
                name="dialysis_at"
                v-model="order.dialysis_at"
                :endpoint="route('resources.api.wards')"
                :error="order.errors.dialysis_at"
            />
            <FormAutocomplete
                label="attending"
                name="attending_staff"
                v-model="order.attending_staff"
                :endpoint="route('resources.api.staffs')"
                :params="'&division_id=4'"
                :error="order.errors.attending_staff"
            />
            <FormSelect
                label="dialysis type"
                name="order_dialysis_type"
                v-model="order.dialysis_type"
                :options="configs.dialysis_types"
            />
            <div>
                <label class="form-label">patient type</label>
                <FormRadio
                    class="grid grid-cols-2 gap-x-2"
                    name="patient_type"
                    v-model="order.patient_type"
                    :options="['Acute', 'Chronic']"
                    ref="patientTypeInput"
                />
            </div>
        </div>
        <div class="md:grid grid-cols-2 gap-2 lg:gap-6">
            <FormDatetime
                label="required date"
                name="date_note"
                v-model="order.date_note"
                :options="{ enable: configs.availableDates, onDayCreate: onDayCreate, inline: true }"
            />
            <Slots
                :reserved-slots="reservedSlots"
                v-if="order.date_note"
            />
        </div>
        <div class="mt-2 lg:mt-0 md:pt-4">
            <SpinnerButton
                class="block w-full text-center btn btn-bitter"
                @click="reserve"
                :spin="order.processing"
                :disabled="reserveButtonDisable"
            >
                RESERVE
            </SpinnerButton>
        </div>
    </div>
    <FormSelectOther
        :placeholder="selectOther.placeholder"
        ref="selectOtherInput"
        @closed="selectOtherClosed"
    />
</template>

<script setup>
import FormAutocomplete from '@/Components/Controls/FormAutocomplete';
import FormSelect from '@/Components/Controls/FormSelect';
import FormDatetime from '@/Components/Controls/FormDatetime';
import FormInput from '@/Components/Controls/FormInput';
import FormCheckbox from '@/Components/Controls/FormCheckbox';
import FormRadio from '@/Components/Controls/FormRadio';
import FormSelectOther from '@/Components/Controls/FormSelectOther';
import SpinnerButton from '@/Components/Controls/SpinnerButton';
import ImageUploader from '@/Components/Controls/ImageUploader';
import Slots from '@/Components/Helpers/AcuteHemodialysis/Slots';
import Orders from '@/Components/Helpers/AcuteHemodialysis/Orders';
import { useForm } from '@inertiajs/inertia-vue3';
import { reactive, ref } from '@vue/reactivity';
import { computed, watch } from '@vue/runtime-core';
import debounce from 'lodash/debounce';

const props = defineProps({
    caseRecordForm: { type: Object, required: true },
    orders: { type: Array, required: true },
    formConfigs: { type: Object, required: true }
});

const form = useForm({...props.caseRecordForm});

const reset = {
    previous_crrt: true,
    // renal_diagnosis_aki: true,
    // renal_diagnosis_ckd: true
};
watch (
    () => form,
    (val) => {
        if (!val.previous_crrt && !reset.previous_crrt) {
            val.date_start_crrt = null;
            val.date_end_crrt = null;
            reset.previous_crrt = true;
        } else if (val.previous_crrt) {
            reset.previous_crrt = false;
        }

        // if (!val.renal_diagnosis_aki.check && !reset.renal_diagnosis_aki) {
        //     val.renal_diagnosis_aki.sepsis = false;
        //     val.renal_diagnosis_aki.chf = false;
        //     val.renal_diagnosis_aki.acs = false;
        //     val.renal_diagnosis_aki.other_cardiac_cause = false;
        //     val.renal_diagnosis_aki.glomerulonephritis = false;
        //     val.renal_diagnosis_aki.acute_interstitial_nephritis = false;
        //     val.renal_diagnosis_aki.contrast_induced_nephropathy = false;
        //     val.renal_diagnosis_aki.acute_tubular_necrosis = false;
        //     val.renal_diagnosis_aki.drug_induced_aki = false;
        //     val.renal_diagnosis_aki.other = null;
        //     reset.renal_diagnosis_aki = true;
        // } else if (val.renal_diagnosis_aki.check) {
        //     reset.renal_diagnosis_aki = false;
        // }

        // if (!val.renal_diagnosis_ckd.check && !reset.renal_diagnosis_ckd) {
        //     val.renal_diagnosis_ckd.check = false;
        //     val.renal_diagnosis_ckd.dn = false;
        //     val.renal_diagnosis_ckd.ht = false;
        //     val.renal_diagnosis_ckd.glomerular_disease = false;
        //     val.renal_diagnosis_ckd.chronic_tubulointerstitial_nephritis = false;
        //     val.renal_diagnosis_ckd.other = null;
        // } else if (val.renal_diagnosis_ckd.check) {
        //     reset.renal_diagnosis_ckd = false;
        // }

        let data = val.data();
        delete data.admission;
        delete data.record;
        autosave(window.route('procedures.acute-hemodialysis.update', form.record.slug), data);
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

const order = useForm({
    dialysis_type: null,
    dialysis_at: null,
    attending_staff: null,
    date_note: null,
    patient_type: null,
    case_record_id: form.record.id,
    patient_id: form.record.patient_id,
});
const patientTypeInput = ref(null);

const configs = reactive({...props.formConfigs});

const dateFirstDialysis = ref(props.orders.length ? props.orders[0].date_note : null);

const insurance = ref(null);
if (form.insurance && !configs.insurances.includes(form.insurance)) {
    configs.insurances.push(form.insurance);
}
watch (
    () => form.insurance,
    (val) => {
        if (val !== 'other') {
            return;
        }

        selectOther.placeholder = 'Other Insurance';
        selectOther.configs = 'insurances';
        selectOther.input = insurance.value;
        selectOtherInput.value.open();
    }
);

const selectOtherInput = ref(null);
const selectOther = reactive({
    placeholder: '',
    configs: '',
    input: '',
});
const selectOtherClosed = (val) => {
    if (! val) {
        selectOther.input.setOther('');
        return;
    }

    configs[selectOther.configs].push(val);
    selectOther.input.setOther(val);
};

const onDayCreate = (dObj, dStr, fp, dayElem) => {
    if (!configs.disableDates.length) return;
    for (let i = 0; i < configs.disableDates.length; i++) {
        if (dayElem.getAttribute('aria-label') == configs.disableDates[i]) {
            dayElem.innerHTML += '<span class="calendar-event busy"></span>';
        }
    }
};
watch (
    () => order.date_note,
    (val) => {
        window.axios
            .get(window.route('resources.api.acute-hemodialysis-slot-available', val))
            .then(response => {
                reservedSlots.value = response.data;
            });
    }
);

watch (
    () => order.dialysis_type,
    () => {
        if (!order.patient_type && (form.indications.initiate_chronic_hd || form.indications.maintain_chronic_hd)) {
            patientTypeInput.value.setOther('Chronic');
        }
    }
);

const reservedSlots = ref([]);
const reserveButtonDisable = computed(() => {
    return !order.dialysis_at || !order.date_note || !order.dialysis_type || !order.patient_type || !order.attending_staff;
});

const reserve = () => {
    order.post(window.route('procedures.acute-hemodialysis.orders.store'), {
        preserveScroll: true,
        onFinish: () => order.processing = false,
    });
};
</script>