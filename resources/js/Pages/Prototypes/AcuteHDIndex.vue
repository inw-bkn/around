<template>
    <div class="md:pb-12">
        <!-- create new case -->
        <teleport to="body">
            <modal
                ref="modal"
                width-mode="form-cols-1"
                @closed="resetAdmission"
            >
                <template #header>
                    <div class="font-semibold text-thick-theme-light">
                        Create New Case
                    </div>
                </template>
                <template #body>
                    <div class="py-4 my-2 md:py-6 md:my-4 border-t border-b border-bitter-theme-light">
                        <form-input
                            name="an"
                            label="an"
                            v-model="an"
                            pattern="\d*"
                            type="number"
                        />
                        <spinner-button
                            :spin="busy"
                            class="btn-dark w-full mt-2"
                            @click="searchAn"
                            :disabled="!an.length"
                        >
                            SEARCH
                        </spinner-button>
                        <hr class="my-4 md:my-6">
                        <span class="form-label block">Admission Data</span>
                        <div
                            v-if="!admission.hn"
                            class="bg-white rounded shadow p-2 lg:p-4 text-sm"
                            :class="{ 'animate-pulse': busy }"
                        >
                            <div class="mt-1">
                                <span class="bg-gray-100 text-gray-100 whitespace-nowrap">
                                    HN placeholder
                                </span>
                            </div>
                            <div class="mt-1">
                                <span class="bg-gray-100 text-gray-100 whitespace-nowrap">
                                    patient name placeholder
                                </span>
                            </div>
                            <div class="mt-1">
                                <span class="bg-gray-100 text-gray-100 whitespace-nowrap">
                                    gender placeholder
                                </span>
                            </div>
                            <div class="mt-1">
                                <span class="bg-gray-100 text-gray-100 whitespace-nowrap">
                                    age placeholder
                                </span>
                            </div>
                        </div>
                        <div
                            v-else
                            class="bg-white rounded shadow p-2 lg:p-4 text-sm"
                        >
                            <p class="mt-1 whitespace-nowrap">
                                {{ admission.hn }}
                            </p>
                            <p class="mt-1 whitespace-nowrap">
                                {{ admission.name }}
                            </p>
                            <p class="mt-1 whitespace-nowrap">
                                {{ admission.gender }}
                            </p>
                            <p class="mt-1 whitespace-nowrap">
                                {{ admission.age }}
                            </p>
                        </div>
                    </div>
                </template>
                <template #footer>
                    <div class="flex justify-end items-center">
                        <button
                            class="btn btn-bitter"
                            @click="createNewCase"
                            :disabled="!admission.hn"
                        >
                            CREATE
                        </button>
                    </div>
                </template>
            </modal>
        </teleport>
        <h1 class="font-semibold text-2xl text-gray-400">
            <inertia-link
                class="text-bitter-theme-light"
                :href="`${$page.props.app.baseUrl}/prototypes/ProceduresIndex`"
            >
                Procedures /
            </inertia-link>
            Acute HD
        </h1>
        <hr class="my-4 border-b-2 border-bitter-theme-light">
        <div class="flex justify-end mb-2">
            <button
                class="btn btn-bitter w-full md:w-auto md:px-4"
                @click="$refs.modal.open()"
            >
                Create New Case
            </button>
        </div>
        <div class="bg-white rounded shadow overflow-x-auto hidden md:block">
            <table class="w-full whitespace-no-wrap">
                <tr class="text-left font-semibold">
                    <th class="px-6 pt-6 pb-4">
                        AN
                    </th>
                    <th class="px-6 pt-6 pb-4">
                        HN
                    </th>
                    <th class="px-6 pt-6 pb-4">
                        Name
                    </th>
                    <th
                        class="px-6 pt-6 pb-4"
                        colspan="2"
                    >
                        Ward
                    </th>
                </tr>
                <tr
                    class="focus-within:bg-alt-theme-light"
                    v-for="(acuteCase, key) in cases"
                    :key="key"
                >
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ acuteCase.an }}
                        </div>
                    </td>
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ acuteCase.hn }}
                        </div>
                    </td>
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ acuteCase.name }}
                        </div>
                    </td>
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ acuteCase.ward }}
                        </div>
                    </td>
                    <td class="border-t">
                        <inertia-link
                            class="px-4 py-2 flex items-center focus:text-alt-theme-light"
                            :href="`${$page.props.app.baseUrl}/prototypes/AcuteHDCaseEdit`"
                        >
                            <div class="p-2 rounded-full bg-white hover:bg-alt-theme-light transition-colors ease-in-out duration-200">
                                <icon
                                    class="w-4 h-4 text-thick-theme-light"
                                    name="double-right"
                                />
                            </div>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>
        <div class="md:hidden">
            <div
                class="bg-white rounded shadow my-4 p-4"
                v-for="(acuteCase, key) in cases"
                :key="key"
            >
                <inertia-link
                    class="flex items-center justify-between focus:text-alt-theme-light"
                    :href="`${$page.props.app.baseUrl}/prototypes/AcuteHDCaseEdit`"
                >
                    <div>
                        <div class="my-2">
                            HN: {{ acuteCase.hn }} {{ acuteCase.name }}
                        </div>
                        <div class="my-2">
                            AN: {{ acuteCase.an }} {{ acuteCase.ward }}
                        </div>
                    </div>
                    <icon
                        class="w-4 h-4 text-thick-theme-light"
                        name="double-right"
                    />
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from '@/Components/Layouts/Layout';
import Icon from '@/Components/Helpers/Icon.vue';
import Modal from '@/Components/Helpers/Modal.vue';
import FormInput from '@/Components/Controls/FormInput.vue';
import SpinnerButton from '@/Components/Controls/SpinnerButton.vue';
export default {
    components: {
        Icon,
        Modal,
        FormInput,
        SpinnerButton
    },
    layout: Layout,
    data () {
        return {
            cases: [
                { an: 57586423, hn: 53164826, name: '🙍🏻‍♂️ Antony 38Yo', ward: 'อฎ 8 เหนือ' },
                { an: 57586513, hn: 48215632, name: '🙍🏻‍♂️ Alejandro 57Yo', ward: 'อฎ 9 เหนือ' },
                { an: 57586654, hn: 51236598, name: '🙍🏻‍♀️ Linda 53Yo', ward: 'อฎ 10 เหนือ' },
                { an: 57586721, hn: 50489652, name: '🙍🏻‍♂️ Retired 64Yo', ward: 'อฎ 8 ใต้' },
                { an: 57586832, hn: 44256318, name: '🙍🏻‍♀️ Avril 41Yo', ward: 'อฎ 9 ใต้' },
                { an: 57586901, hn: 52789321, name: '🙍🏻‍♀️ Janet 72Yo', ward: 'อฎ 10 ใต้' },
            ],
            an: '',
            busy: false,
            admission: {
                hn: '',
                name: '',
                gender: '',
                age: '',
            }
        };
    },
    methods: {
        resetAdmission () {
            this.admission.hn = '',
            this.busy = false;
        },
        searchAn () {
            this.busy = true;
            this.admission.hn = '';
            axios.post(`${this.$page.props.app.baseUrl}/admissions`, { an: this.an })
                .then(res => {
                    this.admission = res.data;
                    this.busy = false;
                }).catch(error => {
                    console.log(error);
                    this.busy = false;
                });
        },
        createNewCase () {
            this.$refs.modal.close();
            // wait for modal backdrop removed
            setTimeout(() => this.$inertia.visit(`${this.$page.props.app.baseUrl}/prototypes/AcuteHDCaseEdit`), 200);
        }
    }
};
</script>