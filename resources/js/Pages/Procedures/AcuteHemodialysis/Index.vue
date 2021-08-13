<template>
    <div class="md:pb-12">
        <!-- search tool & create case -->
        <div class="flex flex-col-reverse md:flex-row justify-between items-center mb-4">
            <SearchIndex
                :scopes="['active', 'discharged', 'all']"
                :form="searchForm"
                @search-changed="(val) => searchForm.search = val"
                @scope-changed="(val) => searchForm.scope = val"
            />
            <button
                class="btn btn-bitter w-full mb-4 md:w-auto md:px-4 md:mb-0"
                @click="$refs.admissionForm.open()"
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
                    v-for="(caseRecord, key) in cases.data"
                    :key="key"
                >
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ caseRecord.an }}
                        </div>
                    </td>
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ caseRecord.hn }}
                        </div>
                    </td>
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ caseRecord.patient_name }}
                        </div>
                    </td>
                    <td class="px-6 py4 border-t">
                        <div class="flex items-center">
                            {{ caseRecord.ward }}
                        </div>
                    </td>
                    <td class="border-t">
                        <Link
                            class="px-4 py-2 flex items-center focus:text-alt-theme-light"
                            :href="route('procedures.acute-hemodialysis.edit', caseRecord.slug)"
                        >
                            <div class="p-2 rounded-full bg-white hover:bg-alt-theme-light transition-colors ease-in-out duration-200">
                                <Icon
                                    class="w-4 h-4 text-thick-theme-light"
                                    name="double-right"
                                />
                            </div>
                        </Link>
                    </td>
                </tr>
            </table>
        </div>
        <div class="md:hidden">
            <div
                class="bg-white rounded shadow my-4 p-4"
                v-for="(caseRecord, key) in cases.data"
                :key="key"
            >
                <Link
                    class="flex items-center justify-between focus:text-alt-theme-light"
                    :href="route('procedures.acute-hemodialysis.edit', caseRecord)"
                >
                    <div>
                        <div class="my-2">
                            HN: {{ caseRecord.hn }} {{ caseRecord.patient_name }}
                        </div>
                        <div class="my-2">
                            AN: {{ caseRecord.an }} {{ caseRecord.ward }}
                        </div>
                    </div>
                    <icon
                        class="w-4 h-4 text-thick-theme-light"
                        name="double-right"
                    />
                </Link>
            </div>
        </div>
    </div>
    <!-- create new case -->
    <Admission
        ref="admissionForm"
        @confirmed="confirmed"
    />
</template>

<script>
import Layout from '@/Components/Layouts/Layout';
import Icon from '@/Components/Helpers/Icon';
import Admission from '@/Components/Forms/Admission';
import SearchIndex from '@/Components/Helpers/SearchIndex';
import { ref } from '@vue/reactivity';
import { useForm } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: { Admission, Icon, SearchIndex, Link },
    layout: Layout,
    props: {
        cases: { type: Object, required: true },
        filters: { type: Object, required: true },
    },
    setup (props) {
        const admissionForm = ref(null);
        const newCase = useForm({
            an: null
        });
        const searchForm = useForm({
            search: props.filters.search,
            scope: props.filters.scope,
        });

        const confirmed = (an) => {
            console.log('yes mm' + an);
            newCase.an = an;
            newCase.post(window.route('procedures.acute-hemodialysis.store'));
        };

        return {
            admissionForm,
            newCase,
            searchForm,
            confirmed,
        };
    },
};
</script>