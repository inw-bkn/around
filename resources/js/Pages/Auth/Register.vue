<template>
    <Head>
        <title>Register</title>
    </Head>

    <div class="flex flex-col justify-center items-center w-full min-h-screen my-6">
        <div class="w-40 h-40 z-10 border-soft-theme-light border-4 rounded-full">
            <img
                :src="route('home') + '/image/logo.png'"
                alt="around logo"
            >
        </div>
        <div class="mt-4 px-4 py-8 w-80 lg:w-96 bg-white rounded shadow -translate-y-20">
            <span class="block font-semibold text-xl text-bitter-theme-light mt-12 text-center">Register</span>
            <div
                class="mt-4"
            />
            <FormInput
                class="mt-2"
                name="name"
                label="display name"
                v-model="form.name"
                :error="form.errors.name"
                placeholder="nickname, alias anything you want"
                ref="name_input"
            />
            <FormInput
                class="mt-2"
                name="full_name"
                label="full name"
                placeholder="title first name last name"
                v-model="form.full_name"
                :error="form.errors.full_name"
                :readonly="profile.org_id !== undefined"
            />
            <FormInput
                class="mt-2"
                type="tel"
                name="tel_no"
                label="tel no"
                v-model="form.tel_no"
                :error="form.errors.tel_no"
                placeholder="for emergency case only"
            />
            <FormInput
                v-if="profile.is_md"
                class="mt-2"
                type="tel"
                name="pln"
                label="license number"
                v-model="form.pln"
                :error="form.errors.pln"
                placeholder="เลข ว."
            />
            <FormCheckbox
                class="mt-2"
                v-model="form.agreement_accepted"
                label="Accept Terms and Policies"
                :toggler="true"
            />
            <a
                :href="route('terms')"
                class="mt-2 block text-bitter-theme-light underline"
                target="_blank"
            >Terms and Policies</a>
            <SpinnerButton
                :spin="form.processing"
                class="btn-bitter w-full mt-4"
                @click="register"
                :disabled="!formComplete"
            >
                REGISTER
            </SpinnerButton>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import FormCheckbox from '@/Components/Controls/FormCheckbox.vue';
import FormInput from '@/Components/Controls/FormInput';
import SpinnerButton from '@/Components/Controls/SpinnerButton';
import { useCheckSessionTimeout } from '@/Functions/useCheckSessionTimeout';
import { computed, nextTick, onMounted, ref } from '@vue/runtime-core';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
    // eslint-disable-next-line vue/require-default-prop
    layout: null,
    profile: { type: Object, required: true }
});

useCheckSessionTimeout();

const name_input = ref();
onMounted(() => {
    nextTick(() => name_input.value.focus());
});

const form = useForm({
    login: props.profile.username,
    full_name: props.profile.name,
    org_id: props.profile.org_id,
    division: props.profile.org_division_name,
    position: props.profile.org_position_title,
    password_expires_in_days: props.profile.password_expires_in_days,
    remark: props.profile.remark,
    name: null,
    tel_no: null,
    pln: null,
    is_md: props.profile.is_md,
    agreement_accepted: false,
    remember: true
});

const formComplete = computed(() =>
    form.agreement_accepted &&
    form.name &&
    form.full_name &&
    form.tel_no
);

const register = () => {
    form.transform(data => ({
        ...data,
        remember: data.remember ? 'on' : '',
    })).post(window.route('register.store'), {
        onFinish: () => form.processing = false,
    });
};
</script>