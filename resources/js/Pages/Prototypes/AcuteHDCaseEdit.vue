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
            Admission data
        </h2>
        <hr class="my-4 border-b border-thick-theme-light">
        <div class="p-32 bg-white text-center">
            (requirement pending)
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
import FormSelect from '@/Components/Controls/FormSelect.vue';
import FormDatetime from '@/Components/Controls/FormDatetime.vue';
export default {
    components: { FormSelect, FormDatetime },
    layout: Layout,
    data () {
        return {
            order: {
                type: '',
                ward: '',
                date_required: ''
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
                wardOptions: ['ไตเทียม', 'ICU 3', 'ICU 7', 'CCU', 'ICCU', 'ICU ตั้งตรงจิต', 'ICU สลาด สำอางค์', 'ICU สยามมินทร์', 'ICU ประสาทศัลยศาสตร์', 'ICU ศูนย์โรคหัวใจชั้น 5', 'ICU premium', 'ICU อุบัติเหตุ', 'Burn unit', 'RCU']
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