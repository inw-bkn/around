<template>
    <layout>
        <template #default>
            <div class="">
                <h2 class="form-label italic">
                    Reservation data
                </h2>
                <hr class="my-4 border-b-2 border-yellow-400">
            </div>
            <div class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8 xl:grid-cols-4">
                <form-input
                    v-model="order.patient_hn"
                    name="patient_hn"
                    label="hn"
                    :readonly="true"
                />
                <form-input
                    v-model="order.patient_name"
                    name="patient_name"
                    label="name"
                    :readonly="true"
                />
                <form-input
                    v-model="order.required_date_formatted"
                    name="required_date_formatted"
                    label="required date"
                    :readonly="true"
                />
                <form-input
                    v-model="prescription.ward"
                    name="ward"
                    label="ward"
                    :readonly="true"
                />
                <form-input
                    v-model="prescription.dialysis_type"
                    name="dialysis_type"
                    label="dialysis type"
                    :readonly="true"
                />
                <form-input
                    v-model="order.an"
                    name="an"
                    label="an"
                    :readonly="true"
                />
            </div>
            <div class="mt-6 md:mt-12 xl:mt-24">
                <h2 class="form-label italic">
                    Prescription
                </h2>
                <hr class="my-4 border-b-2 border-yellow-400">
            </div>
            <div class="grid gap-2 md:grid md:gap-4 md:grid-cols-2 xl:gap-8 xl:grid-cols-4">
                <form-select
                    v-model="prescription.dialyzer"
                    name="dialyzer"
                    label="dialyzer"
                    :options="config.dialyzerOptions"
                />
                <form-select
                    v-model="prescription.dialyzate"
                    name="dialyzate"
                    label="dialyzate"
                    :options="config.dialyzateOptions"
                />
                <form-select
                    v-model="prescription.dialyzate_flow"
                    name="dialyzate_flow"
                    label="dialyzate flow (ml/min)"
                    :options="config.dialyzateFlowOptions"
                />
                <form-select
                    v-model="prescription.blood_flow"
                    name="blood_flow"
                    label="blood flow (ml/min)"
                    :options="config.bloodFlowOptions"
                />
                <!-- <form-select
                    v-model="prescription.session_length"
                    name="session_length"
                    label="session length (hrs.)"
                    :disabled="true"
                    :options="config.sessionLengthOptions"
                /> -->
                <form-select
                    v-model="prescription.dialyzate_temperature"
                    name="dialyzate_temperature"
                    label="dialyzate temperature (℃)"
                    :options="config.dialyzateTemperatureOptions"
                />
                <form-select
                    v-model="prescription.sodium_profile"
                    name="sodium_profile"
                    label="sodium profile"
                    :options="config.sodiumProfileOptions"
                />
                <form-select
                    v-model="prescription.anticoagulant"
                    name="anticoagulant"
                    label="anticoagulant"
                    :options="config.anticoagulantOptions"
                />
                <transition-group name="slide-fade">
                    <form-select
                        v-if="prescription.anticoagulant == 'Heparin'"
                        v-model="prescription.heparin_loading"
                        name="heparin_loading"
                        label="heparin loading"
                        :options="config.anticoagulantLoadingOptions"
                    />
                    <form-select
                        v-if="prescription.anticoagulant == 'Heparin'"
                        v-model="prescription.heparin_loading_unit"
                        name="heparin_loading_unit"
                        label="heparin loading unit"
                        :options="config.anticoagulantLoadingUnitOptions"
                    />
                    <form-select
                        v-if="prescription.anticoagulant == 'Heparin'"
                        v-model="prescription.heparin_maintenance"
                        name="heparin_maintenance"
                        label="heparin maintenance"
                        :options="config.anticoagulantMaintenanceOptions"
                    />
                    <form-select
                        v-if="prescription.anticoagulant == 'Heparin'"
                        v-model="prescription.heparin_maintenance_unit"
                        name="heparin_maintenance_unit"
                        label="heparin maintenance unit"
                        :options="config.anticoagulantMaintenanceUnitOptions"
                    />
                    <form-input
                        v-show="prescription.anticoagulant == 'Citrate'"
                        v-model="prescription.anticoagulant_dose"
                        name="anticoagulant_dose"
                        label="anticoagulant dose"
                        type="number"
                    />
                    <form-input
                        v-if="prescription.anticoagulant == 'Other'"
                        v-model="prescription.anticoagulant_dose"
                        name="anticoagulant_dose"
                        label="anticoagulant dose"
                        placeholder="type anticoagulant and dose here"
                    />
                    <form-select
                        v-if="prescription.anticoagulant == 'None'"
                        v-model="prescription.nss_flush"
                        name="nss_flush"
                        label="nss flush (optional)"
                        :options="config.NSSFlush"
                    />
                </transition-group>
                <form-input
                    pattern="\d*"
                    label="uf (ml.)"
                    v-model="prescription.ultrafiltration"
                    name="ultrafiltration"
                    type="number"
                />
                <form-input
                    label="dry weight (kg.)"
                    v-model="prescription.dry_weight"
                    name="dry_weight"
                    type="number"
                />
                <form-select
                    label="50% Glucose 50 cc IV"
                    v-model="prescription.glucose_iv"
                    name="glucose_iv"
                    :options="config.glucoseIVOptions"
                />
                <form-select
                    label="nutrition iv"
                    v-model="prescription.nutrition_iv"
                    name="nutrition_iv"
                    :options="config.nutritionIVOptions"
                />

                <!-- transfustion -->
                <form-select
                    label="transfustion"
                    v-model="prescription.transfustion"
                    name=":transfustion"
                    :options="['Yes', 'No']"
                />
                <transition-group name="slide-fade">
                    <form-select
                        v-if="prescription.transfustion == 'Yes'"
                        name="prc"
                        label="prc"
                        v-model="prescription.prc"
                        :options="config.prcOptions"
                    />
                    <form-select
                        v-if="prescription.transfustion == 'Yes'"
                        name="ffp"
                        label="ffp"
                        v-model="prescription.ffp"
                        :options="config.ffpOptions"
                    />
                    <form-select
                        v-if="prescription.transfustion == 'Yes'"
                        name="platelet"
                        label="platelet"
                        v-model="prescription.platelet"
                        :options="config.plateletOptions"
                    />
                </transition-group>

                <form-select
                    label="inotrope"
                    v-model="prescription.inotrope"
                    name="inotrope"
                    :options="config.inotropeOptions"
                />
                <form-select
                    label="o2 rx"
                    v-model="prescription.o2_rx"
                    name="o2_rx"
                    :options="['Yes', 'No']"
                />
                <form-input
                    label="cannula l/min (optional)"
                    v-model="prescription.cannula_rate"
                    name="cannula_rate"
                />
                <form-select
                    label="ekg"
                    v-model="prescription.ekg"
                    name="ekg"
                    :options="config.ekgOptions"
                />
                <form-select
                    label="access type"
                    v-model="prescription.access_type"
                    name="access_type"
                    :options="config.accessTypeOptions"
                />
                <form-select
                    label="access site coagulant"
                    v-model="prescription.access_site_coagulant"
                    name="access_site_coagulant"
                    :options="config.accessSiteOptions"
                />
                <form-select
                    label="Observe chest pain"
                    v-model="prescription.observe_chest_pain"
                    name="observe_chest_pain"
                    :options="['Yes', 'No']"
                />
                <form-select
                    label="Observe neuro sign"
                    v-model="prescription.observe_neuro_sign"
                    name="observe_neuro_sign"
                    :options="['Yes', 'No']"
                />
                <form-select
                    label="Keep MAP > 65 mmHg"
                    v-model="prescription.maintain_MAP_over_65"
                    name="maintain_MAP_over_65"
                    :options="['Yes', 'No']"
                />
                <form-select
                    label="Prime 20%  albumin 100 cc"
                    v-model="prescription.prime_20percent_albumin_100cc"
                    name="prime_20percent_albumin_100cc"
                    :options="['Yes', 'No']"
                />
            </div>
            <form-input
                class="mt-2 md:bt-4 xl:mt-8"
                label="spacial order"
                name="spacial"
                v-model="prescription.spacial"
            />
            <div class="mt-6 md:mt-12 xl:mt-24">
                <h2 class="form-label italic">
                    Pre-Dialysis Labs Request
                </h2>
                <hr class="my-4 border-b-2 border-yellow-400">
            </div>
            <div class="grid grid-cols-2 gap-2 md:gap-4 xl:gap-8 xl:grid-cols-4">
                <form-checkbox
                    v-for="(lab, key) in config.labs"
                    :key="key"
                    :label="lab"
                    :name="lab"
                    v-model="labs[lab]"
                />
            </div>
            <div class="mt-6 md:mt-12 xl:mt-24">
                <h2 class="form-label italic">
                    Pre-Dialysis Treatments Request
                </h2>
                <hr class="my-4 border-b-2 border-yellow-400">
            </div>
            <form-input
                class="mt-2 md:bt-4 xl:mt-8"
                name="treatments"
                v-model="treatments"
            />
        </template>
    </layout>
</template>

<script>
import FormCheckbox from '@/Components/Controls/FormCheckbox.vue';
import FormInput from '@/Components/Controls/FormInput.vue';
import FormSelect from '@/Components/Controls/FormSelect.vue';
import Layout from '@/Components/Layouts/Layout.vue';
export default {
    components: {
        FormCheckbox,
        FormInput,
        FormSelect,
        Layout,
    },
    computed: {
        anticoagulantOtherThanHeparin () {
            if (!this.prescription.anticoagulant) {
                return false;
            }
            const anticoagulant = this.prescription.anticoagulant.toLowerCase();
            return anticoagulant.includes('enoxaparin') ||
                anticoagulant.includes('nadroparin') ||
                anticoagulant.includes('tinzaparin');
        },
        anticoagulantDoseOptions () {
            if (!this.prescription.anticoagulant) {
                return [];
            }
            const anticoagulant = this.prescription.anticoagulant.toLowerCase();
            if (anticoagulant.includes('enoxaparin')) {
                return this.config.anticoagulantDoseOptions['enoxaparin'];
            } else if (anticoagulant.includes('nadroparin')) {
                return this.config.anticoagulantDoseOptions['nadroparin'];
            } else if (anticoagulant.includes('tinzaparin')) {
                return this.config.anticoagulantDoseOptions['tinzaparin'];
            } else {
                return [];
            }
        }
    },
    watch: {
        'prescription.anticoagulant' (val) {
            // delete this.prescription.anticoagulant_dose;
            this.prescription.anticoagulant_dose = '';
            if (val.toLowerCase() === 'heparin') {
                // delete this.prescription.heparin_loading;
                // delete this.prescription.heparin_loading_unit;
                // delete this.prescription.heparin_maintenance;
                // delete this.prescription.heparin_maintenance_unit;
                this.prescription.heparin_loading = '';
                this.prescription.heparin_loading_unit = '';
                this.prescription.heparin_maintenance = '';
                this.prescription.heparin_maintenance_unit = '';
            }
        },
        // 'prescription.transfustion' (val) {
        //     if (!val || val == 'No') {
        //         delete this.prescription.ffp;
        //         delete this.prescription.platelet;
        //         delete this.prescription.prc;
        //     } else {
        //         this.prescription.ffp = 'No';
        //         this.prescription.platelet = 'No';
        //         this.prescription.prc = 'No';
        //     }

        // }
    },
    data () {
        return {
            order: {
                patient_hn: '50164826',
                patient_name: 'Ronald Duck',
                required_date_formatted: 'Friday, 29',
                an: '57584629',
            },
            prescription: {
                ward: 'ไตเทียม',
                dialysis_type: 'HD',
                dialyzer: '',
                dialyzate: '',
                dialyzate_flow: '',
                blood_flow: '',
                session_length: '',
                dialyzate_temperature: '',
                sodium_profile: '',
                anticoagulant: '',
                heparin_loading: '',
                heparin_loading_unit: '',
                heparin_maintenance: '',
                heparin_maintenance_unit: '',
                anticoagulant_dose: '',
                nss_flush: '',
                ultrafiltration: '',
                dry_weight: '',
                glucose_iv: '',
                nutrition_iv: '',
                transfustion: '',
                prc: '',
                ffp: '',
                platelet: '',
                inotrope: '',
                o2_rx: '',
                cannula_rate: '',
                ekg: '',
                access_type: '',
                access_site_coagulant: '',
                observe_chest_pain: '',
                observe_neuro_sign: '',
                maintain_MAP_over_65: '',
                prime_20percent_albumin_100cc: '',
                spacial: ''
            },
            labs: {
                'CBC': false,
                'BUN': false,
                'Cr': false,
                'Electrolyte': false,
                'Ca': false,
                'PO4': false,
                'Albumin': false,
                'LFT': false,
                'PT': false,
                'PTT': false,
                'request PRC': false,
                'iPTH': false,
                'Iron study': false,
                'Ferritin': false,
            },
            treatments: '',
            config: {
                'dialyzerOptions': ['APS-1050', 'APS-650', 'APS-900', 'PS-15', 'F100', 'HDF100s', 'HF80S/HF80', 'FB170U', 'FB190U', 'FB210U', 'Pureflux 190H', 'pureflux210', 'pureflux210h', 'SF130', 'SF130E', 'SF150E', 'SF170E', 'SF190E'],
                'dialyzateOptions': [
                    'None: Ca 0, K 0, Mg 0, glucose 0',
                    'Ca 3.5, K 2, Mg 1, glucose 100: AA 101',
                    'Ca 2.0, K 2, Mg 1, glucose 100: AA 201',
                    'Ca 2.5, K 2, Mg 1, glucose 100: AA 251',
                    'Ca 3.0, K 2, Mg 1, glucose 100: AA 301',
                    'Ca 3.5, K 3, Mg 1, glucose 100: AA 101 K3',
                    'Ca 2.0, K 3, Mg 1, glucose 100: AA 201 K3',
                    'Ca 2.5, K 3, Mg 1, glucose 100: AA 251 K3',
                    'Ca 3.0, K 3, Mg 1, glucose 100: AA 301 K3',
                    'Ca 3.5, K 2, Mg 0.7, glucose 100: AA 101',
                    'Ca 2.0, K 2, Mg 0.7, glucose 100: AA 201',
                    'Ca 2.5, K 2, Mg 0.7, glucose 100: AA 251',
                    'Ca 3.0, K 2, Mg 0.7, glucose 100: AA 301',
                    'Ca 3.5, K 3, Mg 0.7, glucose 100: AA 101 K3',
                    'Ca 2.0, K 3, Mg 0.7, glucose 100: AA 201 K3',
                    'Ca 2.5, K 3, Mg 0.7, glucose 100: AA 251 K3',
                    'Ca 3.0, K 3, Mg 0.7, glucose 100: AA 301 K3'
                ],
                'bloodFlowOptions': [150,200,250,300,350,400,500],
                'dialyzateFlowOptions': [150,200,250,300,350,400,500],
                'sessionLengthOptions': [2,3,4,5,6,7,8],
                'dialyzateTemperatureOptions': [35.5,36,36.5,37],
                'sodiumProfileOptions': ['None','No.1','No.2','No.3','No.4','No.5','No.6'],
                'anticoagulantOptions': [
                    { 'value': 'None', 'label': 'None' },
                    { 'value': 'Heparin', 'label': 'Heparin' },
                    { 'value': 'Enoxaparin', 'label': 'Enoxaparin (Clexane®, Levenox®)' },
                    { 'value': 'Nadroparin', 'label': 'Nadroparin (Fraxiparine) ' },
                    { 'value': 'Tinzaparin', 'label': 'Tinzaparin (Innohep)' },
                    { 'value': 'Citrate', 'label': 'Citrate' },
                    { 'value': 'Other', 'label': 'Other' }
                ],
                'anticoagulantLoadingOptions': [0,500,1000,1500,2000,40,60,80],
                'anticoagulantLoadingUnitOptions': ['units', 'mg'],
                'anticoagulantMaintenanceOptions': [0,250,500,1000],
                'anticoagulantMaintenanceUnitOptions': ['units', 'mg'],
                'anticoagulantDoseOptions': {
                    'enoxaparin': [
                        { 'value': 30, 'label': '30 mg (0.3 ml)' },
                        { 'value': 40, 'label': '40 mg (0.4 ml)' },
                        { 'value': 60, 'label': '60 mg (0.5 ml)' },
                        { 'value': 80, 'label': '80 mg (0.8 ml)' }
                    ],
                    'nadroparin': [
                        { 'value': 0.3, 'label': '0.3 ml (2,850 IUAXa)' },
                        { 'value': 0.4, 'label': '0.4 ml (3,800 IUAXa)' },
                        { 'value': 0.6, 'label': '0.6 ml (5,700 IUAXa)' },
                        { 'value': 0.8, 'label': '0.8 ml (7,600 IUAXa)' }
                    ],
                    'tinzaparin': [
                        { 'value': 0.25, 'label': '0.25 ml (2,850 IUAXa)' },
                        { 'value': 0.35, 'label': '0.35 ml (3,500 IUAXa)' },
                        { 'value': 0.45, 'label': '0.45 ml (4,500 IUAXa)' }
                    ]
                },
                'NSSFlush': [ '100 ml q 30 min', '100 ml q 60 min', '200 ml q 30 min', '200 ml q 60 min'],
                'glucoseIVOptions': ['No','Yes'],
                'nutritionIVOptions': ['No','Yes'],
                'prcOptions': ['No','Yes'],
                'ffpOptions': ['No','Yes'],
                'plateletOptions': ['No','Yes'],
                'inotropeOptions': ['None','Norepinephrine','Dopamine','Dobutamine'],
                'ekgOptions': ['No', 'Monitoring'],
                'accessTypeOptions': ['DLC','Perm cath','AVF','AVG'],
                'accessSiteOptions': ['RtIJ','LtIJ','RtFem','LtFem','Rt forearm','Lt forearm','Rt arm','Lt arm','Rt SCV','Lt SCV'],
                'labs': [
                    'CBC',
                    'BUN', 'Cr',
                    'Electrolyte',
                    'Ca', 'PO4',
                    'Albumin',
                    'LFT',
                    'PT', 'PTT',
                    'request PRC',
                    'iPTH',
                    'Iron study', 'Ferritin'
                ]
            }
        };
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