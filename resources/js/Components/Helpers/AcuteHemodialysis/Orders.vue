<template>
    <div
        v-if="orders.length"
        class="space-y-1"
    >
        <!-- table  -->
        <div class="bg-white rounded shadow overflow-x-auto hidden md:block">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-semibold">
                    <th
                        class="px-6 pt-6 pb-4"
                        v-for="column in ['On', 'Type', 'At', 'MD']"
                        :key="column"
                        v-text="column"
                        :colspan="column === 'MD' ? 2:1"
                    />
                </tr>
                <tr
                    class="focus-within:bg-alt-theme-light"
                    v-for="(order, key) in orders"
                    :key="key"
                >
                    <td
                        class="px-6 py4 border-t"
                        v-for="field in ['date_dialyze', 'dialysis_type', 'ward_name', 'md']"
                        :key="field"
                        v-text="order[field]"
                    />
                    <td class="border-t">
                        <Link
                            class="px-4 py-2 flex items-center focus:text-alt-theme-light"
                            :href="route('procedures.acute-hemodialysis.orders.edit', order.slug)"
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
        <!-- card -->
        <div class="md:hidden space-y-2">
            <div
                v-for="(order, key) in orders"
                :key="key"
                class="rounded bg-white py-2 px-4"
            >
                <div class="flex justify-between items-center p-2">
                    <p class="text-thick-theme-light font-semibold">
                        {{ order.date_dialyze }}
                    </p>
                    <p class="italic">
                        {{ order.dialysis_type }}
                    </p>
                    <p class="font-semibold text-bitter-theme-light flex items-center">
                        <Icon
                            name="user-md"
                            class="h-3 w-3 mr-1"
                        />
                        <span class="block truncate">{{ order.md }}</span>
                    </p>
                </div>
                <div class="flex items-center p-2 rounded bg-gray-100">
                    <p class="w-3/4">
                        {{ order.ward_name }}
                    </p>
                    <div class="w-1/3 flex justify-end">
                        <Link
                            class="px-4 py-2 flex items-center focus:text-alt-theme-light"
                            :href="route('procedures.acute-hemodialysis.orders.edit', order.slug)"
                        >
                            <div class="p-2 rounded-full bg-white">
                                <Icon
                                    class="w-4 h-4 text-thick-theme-light"
                                    name="double-right"
                                />
                            </div>
                        </Link>
                    </div>
                </div>
                <!--
                <div class="w-2/3 px-4 py-2 md:flex justify-between items-center">
                    <p>{{ order.date_dialyze }}</p>
                    <p>{{ order.dialysis_type }}</p>
                    <p>{{ order.ward_name }}</p>
                    <p>{{ order.md }}</p>
                </div>
                <div class="w-1/3 flex justify-end">
                    <Link
                        class="px-4 py-2 flex items-center focus:text-alt-theme-light"
                        :href="route('procedures.acute-hemodialysis.orders.edit', order.slug)"
                    >
                        <div class="p-2 rounded-full bg-white hover:bg-alt-theme-light transition-colors ease-in-out duration-200">
                            <Icon
                                class="w-4 h-4 text-thick-theme-light"
                                name="double-right"
                            />
                        </div>
                    </Link>
                </div>
                -->
            </div>
        </div>
    </div>
    <p
        v-else
        class="italic"
    >
        No orders
    </p>
</template>

<script setup>
import Icon from '@/Components/Helpers/Icon';
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
    orders: { type: Array, required: true }
});
</script>