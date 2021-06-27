<template>
    <div>
        <!-- main contailner, flex makes its childs extend full h -->
        <div class="md:h-screen md:flex md:flex-col">
            <!-- this is navbar, with no shrink (fixed width) -->
            <div class="md:flex md:flex-shrink-0 sticky top-0 z-30">
                <!-- left navbar on desktop and full bar on mobile -->
                <div class="bg-dark-theme-light text-white md:flex-shrink-0 md:w-56 xl:w-64 px-4 py-2 flex items-center justify-between md:justify-center">
                    <!-- the logo -->
                    <InertiaLink
                        class=" inline-block"
                        :href="route('home')"
                    >
                        <span class="font-lobster font-bold text-lg md:text-4xl">@round.</span>
                    </InertiaLink>
                    <!-- title display on mobile -->
                    <div class="text-soft-theme-light text-sm md:hidden">
                        {{ $page.props.flash.title }}
                    </div>
                    <!-- hamberger menu on mobile -->
                    <button
                        class="md:hidden transition-all duration-300 ease-out transform"
                        :class="{ 'scale-y-90 text-yellow-200' : mobileMenuVisible }"
                        @click="mobileMenuVisible = !mobileMenuVisible"
                    >
                        <svg
                            class="w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                        ><path
                            fill="currentColor"
                            d="M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z"
                        /></svg>
                    </button>
                </div>
                <!-- right navbar on desktop -->
                <div class="hidden md:flex w-full font-semibold text-dark-theme-light bg-alt-theme-light border-b sticky top-0 z-30 p-4 md:py-0 md:px-12 justify-between items-center">
                    <!-- title display on desktop -->
                    <div class="mt-1 mr-4">
                        {{ $page.props.flash.title }}
                    </div>
                    <!-- username and menu -->
                    <Dropdown>
                        <template #default>
                            <div class="flex items-center cursor-pointer select-none group">
                                <div class="group-hover:text-bitter-theme-light focus:text-bitter-theme-light mr-1 whitespace-no-wrap">
                                    <span>{{ $page.props.auth.user.name }}</span>
                                </div>
                                <icon
                                    class="w-4 h-4 group-hover:text-bitter-theme-light focus:text-bitter-theme-light"
                                    name="double-down"
                                />
                            </div>
                        </template>
                        <template #dropdown>
                            <div class="mt-2 py-2 shadow-xl bg-thick-theme-light text-white cursor-pointer rounded text-sm">
                                <InertiaLink
                                    class="block px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light"
                                    :href="route('preferences')"
                                >
                                    Preferences
                                </InertiaLink>
                                <InertiaLink
                                    class="w-full font-semibold text-left px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light"
                                    :href="route('logout')"
                                    method="delete"
                                    as="button"
                                    type="button"
                                >
                                    Logout
                                </InertiaLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <!-- menu on mobile -->
                <div
                    class="h-4/5 mx-1 md:hidden block fixed bottom-0 inset-x-0 overflow-y-scroll text-soft-theme-light bg-thick-theme-light rounded-tl-xl rounded-tr-xl transition-transform transform duration-300 ease-in-out"
                    :class="{ 'translate-y-full': !mobileMenuVisible }"
                >
                    <div class="p-4">
                        <!-- username and menu -->
                        <div
                            class="flex flex-col text-center justify-center"
                            @click="mobileMenuVisible = false"
                        >
                            <span class="inline-block py-1 text-white">{{ $page.props.auth.user.name }}</span>
                            <InertiaLink
                                class="block py-1"
                                :href="route('preferences')"
                            >
                                Preferences
                            </InertiaLink>
                            <InertiaLink
                                class="block py-1"
                                :href="route('logout')"
                                method="post"
                                as="button"
                                type="button"
                            >
                                Logout
                            </InertiaLink>
                        </div>
                        <hr class="my-4">
                        <MainMenu
                            @click="mobileMenuVisible = false"
                            :url="url()"
                        />
                    </div>
                </div>
            </div>
            <!-- this is content -->
            <div class="md:flex md:flex-grow md:overflow-hidden">
                <!-- this is sidebar menu on desktop -->
                <MainMenu
                    :url="url()"
                    class="hidden md:block bg-thick-theme-light flex-shrink-0 w-56 xl:w-64 py-12 px-6 overflow-y-auto"
                />
                <!-- this is main page -->
                <div
                    class="w-full p-4 md:overflow-y-auto md:py-12 lg:px-8 xl:px-10"
                    scroll-region
                >
                    <!-- <flash-messages /> -->
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Dropdown from '@/Components/Helpers/Dropdown.vue';
import Icon from '@/Components/Helpers/Icon.vue';
import MainMenu from '@/Components/Helpers/MainMenu.vue';
import { onMounted } from 'vue';
export default {
    components: {
        Dropdown,
        Icon,
        MainMenu
    },
    watch: {
        '$page.props.flash': {
            immediate: true,
            deep: true,
            handler() { document.title = this.$page.props.flash.title; }
        },
    },
    data () {
        return {
            mobileMenuVisible: false
        };
    },
    setup () {
        var lastTimeCheckSessionTimeout = Date.now();
        const endpoint = document.querySelector('meta[name=base-url]').content + '/session-timeout';
        const sessionLifetimeSeconds = parseInt(document.querySelector('meta[name=session-lifetime-seconds]').content);
        window.addEventListener('focus', () => {
            let timeDiff = Date.now() - lastTimeCheckSessionTimeout;
            if ( (timeDiff) > (sessionLifetimeSeconds) ) {
                window.axios
                    .post(endpoint)
                    .then(() => lastTimeCheckSessionTimeout = Date.now())
                    .catch(() => location.reload());
            }
        });

        onMounted (() => {
            const pageLoadingIndicator = document.getElementById('page-loading-indicator');
            if (pageLoadingIndicator) {
                pageLoadingIndicator.remove();
            }
        });
    },
    methods: {
        url() {
            return location.pathname.substr(1);
        },
    }
};
</script>