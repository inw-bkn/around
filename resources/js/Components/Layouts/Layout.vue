<template>
    <Head>
        <title>{{ $page.props.flash.title }}</title>
    </Head>
    <!-- <div> -->
    <!-- main contailner, flex makes its childs extend full h -->
    <div class="md:h-screen md:flex md:flex-col">
        <!-- this is navbar, with no shrink (fixed width) -->
        <header class="md:flex md:shrink-0 sticky top-0 z-30">
            <!-- left navbar on desktop and full bar on mobile -->
            <div class="bg-dark-theme-light text-white md:shrink-0 md:w-56 xl:w-64 px-4 py-2 flex items-center justify-between md:justify-center">
                <!-- the logo -->
                <Link
                    class=" inline-block"
                    :href="route('home')"
                >
                    <span class="font-lobster font-bold text-lg md:text-4xl">@round.</span>
                </Link>
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
                <div class="mr-4 w-full flex justify-between items-center">
                    <div>{{ $page.props.flash.title }}</div>
                    <div class="text-white">
                        <button
                            class="w-6 h-6 rounded-full transition-colors duration-200 ease-in hover:bg-white hover:text-dark-theme-light mr-2"
                            v-text="'a'"
                            @click="scaleFont('down')"
                        />
                        <button
                            class="w-6 h-6 rounded-full transition-colors duration-200 ease-in hover:bg-white hover:text-dark-theme-light font-semibold mr-2"
                            v-text="'A'"
                            @click="scaleFont('up')"
                        />
                    </div>
                </div>
                <!-- username and menu -->
                <Dropdown>
                    <template #default>
                        <div class="cursor-pointer select-none group">
                            <div class="flex items-center group-hover:text-bitter-theme-light focus:text-bitter-theme-light mr-1 whitespace-nowrap transition-colors duration-200 ease-out">
                                {{ $page.props.auth.user.name }}
                                <icon
                                    class="w-4 h-4 ml-1"
                                    name="chevron-circle-down"
                                />
                            </div>
                        </div>
                    </template>
                    <template #dropdown>
                        <div class="mt-2 py-2 shadow-xl bg-thick-theme-light text-white cursor-pointer rounded text-sm">
                            <Link
                                class="block px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light"
                                :href="route('preferences')"
                            >
                                Preferences
                            </Link>
                            <Link
                                class="w-full font-semibold text-left px-6 py-2 hover:bg-dark-theme-light hover:text-soft-theme-light"
                                :href="route('logout')"
                                method="delete"
                                as="button"
                                type="button"
                            >
                                Logout
                            </Link>
                        </div>
                    </template>
                </Dropdown>
            </div>
            <!-- menu on mobile -->
            <div
                class="h-4/5 mx-1 md:hidden block fixed bottom-0 inset-x-0 overflow-y-scroll text-soft-theme-light bg-thick-theme-light rounded-tl-xl rounded-tr-xl transition-transform  duration-300 ease-in-out"
                :class="{ 'translate-y-full': !mobileMenuVisible }"
            >
                <div class="p-4">
                    <!-- username and menu -->
                    <div
                        class="flex flex-col text-center justify-center"
                        @click="mobileMenuVisible = false"
                    >
                        <span class="inline-block py-1 text-white">{{ $page.props.auth.user.name }}</span>
                        <Link
                            class="block py-1"
                            :href="route('preferences')"
                        >
                            Preferences
                        </Link>
                        <Link
                            class="block py-1"
                            :href="route('logout')"
                            method="delete"
                            as="button"
                            type="button"
                        >
                            Logout
                        </Link>
                    </div>
                    <hr class="my-4">
                    <MainMenu
                        @click="mobileMenuVisible = false"
                        scroll-mode="mobile"
                    />
                </div>
            </div>
        </header>
        <!-- this is content -->
        <main class="md:flex md:flex-grow md:overflow-hidden">
            <!-- this is sidebar menu on desktop -->
            <aside class="hidden md:block bg-thick-theme-light shrink-0 w-56 xl:w-64 py-12 px-6 overflow-y-auto">
                <MainMenu />
                <ActionMenu @action-clicked="actionClicked" />
            </aside>
            <!-- this is main page -->
            <div
                class="w-full p-4 md:overflow-y-auto md:py-12 lg:px-8 xl:px-10"
                scroll-region
            >
                <!-- <flash-messages /> -->
                <slot />
            </div>
        </main>
    </div>
    <!-- </div> -->
</template>

<script setup>
import Dropdown from '@/Components/Helpers/Dropdown';
import Icon from '@/Components/Helpers/Icon';
import MainMenu from '@/Components/Helpers/MainMenu';
import ActionMenu from '@/Components/Helpers/ActionMenu';
import { useCheckSessionTimeout } from '@/Functions/useCheckSessionTimeout';
import { nextTick, ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/inertia-vue3';
useCheckSessionTimeout();

const mobileMenuVisible = ref(false);
const actionClicked = (action) => {
    mobileMenuVisible.value = false;
    nextTick(() => {
        setTimeout(() => {
            usePage().props.value.event.payload = action;
            usePage().props.value.event.name = 'action-clicked';
            usePage().props.value.event.fire = + new Date();
        }, 300); // equal to animate duration
    });
};

let fontScaleIndex = 3;
let fontScales = [67, 80, 90, 100];
const scaleFont = (mode) => {
    fontScaleIndex = mode === 'up' ? (fontScaleIndex+1) : (fontScaleIndex-1);
    if (fontScaleIndex > (fontScales.length - 1)) {
        fontScaleIndex = fontScales.length - 1;
    } else if (fontScaleIndex < 0) {
        fontScaleIndex = 0;
    }

    document.querySelector('body').style.fontSize = fontScales[fontScaleIndex] + '%';
};
</script>