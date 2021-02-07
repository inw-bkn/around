<template>
    <div class="md:pb-12">
        <h1 class="font-semibold text-2xl text-gray-400">
            <inertia-link
                class="text-bitter-theme-light"
                :href="`${$page.props.app.baseUrl}/prototypes/ProceduresIndex`"
            >
                Procedures /
            </inertia-link>
            <inertia-link
                class="text-dark-theme-light"
                :href="`${$page.props.app.baseUrl}/prototypes/AcuteHDIndex`"
            >
                Acute HD /
            </inertia-link>
            Adelbert Mohr
        </h1>
        <hr class="my-4 border-b-2 border-bitter-theme-light">
        <h2 class="form-label italic mt-6 md:mt-12 xl:mt-24">
            Case record
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <div class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8">
            <form-input
                label="admitted on"
                :readonly="true"
                name="admitted_at"
                v-model="caseRecord.admitted_at"
            />
            <form-input
                label="discharged on"
                :readonly="true"
                name="discharged_at"
                v-model="caseRecord.discharged_at"
            />
            <form-input
                label="first dialysis on"
                :readonly="true"
                name="first_dialysis_at"
                v-model="caseRecord.first_dialysis_at"
            />
            <form-input
                label="last dialysis on"
                :readonly="true"
                name="last_dialysis_at"
                v-model="caseRecord.last_dialysis_at"
            />
            <form-select
                label="ward first encounter"
                name="ward_first_encounter"
                v-model="caseRecord.ward_first_encounter"
                :options="config.wardOptions"
            />
            <form-select
                label="ward discharge"
                name="ward_discharge"
                v-model="caseRecord.ward_discharge"
                :options="config.wardOptions"
            />
        </div>
        <form-checkbox
            class="mb-2 mt-4 md:mb-4 md:mt-8 xl:mt-16"
            label="Previous CRRT"
            v-model="caseRecord.previous_CRRT"
            :toggler="true"
        />
        <transition name="slide-fade">
            <div
                class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8"
                v-if="caseRecord.previous_CRRT"
            >
                <form-datetime
                    label="date start crrt"
                    name="date_start_CRRT"
                    v-model="caseRecord.date_start_CRRT"
                />
                <form-datetime
                    label="date end crrt"
                    name="date_end_CRRT"
                    v-model="caseRecord.date_end_CRRT"
                />
            </div>
        </transition>

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Renal diagnosis :
        </h3>
        <div class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8">
            <div>
                <form-checkbox
                    class="my-2 md:my-4"
                    label="AKI"
                    v-model="caseRecord.AKI"
                    :toggler="true"
                />
                <transition name="slide-fade">
                    <div
                        v-if="caseRecord.AKI"
                        class="ml-2 md:ml-4"
                    >
                        <div class="grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                            <form-checkbox
                                v-for="(diag, key) in config.AKIDiags"
                                :key="key"
                                :name="diag.name"
                                :label="diag.label"
                                v-model="caseRecord[`AKI_${diag.name}`]"
                            />
                        </div>
                        <form-input
                            class="mt-2 md:mt-4 xl:mt-6"
                            name="AKI_other"
                            label="Other AKI diagnosis"
                            v-model="caseRecord.AKI_other"
                        />
                    </div>
                </transition>
            </div>
            <div>
                <form-checkbox
                    class="my-2 md:my-4"
                    label="CKD"
                    v-model="caseRecord.CKD"
                    :toggler="true"
                />
                <transition name="slide-fade">
                    <div
                        v-if="caseRecord.CKD"
                        class="ml-2 md:ml-4"
                    >
                        <div class="grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                            <form-checkbox
                                v-for="(diag, key) in config.CKDDiags"
                                :key="key"
                                :name="diag.name"
                                :label="diag.label"
                                v-model="caseRecord[`CKD_${diag.name}`]"
                            />
                        </div>
                        <form-input
                            class="mt-2 md:mt-4 xl:mt-6"
                            name="CKD_other"
                            label="Other CKD diagnosis"
                            v-model="caseRecord.CKD_other"
                        />
                    </div>
                </transition>
            </div>
        </div>

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            admission diagnosis :
        </h3>
        <form-input
            name="admission_diagnosis"
            v-model="caseRecord.admission_diagnosis"
        />

        <!-- comorbid and indication -->
        <div class="grid gap-2 md:grid-cols-2 md:gap-4 xl:gap-6">
            <div>
                <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
                    Comorbidities :
                </h3>
                <div class="mt-2 md:mt-4 xl:mt-6 grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                    <form-checkbox
                        v-for="(disease, key) in config.comorbidities"
                        :key="key"
                        :name="disease.name"
                        :label="disease.label"
                        v-model="caseRecord[`comorbidities_${disease.name}`]"
                    />
                </div>
                <form-input
                    class="mt-2 md:mt-4 xl:mt-6"
                    name="comorbidities_other"
                    label="Other comorbidities"
                    v-model="caseRecord.comorbidities_other"
                />
            </div>
            <div>
                <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
                    Indication for dialysis :
                </h3>
                <div class="mt-2 md:mt-4 xl:mt-6 grid gap-2 md:gap-4 xl:gap-6 2xl:grid-cols-2">
                    <form-checkbox
                        v-for="(disease, key) in config.indications"
                        :key="key"
                        :name="disease.name"
                        :label="disease.label"
                        v-model="caseRecord[`indications_${disease.name}`]"
                    />
                </div>
            </div>
        </div>

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Serology :
        </h3>
        <div class="grid gap-2 md:grid-cols-2 md:gap-4 xl:gap-6">
            <form-select
                label="HBs Ag"
                name="HBsAg"
                v-model="caseRecord.HBsAg"
                :options="['positive', 'negative']"
            />
            <form-datetime
                label="date HBs Ag"
                name="date_HBsAg"
                v-model="caseRecord.date_HBsAg"
            />
            <form-select
                label="anti hcv"
                name="anti_HCV"
                v-model="caseRecord.anti_HCV"
                :options="['positive', 'negative']"
            />
            <form-datetime
                label="date anti hcv"
                name="date_anti_HCV"
                v-model="caseRecord.date_anti_HCV"
            />
            <form-select
                label="anti HIV"
                name="anti_HIV"
                v-model="caseRecord.anti_HIV"
                :options="['positive', 'negative']"
            />
            <form-datetime
                label="date anti HIV"
                name="date_anti_HIV"
                v-model="caseRecord.date_anti_HIV"
            />
        </div>

        <!-- consent signed -->
        <form-checkbox
            class="mt-4 md:mt-8 xl:mt-16"
            label="Consent signed"
            name="consent_signed"
            v-model="caseRecord.consent_signed"
            :toggler="true"
        />

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Insurance :
        </h3>
        <form-select
            name="insurance"
            v-model="caseRecord.insurance"
            :options="['เบิกจ่ายตรง', 'ประกันสังคม', '30 บาท']"
        />

        <h3 class="form-label mt-4 md:mt-8 xl:mt-16">
            Outcome :
        </h3>
        <div class="grid gap-2 md:grid-cols-2 md:gap-4 xl:gap-6">
            <div>
                <form-select
                    label="renal outcome"
                    name="renal_outcome"
                    v-model="caseRecord.renal_outcome"
                    :options="['Recovery', 'ESRD', 'KT']"
                />
                <transition name="slide-fade">
                    <form-input
                        v-if="caseRecord.renal_outcome == 'Recovery'"
                        label="last creatinine before discharge"
                        class="mt-2 md:mt-t xl:mt-6"
                        name="cr_before_discharge"
                        v-model="caseRecord.cr_before_discharge"
                    />
                </transition>
            </div>
            <div>
                <form-select
                    label="patient outcome"
                    name="patient_outcome"
                    v-model="caseRecord.patient_outcome"
                    :options="['Alive', 'Dead']"
                />
                <transition name="slide-fade">
                    <form-input
                        v-if="caseRecord.patient_outcome == 'Dead'"
                        label="cause of dead"
                        class="mt-2 md:mt-t xl:mt-6"
                        name="cause_of_dead"
                        v-model="caseRecord.cause_of_dead"
                    />
                </transition>
            </div>
        </div>

        <h2 class="form-label italic mt-6 md:mt-12 xl:mt-24">
            Reservation
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <div class="lg:grid grid-cols-2 gap-2 lg:gap-6">
            <div class="grid grid-cols-1 gap-2 lg:gap-6">
                <form-select
                    label="dialysis at"
                    name="type"
                    v-model="order.type"
                    :options="config.typeOptions"
                />
                <form-select
                    label="dialysis type"
                    name="ward"
                    v-model="order.ward"
                    :options="config.wardOptions"
                />
                <form-datetime
                    label="required date"
                    name="date_required"
                    v-model="order.date_required"
                    :options="{ enable: config.enableDates, onDayCreate: onDayCreate, inline: true }"
                />
            </div>
            <div class="mt-2 lg:mt-0 grid grid-cols-4 gap-2">
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow col-span-2 flex justify-between items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow flex flex-col justify-center items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow flex flex-col justify-center items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow flex flex-col justify-center items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-red-300 p-4 rounded shadow flex flex-col justify-center items-center">
                    <span class="p-2 bg-white rounded-full text-xs font-semibold">HD</span>
                    <span class="italic font-bold text-white text-xs">fellow name</span>
                </div>
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
                <div class="w-full bg-green-300 p-4 rounded shadow" />
            </div>
            <button class="block mt-2 lg:mt-0 w-full btn btn-dark">
                RESET
            </button>
            <inertia-link
                class="block mt-2 lg:mt-0 text-center btn btn-bitter"
                :href="`${$page.props.app.baseUrl}/prototypes/AcuteHDOrder`"
            >
                RESERVE
            </inertia-link>
        </div>
    </div>
</template>

<script>
import Layout from '@/Components/Layouts/Layout';
import FormSelect from '@/Components/Controls/FormSelect';
import FormDatetime from '@/Components/Controls/FormDatetime';
import FormInput from '@/Components/Controls/FormInput';
import FormCheckbox from '@/Components/Controls/FormCheckbox';
export default {
    components: { FormSelect, FormDatetime, FormInput, FormCheckbox },
    layout: Layout,
    data () {
        return {
            order: {
                type: '',
                ward: '',
                date_required: ''
            },
            caseRecord: {
                admitted_at: '',
                discharged_at: '',
                first_dialysis_at: '',
                last_dialysis_at: '',
                ward_first_encounter: '',
                ward_discharge: '',
                previous_CRRT: false,
                date_start_CRRT: '',
                date_end_CRRT: '',
                AKI: false,
                CKD: false,
                AKI_sepsis: false,
                AKI_CHF: false,
                AKI_ACS: false,
                AKI_other_cardiac_cause: false,
                AKI_glomerulonephritis: false,
                AKI_acute_interstitial_nephritis: false,
                AKI_contrast_induced_nephropathy: false,
                AKI_acute_tubular_necrosis: false,
                AKI_drug_induced_AKI: false,
                AKI_other: '',
                CKD_DN: false,
                CKD_HT: false,
                CKD_glomerular_disease: false,
                CKD_other: '',
                admission_diagnosis: '',
                comorbidities_DM: false,
                comorbidities_HT: false,
                comorbidities_DLP: false,
                comorbidities_coronary_artery_disease: false,
                comorbidities_cerebrovascular_disease: false,
                comorbidities_COPD: false,
                comorbidities_cirrhosis: false,
                comorbidities_cancer: false,
                comorbidities_other: '',
                indeications_volume_overload: false,
                indeications_metabolic_acidosis: false,
                indeications_hyperkalemia: false,
                indeications_toxin_removal: false,
                indeications_initiate_HD: false,
                indeications_maintain_HD: false,
                indeications_change_from_PD: false,
                HBsAg: '',
                date_HBsAg: '',
                anti_HCV: '',
                date_anti_HCV: '',
                anti_HIV: '',
                date_anti_HIV: '',
                consent_signed: false,
                insurance: '',
                renal_outcome: '',
                cr_before_discharge: '',
                patient_outcome: '',
                cause_of_dead: '',
            },
            config: {
                enableDates: [
                    '2021-02-01',
                    '2021-02-02',
                    '2021-02-03',
                    '2021-02-04',
                    '2021-02-05',
                    '2021-02-06',
                    '2021-02-08',
                ],
                disableDates: [
                    'January 31, 2021',
                    'February 7, 2021',
                ],
                typeOptions: [
                    'HD 2 hrs.',
                    'HD 3/4 hrs.',
                    'HD+HF 4 hrs.',
                    'HD+TPE 4 hrs.',
                    'HF 2 hrs.',
                    'TPE 2 hrs.',
                    'SLEDD',
                ],
                wardOptions: ['ไตเทียม', 'ICU 3', 'ICU 7', 'CCU', 'ICCU', 'ICU ตั้งตรงจิต', 'ICU สลาด สำอางค์', 'ICU สยามมินทร์', 'ICU ประสาทศัลยศาสตร์', 'ICU ศูนย์โรคหัวใจชั้น 5', 'ICU premium', 'ICU อุบัติเหตุ', 'Burn unit', 'RCU'],
                AKIDiags: [
                    { name: 'sepsis', label: 'Sepsis'},
                    { name: 'CHF', label: 'CHF'},
                    { name: 'ACS', label: 'ACS'},
                    { name: 'other_cardiac_cause', label: 'Other cardiac cause'},
                    { name: 'glomerulonephritis', label: 'Glomerulonephritis'},
                    { name: 'acute_interstitial_nephritis', label: 'Acute interstitial nephritis'},
                    { name: 'contrast_induced_nephropathy', label: 'Contrast induced nephropathy'},
                    { name: 'acute_tubular_necrosis', label: 'Acute tubular necrosis'},
                    { name: 'drug_induced_AKI', label: 'Drug induced AKI'},
                ],
                CKDDiags: [
                    { name: 'DN', label: 'DN' },
                    { name: 'HT', label: 'HT' },
                    { name: 'glomerular_disease', label: 'Glomerular disease' },
                ],
                comorbidities: [
                    { name: 'DM', label: 'DM' },
                    { name: 'HT', label: 'HT' },
                    { name: 'DLP', label: 'DLP' },
                    { name: 'coronary_artery_disease', label: 'Coronary artery disease' },
                    { name: 'cerebrovascular_disease', label: 'Cerebrovascular disease' },
                    { name: 'COPD', label: 'COPD' },
                    { name: 'cirrhosis', label: 'Cirrhosis' },
                    { name: 'cancer', label: 'Cancer' },
                ],
                indications: [
                    { name: 'volume_overload', label: 'Volume overload' },
                    { name: 'metabolic_acidosis', label: 'Metabolic acidosis' },
                    { name: 'hyperkalemia', label: 'Hyperkalemia' },
                    { name: 'toxin_removal', label: 'Toxin removal' },
                    { name: 'initiate_HD', label: 'Initiate HD' },
                    { name: 'maintain_HD', label: 'Maintain HD' },
                    { name: 'change_from_PD', label: 'Change from PD' },
                ]
            }
        };
    },
    methods: {
        onDayCreate (dObj, dStr, fp, dayElem) {
            if (!this.config.disableDates.length) return;
            for (let i = 0; i < this.config.disableDates.length; i++) {
                if (dayElem.getAttribute('aria-label') == this.config.disableDates[i]) {
                    console.log(dayElem.getAttribute('aria-label'));
                    dayElem.innerHTML += '<span class="calendar-event busy"></span>';
                }
            }
        },
    }
};
</script>

<style scoped>
    .slide-fade-enter-active {
        transition: all .8s ease;
    }
    .slide-fade-leave-active {
        transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter-from, .slide-fade-leave-to {
        transform: translateX(10px);
        opacity: 0;
    }
</style>