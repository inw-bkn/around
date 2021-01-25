<template>
    <div>
        <div
            class="mb-4"
        >
            <inertia-link
                class="flex items-center group py-2"
                href="/"
                v-for="(link, key) in links"
                :key="key"
            >
                <icon
                    :name="link.icon"
                    class="w-4 h-4 mr-2"
                    :class="isUrl('') ? 'text-white' : 'text-soft-theme-light group-hover:text-white'"
                />
                <div :class="isUrl('') ? 'text-white' : 'text-soft-theme-light group-hover:text-white'">
                    {{ link.label }}
                </div>
            </inertia-link>
        </div>
    </div>
</template>

<script>
import Icon from '@/Components/Helpers/Icon.vue';
export default {
    components: { Icon },
    data () {
        return {
            links: [
                { 'icon': 'patient', 'label' : 'Patients' },
                { 'icon': 'clinic', 'label' : 'Clinics' },
                { 'icon': 'procedure', 'label' : 'Procedures' }
            ]
        };
    },
    methods: {
        isUrl(url) {
            return false;
        }
    }
};
</script>