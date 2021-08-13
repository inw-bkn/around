<template>
    <p class="mt-1 italic text-xs text-bitter-theme-light">
        ๏ Not in any particular order
    </p>
    <transition-group
        name="flip-list"
        class="mt-2 lg:mt-0 grid grid-cols-4 gap-2"
        tag="div"
    >
        <div
            class="w-full p-2 md:p-4 rounded shadow"
            :class="{
                'col-span-4': slot.slotColSpan === 4,
                'col-span-2': slot.slotColSpan === 2,
                'col-span-1': slot.slotColSpan === 1,
                'bg-red-300 md:flex justify-between items-center': !slot.available,
                'bg-green-300 p-4': slot.available,
            }"
            v-for="(slot, key) in slots"
            :key="key"
        >
            <template v-if="!slot.available">
                <span class="p-1 md:p-2 bg-soft-theme-light rounded-full text-xs text-bitter-theme-light font-semibold">{{ slot.type }}</span>
                <div class="mt-1 md:mt-0 space-y-1 md:space-y-2">
                    <Link
                        class="font-bold text-soft-theme-light text-xs flex items-center"
                        :href="route('procedures.acute-hemodialysis.edit', slot.case_record_slug)"
                    >
                        <Icon
                            name="patient"
                            class="h-3 w-3 mr-1 text-white"
                        />
                        <span class="block italic truncate underline">{{ slot.patient_name }}</span>
                    </Link>
                    <p class="font-bold text-soft-theme-light text-xs flex items-center">
                        <Icon
                            name="user-md"
                            class="h-3 w-3 mr-1 text-white"
                        />
                        <span class="block italic truncate">{{ slot.author }}</span>
                    </p>
                </div>
            </template>
        </div>
    </transition-group>
</template>

<script>
import Icon from '@/Components/Helpers/Icon';
import { computed } from '@vue/runtime-core';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: { Icon, Link },
    props: {
        reservedSlots: { type: Array, required: true }
    },
    setup (props) {
        const slotColSpan = (typeName) => {
            if (typeName === 'SLEDD') {
                return 4;
            } else if (typeName.indexOf('4') !== -1) {
                return 2;
            } else {
                return 1;
            }
        };

        const slots = computed(() => {
            let reserveSlots = props.reservedSlots.map(s => {
                s.slotColSpan = slotColSpan(s.type);
                s.type = s.type.split(' ')[0];
                s.available = false;
                return s;
            });
            let availableSlots = 32 - props.reservedSlots.reduce((sum, s) => sum + s.slotColSpan, 0);
            for(let i = 1;  i <= availableSlots; i++) {
                reserveSlots.push({ slotColSpan: 1, available: true });
            }
            return reserveSlots.sort((a, b) => a.slotColSpan < b.slotColSpan);
        });

        return {
            slotColSpan,
            slots
        };
    },
};
</script>