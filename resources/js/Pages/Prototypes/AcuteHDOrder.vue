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
            <inertia-link
                class="text-thick-theme-light"
                :href="`${$page.props.app.baseUrl}/prototypes/AcuteHDCaseEdit`"
            >
                Adelbert Mohr /
            </inertia-link>
            Friday, 29 Jan 2021
        </h1>
        <hr class="my-4 border-b-2 border-bitter-theme-light">
        <h2 class="form-label italic mt-6 md:mt-12 xl:mt-24">
            Reservation data
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
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
        <h2 class="form-label italic mt-6 md:mt-12 xl:mt-24">
            Prescription
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
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
                :options="prescription.access_type.startsWith('AV') ? config.accessSiteOptionsAV : config.accessSiteOptionsNonAV"
                :disabled="!prescription.access_type"
            />
            <form-select
                v-model="prescription.dialyzer"
                name="dialyzer"
                label="dialyzer"
                :options="config.dialyzerOptions"
            />
            <form-select
                v-model="prescription.dialysate"
                name="dialysate"
                label="dialysate"
                :options="config.dialysateOptions"
            />
            <form-input
                v-model:model-value="prescription.dialysate_flow"
                v-model:model-chackbox="prescription.reverse_flow"
                type="number"
                pattern="\d*"
                name="dialysate_flow"
                label="dialysate flow (ml/min)"
                switch-label="Reverse flow"
            />
            <form-input
                v-model="prescription.blood_flow"
                type="number"
                pattern="\d*"
                name="blood_flow"
                label="blood flow (ml/min)"
            />
            <!-- <form-select
                    v-model="prescription.session_length"
                    name="session_length"
                    label="session length (hrs.)"
                    :disabled="true"
                    :options="config.sessionLengthOptions"
                /> -->
            <form-input
                v-model="prescription.dialysate_temperature"
                type="number"
                name="dialysate_temperature"
                label="dialysate temperature (℃)"
            />
            <!-- <form-select
                v-model="prescription.sodium_profile"
                name="sodium_profile"
                label="sodium profile"
                :options="config.sodiumProfileOptions"
            /> -->
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8">
            <form-select
                v-model="prescription.anticoagulant"
                name="anticoagulant"
                label="anticoagulant"
                :options="config.anticoagulantOptions"
            />
        </div>
        <transition name="slide-fade">
            <div
                class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"
                v-if="prescription.anticoagulant == 'None'"
            >
                <form-checkbox
                    label="anticoagulant drip via peripheral IV"
                    name="anticoagulant_none_drip_via_peripheral_iv"
                    v-model="prescription.anticoagulant_none_drip_via_peripheral_iv"
                />
                <form-checkbox
                    label="NSS 200 ml flush q 1 hour"
                    name="anticoagulant_none_nss_200ml_flush_q_hour"
                    v-model="prescription.anticoagulant_none_nss_200ml_flush_q_hour"
                />
            </div>
            <div v-else-if="prescription.anticoagulant == 'Heparin'">
                <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8">
                    <form-input
                        label="loading dose (iu)"
                        name="heparin_loading_dose"
                        v-model="prescription.heparin_loading_dose"
                        type="number"
                        pattern="\d*"
                        @autosave="validate('heparin_loading_dose')"
                        :errors="errors.heparin_loading_dose"
                        placeholder="[250, 2000] IU"
                    />
                    <form-input
                        label="maintenance dose (iu/hour)"
                        name="heparin_maintenance_dose"
                        v-model="prescription.heparin_maintenance_dose"
                        type="number"
                        pattern="\d*"
                        @autosave="validate('heparin_maintenance_dose')"
                        :errors="errors.heparin_maintenance_dose"
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
                v-else-if="prescription.anticoagulant == 'Enoxaparin'"
            >
                <form-input
                    label="dose (ml)"
                    name="enoxaparin_dose"
                    v-model="prescription.enoxaparin_dose"
                    type="number"
                    @autosave="validate('enoxaparin_dose')"
                    :errors="errors.enoxaparin_dose"
                    placeholder="[0.3, 0.8] ml"
                />
            </div>
            <div
                class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"
                v-else-if="prescription.anticoagulant == 'Fondaparinux'"
            >
                <form-select
                    label="bolus dose (iu)"
                    name="fondaparinux_bolus_dose"
                    v-model="prescription.fondaparinux_bolus_dose"
                    :options="['500', '750']"
                />
            </div>
            <div
                class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4 my-2 md:my-4 xl:my-8"
                v-else-if="prescription.anticoagulant == 'Tinzaparin'"
            >
                <form-input
                    label="dose (iu)"
                    name="tinzaparin_dose"
                    v-model="prescription.tinzaparin_dose"
                    type="number"
                    pattern="\d*"
                    @autosave="validate('tinzaparin_dose')"
                    :errors="errors.tinzaparin_dose"
                    placeholder="[1500, 3500] IU"
                />
            </div>
            <div
                class="grid gap-2 md:gap-4 xl:gap-8 my-2 md:my-4 xl:my-8"
                v-else-if="prescription.anticoagulant == 'Other'"
            >
                <form-input
                    name="anticoagulant_other"
                    v-model="prescription.anticoagulant_other"
                    placeholder="please specify"
                />
            </div>
        </transition>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <form-input
                pattern="\d*"
                label="uf (ml.)"
                v-model="prescription.ultrafiltration"
                name="ultrafiltration"
                type="number"
                @autosave="validate('ultrafiltration')"
                :errors="errors.ultrafiltration"
                placeholder="[0, 4000] ml"
            />
            <form-input
                label="dry weight (kg.)"
                v-model="prescription.dry_weight"
                name="dry_weight"
                type="number"
            />
            <form-input
                label="50% Glucose IV volume (ml)"
                v-model="prescription.glucose_50_percent_iv_volume"
                name="glucose_50_percent_iv_volume"
                pattern="\d*"
                type="number"
                @autosave="validate('glucose_50_percent_iv_volume')"
                :errors="errors.glucose_50_percent_iv_volume"
                placeholder="[50, 100] ml"
            />
            <form-select
                label="50% glucose iv at"
                v-model="prescription.glucose_50_percent_iv_at"
                name="glucose_50_percent_iv_at"
                :options="config.glucoseIVAtOptions"
            />
            <form-select
                label="20% albumin prime 100 ml"
                v-model="prescription.albumin_20_percent_prime_100ml"
                name="albumin_20_percent_prime_100ml"
                :options="['Yes', 'No']"
            />
            <form-input
                label="nutrition iv type"
                v-model="prescription.nutrition_iv_type"
                name="nutrition_iv_type"
            />
            <form-input
                label="nutrition iv volume (ml)"
                v-model="prescription.nutrition_iv_volume"
                name="nutrition_iv_volume"
                type="number"
                pattern="\d*"
            />
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <label class="form-label">transfustion :</label>
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <form-input
                label="prc volume (unit)"
                name="prc_volume"
                v-model="prescription.prc_volume"
                type="number"
            />
            <form-input
                label="ffp volume (ml)"
                name="ffp_volume"
                v-model="prescription.ffp_volume"
                type="number"
                pattern="\d*"
            />
            <form-input
                label="platelet volume (unit)"
                name="platelet_volume"
                v-model="prescription.platelet_volume"
                type="number"
            />
            <form-input
                label="other"
                name="transfusion_other"
                v-model="prescription.transfusion_other"
            />
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <form-select
                label="inotrope"
                v-model="prescription.inotrope"
                name="inotrope"
                :options="['Yes', 'No']"
            />
            <form-select
                label="o2 rx"
                v-model="prescription.o2_rx"
                name="o2_rx"
                :options="config.o2RxOptions"
            />
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <label class="form-label">monitoring :</label>
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <form-checkbox
                v-for="(monitor, key) in config.monitors"
                :key="key"
                :label="monitor.label"
                :name="monitor.name"
                v-model="prescription[monitor.name]"
            />
            <form-input
                label="other"
                name="monitoring_other"
                v-model="prescription.monitoring_other"
            />
        </div>
        <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        <form-input
            class="mt-2 md:bt-4 xl:mt-8"
            label="spacial order"
            name="spacial"
            v-model="prescription.spacial"
        />
        <h2 class="form-label italic mt-6 md:mt-12 xl:mt-24">
            Pre-Dialysis Labs Request
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <div
            v-for="(labSet, key) in config.labSets"
            :key="key"
        >
            <label
                class="form-label mb-2 md:mb-4 xl:mb-8"
                v-if="labSet.name"
            ><span class=" italic font-extralight text-dark-theme-light">{{ labSet.name }}</span></label>
            <div class="grid grid-cols-2 gap-2 md:gap-4 xl:gap-8 xl:grid-cols-4">
                <form-checkbox
                    v-for="(lab, index) in labSet.labs"
                    :key="index"
                    :label="lab"
                    :name="lab"
                    v-model="labs[lab.replaceAll(' ', '_')]"
                />
            </div>
            <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        </div>
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <form-input
                label="crossmatch"
                name="lab_crossmatch"
                placeholder="please specify"
                v-model="labs.crossmatch"
            />
            <form-input
                label="others"
                name="lab_others"
                v-model="labs.others"
            />
        </div>
        <h2 class="form-label italic mt-6 md:mt-12 xl:mt-24">
            Pre-Dialysis Treatments Request
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <form-input
            class="mt-2 md:bt-4 xl:mt-8"
            name="pre_treatments"
            v-model="pre_treatments"
        />
        <h2 class="form-label italic mt-6 md:mt-12 xl:mt-24">
            post-Dialysis Treatments Request
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <div v-if="prescription.access_type == 'Perm cath' || prescription.access_type == 'DLC'">
            <label class="form-label">DLC/PC lock solution</label>
            <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
                <form-input
                    label="heparin"
                    name="post_treatment_heparin"
                    v-model="post_treatment_heparin"
                />
                <form-input
                    label="heparin dose"
                    name="post_treatment_heparin_dose"
                    v-model="post_treatment_heparin_dose"
                />
                <form-input
                    label="citrate"
                    name="post_treatment_citrate"
                    v-model="post_treatment_citrate"
                />
                <form-input
                    label="citrate dose"
                    name="post_treatment_citrate_dose"
                    v-model="post_treatment_citrate_dose"
                />
                <form-input
                    label="antibiotic"
                    name="post_treatment_antibiotic"
                    v-model="post_treatment_antibiotic"
                />
                <form-input
                    label="antibiotic dose"
                    name="post_treatment_antibiotic_dose"
                    v-model="post_treatment_antibiotic_dose"
                />
            </div>
            <hr class="border border-dashed my-2 md:my-4 xl:my-8">
        </div>
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <form-input
                label="ESA"
                name="post_treatment_ESA"
                v-model="post_treatment_ESA"
            />
            <form-input
                label="ESA dose"
                name="post_treatment_ESA_dose"
                v-model="post_treatment_ESA_dose"
            />
            <form-input
                label="Iron iv"
                name="post_treatment_iron_iv"
                v-model="post_treatment_iron_iv"
            />
            <form-input
                label="Iron iv dose"
                name="post_treatment_iron_iv_dose"
                v-model="post_treatment_iron_iv_dose"
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
export default {
    layout: Layout,
    components: {
        FormCheckbox,
        FormInput,
        FormSelect,
        Alert,
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
        }
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
                patient_name: 'Adelbert Mohr',
                required_date_formatted: 'Friday, 5',
                an: '57584629',
            },
            prescription: {
                ward: 'ไตเทียม',
                dialysis_type: 'HD - 4 hours',
                dialyzer: '',
                dialysate: '',
                dialysate_flow: '',
                reverse_flow: false,
                blood_flow: '',
                // session_length: '',
                dialysate_temperature: '',
                // sodium_profile: '',
                anticoagulant: '',
                // heparin_loading: '',
                // heparin_loading_unit: '',
                // heparin_maintenance: '',
                // heparin_maintenance_unit: '',
                // anticoagulant_dose: '',
                // nss_flush: '',
                anticoagulant_none_drip_via_peripheral_iv: false,
                anticoagulant_none_nss_200ml_flush_q_hour: false,
                heparin_loading_dose: '',
                heparin_maintenance_dose: '',
                enoxaparin_dose: '',
                fondaparinux_bolus_dose: '',
                tinzaparin_dose: '',
                anticoagulant_other: '',
                ultrafiltration: '',
                dry_weight: '',
                glucose_50_percent_iv_volume: '',
                glucose_50_percent_iv_at: '',
                albumin_20_percent_prime_100ml: '',
                nutrition_iv_type: '',
                nutrition_iv_volume: '',
                // transfustion: '',
                // prc: '',
                // ffp: '',
                // platelet: '',
                prc_volume: '',
                ffp_volume: '',
                platelet_volume: '',
                transfusion_other: '',
                inotrope: '',
                o2_rx: '',
                monitoring_EKG: false,
                monitoring_observe_chest_pain: false,
                monitoring_observe_neuro_sign: false,
                monitoring_BP_map_greater_than_65mmhg: false,
                monitoring_other: '',
                // cannula_rate: '',
                // ekg: '',
                access_type: '',
                access_site_coagulant: '',
                // observe_chest_pain: '',
                // observe_neuro_sign: '',
                // maintain_MAP_over_65: '',
                // prime_20percent_albumin_100cc: '',
                spacial: ''
            },
            labs: {
                CBC: false,
                Hct: false,
                BUN: false,
                Cr: false,

                Na: false,
                K: false,
                Cl: false,
                HCO3: false,

                Total_calcium: false,
                Phosphate: false,
                iPTH: false,

                Alb: false,
                Glob: false,
                TB: false,
                DB: false,
                AST: false,
                ALT: false,
                ALP: false,
                GGT: false,

                PT: false,
                INR: false,
                APTT: false,
                APTT_ratio: false,
                Anti_Xa: false,

                Iron_study: false,
                Ferritin: false,

                crossmatch: '',
                others: '',
            },
            pre_treatments: '',
            post_treatment_heparin: '',
            post_treatment_heparin_dose: '',
            post_treatment_citrate: '',
            post_treatment_citrate_dose: '',
            post_treatment_antibiotic: '',
            post_treatment_antibiotic_dose: '',
            post_treatment_ESA: '',
            post_treatment_ESA_dose: '',
            post_treatment_iron_iv: '',
            post_treatment_iron_iv_dose: '',
            config: {
                'dialyzerOptions': ['SF130E','SF150E','SF170E','SF190E','Rexeed 13L','Rexeed 15L','Rexeed 18L','FB170U','FB190U','FB210U','HF80S'],
                'dialysateOptions': [
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
                'dialysateFlowOptions': [150,200,250,300,350,400,500],
                'sessionLengthOptions': [2,3,4,5,6,7,8],
                'dialysateTemperatureOptions': [35.5,36,36.5,37],
                'sodiumProfileOptions': ['None','No.1','No.2','No.3','No.4','No.5','No.6'],
                'anticoagulantOptions': [
                    { 'value': 'None', 'label': 'None' },
                    { 'value': 'Heparin', 'label': 'Heparin' },
                    { 'value': 'Enoxaparin', 'label': 'Enoxaparin (Clexane®, Levenox®)' },
                    { 'value': 'Fondaparinux', 'label': 'Fondaparinux' },
                    // { 'value': 'Nadroparin', 'label': 'Nadroparin (Fraxiparine) ' },
                    { 'value': 'Tinzaparin', 'label': 'Tinzaparin (Innohep)' },
                    // { 'value': 'Citrate', 'label': 'Citrate' },
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
                // 'glucoseIVOptions': ['No','Yes'],
                'glucoseIVAtOptions': [
                    { 'value': 1, 'label': 'At 1 hour'},
                    { 'value': 2, 'label': 'At 2 hour'},
                    { 'value': 3, 'label': 'At 3 hour'},
                    { 'value': 4, 'label': 'At 4 hour'},
                ],
                'o2RxOptions': [
                    'None',
                    'O2 canula',
                    'O2 mask with bag',
                    'Nasal high flow',
                    'NIV',
                    'Ventilator',
                ],
                'monitors': [
                    { name: 'monitoring_EKG', label: 'EKG' },
                    { name: 'monitoring_observe_chest_pain', label: 'Observe chest pain' },
                    { name: 'monitoring_observe_neuro_sign', label: 'Observe neuro sign' },
                    { name: 'monitoring_BP_map_greater_than_65mmhg', label: 'BP MAP > 65 mmHg' },
                ],
                'ekgOptions': ['No', 'Monitoring'],
                'accessTypeOptions': ['DLC','Perm cath','AVF','AVG'],
                'accessSiteOptionsAV': ['Rt arm','Lt arm','Rt leg','Lt leg'],
                'accessSiteOptionsNonAV': ['Rt IJV','Lt IJV','Rt Femoral vain','Lt Femoral vain','Rt SCV','Lt SCV'],
                'labSets': [
                    { name: '', labs: ['CBC', 'Hct', 'BUN', 'Cr'] },
                    { name: 'Electrolyte', labs: ['Na', 'K', 'Cl', 'HCO3'] },
                    { name: '', labs: ['Total calcium', 'Phosphate', 'iPTH'] },
                    { name: 'LFT', labs: ['Alb', 'Glob', 'TB', 'DB', 'AST', 'ALT', 'ALP', 'GGT'] },
                    { name: 'Coagulogram', labs: ['PT', 'INR', 'APTT', 'APTT ratio', 'Anti Xa'] },
                    { name: '', labs: ['Iron study', 'Ferritin'] },
                ],
                'validators': [
                    { name: 'heparin_loading_dose', min: 250, max: 2000, type: 'integer' },
                    { name: 'heparin_maintenance_dose', min: 0, max: 1500, type: 'integer' },
                    { name: 'enoxaparin_dose', min: 0.3, max: 0.8, type: 'float' },
                    { name: 'tinzaparin_dose', min: 1500, max: 3500, type: 'interger' },
                    { name: 'ultrafiltration', min: 0, max: 4000, type: 'interger' },
                    { name: 'glucose_50_percent_iv_volume', min: 50, max: 100, type: 'interger' },
                ]
            },
            errors: {
                'heparin_loading_dose': [],
                'heparin_maintenance_dose': [],
                'enoxaparin_dose': [],
                'tinzaparin_dose': [],
                'ultrafiltration': [],
                'glucose_50_percent_iv_volume': [],
            }
        };
    },
    methods: {
        validate (fieldname) {
            let validator = this.config.validators.filter((rule) => rule.name === fieldname)[0];
            const value = validator.type == 'integer' ? parseInt(this.prescription[fieldname]) :  parseFloat(this.prescription[fieldname]);
            if (value < validator.min || value > validator.max) {
                this.errors[fieldname][0] = `Data could not be saved. Accept range [${validator.min}, ${validator.max}].`;
                console.log(`${fieldname} invalid`);
            } else {
                this.errors[fieldname] = [];
            }
        }
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