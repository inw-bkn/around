<template>
    <div
        v-if="orders.length"
        class="space-y-1"
    >
        <div
            v-for="(order, key) in orders"
            :key="key"
            class="flex rounded bg-white p-2 "
        >
            <div class="w-2/3 px-4 py-2 md:flex justify-between items-center">
                <p>{{ order.date_note }}</p>
                <p>{{ order.ward_name }}</p>
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
        </div>
    </div>
    <p
        v-else
        class="italic"
    >
        No orders
    </p>
</template>

<script>
import Icon from '@/Components/Helpers/Icon';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: { Icon, Link },
    props: {
        orders: { type: Array, required: true }
    },
    setup() {

    },
};
</script>