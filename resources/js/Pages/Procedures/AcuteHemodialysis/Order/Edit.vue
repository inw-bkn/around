<template>
    <div class="md:pb-12">
        <h2
            class="form-label text-lg italic text-thick-theme-light"
            id="reservation"
        >
            Reservation data
        </h2>
        <hr class="my-4 border-b border-bitter-theme-light">
        <div class="grid gap-2 md:gap-4 md:grid-cols-2 xl:gap-8 2xl:grid-cols-4">
            <FormInput
                v-model="form.reservation.hn"
                name="hn"
                label="hn"
                :readonly="true"
            />
            <FormInput
                v-model="form.reservation.an"
                name="an"
                label="an"
                :readonly="true"
            />
            <FormInput
                v-model="form.reservation.dialysis_at"
                name="dialysis_at"
                label="dialysis at"
                :readonly="true"
            />
            <FormInput
                v-model="form.dialysis_type"
                name="dialysis_type"
                label="dialysis type"
                :readonly="true"
            />
        </div>

        <HD
            v-if="orderForm.hd !== undefined"
            v-model="form.hd"
            :form-configs="formConfigs"
            @autosave="autosave"
        />
    </div>
</template>

<script setup>
import HD from '@/Components/Forms/AcuteHD/HD';
import FormInput from '@/Components/Controls/FormInput';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import debounce from 'lodash/debounce';

const props = defineProps({
    orderForm: { type: Object, required: true },
    formConfigs: { type: Object, required: true },
});
const form = useForm({...props.orderForm});
const patchEndpoint = window.route('procedures.acute-hemodialysis.orders.update', form.record.slug);
const autosave = debounce(function () {
    window.axios
        .patch(patchEndpoint, form.data())
        .catch(error => {
            console.log(error);
        });
}, 2000);

</script>
<script>
import Layout from '@/Components/Layouts/Layout';
export default { layout: Layout };
</script>