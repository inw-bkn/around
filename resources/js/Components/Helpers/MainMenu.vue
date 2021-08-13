<template>
    <div v-if="$page.props.flash.mainMenuLinks.length">
        <div class="mb-4">
            <template
                v-for="(link, key) in $page.props.flash.mainMenuLinks.filter(menu => menu.can)"
                :key="key"
            >
                <a
                    v-if="link.route.startsWith('#')"
                    :href="link.route"
                    class="flex items-center group py-2 outline-none truncate"
                >
                    <Icon
                        :name="link.icon"
                        class="w-4 h-4 mr-2 transition-colors duration-200 ease-linear text-soft-theme-light group-hover:text-bitter-theme-light"
                    />
                    <div
                        class="duration-300 ease-linear text-soft-theme-light group-hover:text-bitter-theme-light"
                    >
                        {{ link.label }}
                    </div>
                </a>
                <Link
                    class="flex items-center group py-2 outline-none truncate"
                    :href="link.route"
                    v-else-if="link.route.startsWith('http')"
                >
                    <Icon
                        :name="link.icon"
                        class="w-4 h-4 mr-2 transition-colors duration-200 ease-linear text-soft-theme-light group-hover:text-bitter-theme-light"
                    />
                    <div
                        class="duration-300 ease-linear text-soft-theme-light group-hover:text-bitter-theme-light"
                    >
                        {{ link.label }}
                    </div>
                </Link>
                <Link
                    class="flex items-center group py-2 outline-none truncate"
                    :href="route(link.route)"
                    v-else
                >
                    <Icon
                        :name="link.icon"
                        class="w-4 h-4 mr-2 transition-colors duration-200 ease-linear"
                        :class="isUrl(route(link.route)) ? 'text-white underline' : 'text-soft-theme-light group-hover:text-bitter-theme-light'"
                    />
                    <div
                        class="duration-300 ease-linear"
                        :class="isUrl(route(link.route)) ? 'text-white underline' : 'text-soft-theme-light group-hover:text-bitter-theme-light'"
                    >
                        {{ link.label }}
                    </div>
                </Link>
            </template>
        </div>
    </div>
</template>

<script>
import Icon from '@/Components/Helpers/Icon.vue';
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: { Icon, Link },
    setup () {
        const isUrl = (url) => {
            return (location.origin + location.pathname) === url;
        };

        return {
            isUrl,
        };
    }
};
</script>