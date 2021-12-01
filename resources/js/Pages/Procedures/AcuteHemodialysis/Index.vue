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
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-semibold">
                    <th
                        class="px-6 pt-6 pb-4"
                        v-for="column in ['HN', 'Name', 'Dialyze on', 'Ordered on', 'MD']"
                        :key="column"
                        v-text="column"
                        :colspan="column === 'MD' ? 2:1"
                    />
                </tr>
                <tr
                    class="focus-within:bg-alt-theme-light"
                    v-for="(caseRecord, key) in cases.data"
                    :key="key"
                >
                    <td
                        class="px-6 py4 border-t"
                        v-for="field in ['hn', 'patient_name', 'date_dialyze', 'date_reserved', 'md']"
                        :key="field"
                        v-text="caseRecord[field]"
                    />
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
                    class="flex items-center justify-between focus:text-alt-theme-light space-x-4"
                    :href="route('procedures.acute-hemodialysis.edit', caseRecord.slug)"
                >
                    <div class="w-full">
                        <div class="my-2 pl-2">
                            HN: {{ caseRecord.hn }} {{ caseRecord.patient_name }}
                        </div>
                        <div class="my-2 p-2 bg-gray-100 rounded space-y-2">
                            <div class="flex items-center justify-between">
                                <p class="text-xs italic text-thick-theme-light font-semibold">
                                    Latest
                                </p>
                                <p class="font-semibold text-bitter-theme-light text-xs flex items-center">
                                    <Icon
                                        name="user-md"
                                        class="h-3 w-3 mr-1"
                                    />
                                    <span class="block italic truncate">{{ caseRecord.md }}</span>
                                </p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p>
                                    Dialyze : <span
                                        class="text-dark-theme-light font-semibold"
                                        v-text="caseRecord.date_dialyze"
                                    />
                                </p>
                                <p>
                                    Ordered : <span
                                        class="text-dark-theme-light font-semibold"
                                        v-text="caseRecord.date_reserved"
                                    />
                                </p>
                            </div>
                        </div>
                    </div>
                    <icon
                        class="w-4 h-4 text-thick-theme-light"
                        name="double-right"
                    />
                </Link>
            </div>
        </div>

        <!-- pagination -->
        <div v-if="cases.links.length > 3">
            <div class="flex flex-wrap -mb-1 mt-4">
                <template v-for="(link, key) in cases.links">
                    <div
                        v-if="link.url === null"
                        :key="key"
                        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 bg-gray-200 text-gray-400 border rounded cursor-not-allowed"
                        v-html="link.label"
                    />
                    <Link
                        v-else
                        :key="key+'theLink'"
                        class="mr-1 mb-1 px-4 py-3 text-sm text-dark-theme-light leading-4 border border-alt-theme-light rounded hover:bg-white focus:border-dark-theme-light focus:text-dark-theme-light transition-colors"
                        :class="{ 'bg-alt-theme-light cursor-not-allowed hover:bg-alt-theme-light': link.active }"
                        :href="link.url"
                        as="button"
                        :disabled="link.active"
                        v-html="link.label"
                    />
                </template>
            </div>
        </div>
    </div>
    <!-- create new case -->
    <Admission
        ref="admissionForm"
        @confirmed="confirmed"
        mode="hn"
    />
</template>

<script setup>
import Icon from '@/Components/Helpers/Icon';
import Admission from '@/Components/Forms/Admission';
import SearchIndex from '@/Components/Helpers/SearchIndex';
import { ref } from '@vue/reactivity';
import { useForm } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    cases: { type: Object, required: true },
    filters: { type: Object, required: true },
});

const admissionForm = ref(null);
const newCase = useForm({
    hn: null,
    an: null
});
const searchForm = useForm({
    search: props.filters.search,
    scope: props.filters.scope,
});

const confirmed = (admission) => {
    newCase.hn = admission.hn;
    newCase.an = admission.an;
    newCase.post(window.route('procedures.acute-hemodialysis.store'));
};
</script>
