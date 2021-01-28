<template>
    <div class="h-screen flex flex-col justify-items-center items-center">
        <div class="my-auto text-center">
            <inertia-link
                :href="`${$page.props.app.baseUrl}/home`"
                class="font-lobster text-6xl md:text-9xl text-bitter-theme-light block floating-logo"
            >
                @round.
            </inertia-link>
            <small class="block text-dark-theme-light tracking-widest md:font-semibold mt-5">around 🤲🏻 about 🙌🏻 arrange</small>
            <small class="block text-white tracking-wide md:hidden mt-4 animate-pulse">app ...ที่เราเคยคุยกัน</small>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {};
    }
};
</script>

<style scoped>
    .floating-logo {
        transform: translatey(0px);
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0% {
            transform: translatey(0px);
        }
        50% {
            transform: translatey(-20px);
        }
        100% {
            transform: translatey(0px);
        }
    }
</style>