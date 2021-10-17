<template>
    <template v-if="$page.props.flash.mainMenuLinks.length">
        <nav class="mb-4">
            <template
                v-for="(link, key) in $page.props.flash.mainMenuLinks.filter(menu => menu.can)"
                :key="key"
            >
                <!-- in page -->
                <a
                    v-if="link.route.startsWith('#')"
                    :href="link.route"
                    class="flex items-center group py-2 outline-none truncate"
                    @click.prevent="smoothScroll(link.route)"
                >
                    <Icon
                        :name="link.icon"
                        class="w-4 h-4 mr-2 transition-colors duration-200 ease-linear text-soft-theme-light group-hover:text-bitter-theme-light"
                    />
                    <div
                        class="duration-200 ease-linear text-soft-theme-light group-hover:text-bitter-theme-light"
                    >
                        {{ link.label }}
                    </div>
                </a>
                <!-- download -->
                <a
                    class="flex items-center group py-2 outline-none truncate"
                    :href="route(link.route)"
                    v-else-if="link.use_a_tag"
                >
                    <Icon
                        :name="link.icon"
                        class="w-4 h-4 mr-2 transition-colors duration-200 ease-linear"
                        :class="isUrl(route(link.route)) ? 'text-white' : 'text-soft-theme-light group-hover:text-bitter-theme-light'"
                    />
                    <div
                        class="transition-colors duration-200 ease-linear"
                        :class="isUrl(route(link.route)) ? 'text-white border-b-2' : 'text-soft-theme-light group-hover:text-bitter-theme-light'"
                    >
                        {{ link.label }}
                    </div>
                </a>
                <!-- full url -->
                <Link
                    class="flex items-center group py-2 outline-none truncate"
                    :href="link.route"
                    v-else-if="link.route.startsWith('http')"
                >
                    <Icon
                        :name="link.icon"
                        class="w-4 h-4 mr-2 transition-colors duration-200 ease-linear text-soft-theme-light group-hover:text-bitter-theme-ligh"
                    />
                    <div class="transition-colors duration-200 ease-linear text-soft-theme-light group-hover:text-bitter-theme-light">
                        {{ link.label }}
                    </div>
                </Link>
                <!-- name route -->
                <Link
                    class="flex items-center group py-2 outline-none truncate"
                    :href="route(link.route)"
                    v-else
                >
                    <Icon
                        :name="link.icon"
                        class="w-4 h-4 mr-2 transition-colors duration-200 ease-linear"
                        :class="isUrl(route(link.route)) ? 'text-white' : 'text-soft-theme-light group-hover:text-bitter-theme-light'"
                    />
                    <div
                        class="transition-colors duration-200 ease-linear"
                        :class="isUrl(route(link.route)) ? 'text-white border-b-2' : 'text-soft-theme-light group-hover:text-bitter-theme-light'"
                    >
                        {{ link.label }}
                    </div>
                </Link>
            </template>
        </nav>
    </template>
</template>

<script setup>
import Icon from '@/Components/Helpers/Icon.vue';
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    scrollMode: {type:String, default: 'desktop'}
});
const isUrl = (url) => {
    return (location.origin + location.pathname) === url;
};
const smoothScroll = (href) => {
    const target = document.querySelector(href);
    if (target === undefined) {
        return;
    }
    if (props.scrollMode === 'mobile') {
        window.scroll({
            top: target.getBoundingClientRect().top -
                 document.querySelector('header').offsetHeight * 2,
            left: 0,
            behavior: 'smooth'
        });
    } else {
        document.querySelector(href).scrollIntoView({
            behavior: 'smooth'
        });
    }
};
</script>