<template>
    <Head>
        <title>Login</title>
    </Head>
    <div class="flex flex-col justify-center items-center w-full min-h-screen">
        <div class="w-40 h-40 z-10 border-soft-theme-light border-4 rounded-full floating-logo">
            <img
                :src="route('home') + '/image/logo.png'"
                alt="around logo"
            >
        </div>
        <div class="mt-4 px-4 py-8 w-80 bg-white rounded shadow transform -translate-y-20">
            <span class="block text-xl text-bitter-theme-light mt-12 text-center">around 🤲🏻 about 🙌🏻 arrange</span>
            <FormInput
                class="mt-8"
                label="login"
                name="login"
                v-model="form.login"
                :error="form.errors.login"
                ref="loginInput"
            />
            <FormInput
                class="mt-2"
                type="password"
                label="password"
                name="password"
                v-model="form.password"
                :error="form.errors.password"
                @keydown.enter="login"
            />
            <SpinnerButton
                :spin="form.processing"
                class="btn-bitter w-full mt-8"
                @click="login"
            >
                ENTER
            </SpinnerButton>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import FormInput from '@/Components/Controls/FormInput';
import SpinnerButton from '@/Components/Controls/SpinnerButton';
import { useCheckSessionTimeout } from '@/Functions/useCheckSessionTimeout';
import { nextTick, onMounted, ref } from '@vue/runtime-core';
import { Head } from '@inertiajs/inertia-vue3';
useCheckSessionTimeout();
const loginInput = ref(null);

onMounted(() => {
    nextTick(() => {
        console.log(loginInput.value.focus);
        loginInput.value.focus();
    });
});
const form = useForm({
    login: null,
    password: null,
    remember: true
});

const login = () => {
    form.transform(data => ({
        login: data.login.toLowerCase(),
        password: data.password,
        remember: data.remember ? 'on' : '',
    })).post(window.route('login.store'), {
        replace: true,
        onFinish: () => form.processing = false,
    });
};
</script>

<style scoped>
    .bg-line {
        background-color: #00b900;
    }
    .bg-telegram {
        background-color: #54a9eb;
    }
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
<script>
import Plain from '@/Components/Layouts/Plain';
export default { layout: Plain };
</script>