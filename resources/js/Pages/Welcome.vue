<template>
    <div>
        <h1 class="text-pink-200">
            Hello
        </h1>
        <button class="p-4 font-medium text-lg text-gray-200 shadow transition-all duration-300 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed">
            Click ME
        </button>
        <button
            class="p-4 font-medium text-lg text-gray-200 shadow transition-all duration-300 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed"
            disabled
        >
            Click ME DISABLED
        </button>
        <div>
            <button class="btn btn-blue">
                Click Bule
            </button>
            <button
                class="btn btn-blue"
                disabled
            >
                Click Bule
            </button>
        </div>
        <div>
            <button class="btn btn-red">
                Click Red
            </button>
            <button
                class="btn btn-red"
                disabled
            >
                Click Red
            </button>
        </div>
        <div>
            <button class="btn btn-blue btn-spinner">
                Spinner
            </button>
        </div>
        <div>
            <label class="form-label">
                Input
            </label>
            <input
                type="text"
                class="form-input"
            >
        </div>
        <div>
            <label class="form-label">
                Input DISABLED
            </label>
            <input
                type="text"
                class="form-input"
                disabled
            >
        </div>
        <div>
            <label class="inline-flex items-center cursor-pointer">
                <input
                    type="checkbox"
                    class="shadow-xs text-gray-600 h-6 w-6 transition-all duration-200 ease-in-out appearance-none color inline-block align-middle border select-none flex-shrink-0 rounded cursor-pointer focus:outline-none"
                >
                <span class="ml-4 text-lg">check me นะจ๊ะคนดี</span>
            </label>
        </div>
        <div>
            <form-input
                label="name"
                name="name"
                v-model="name"
                @autosave="autosave('name')"
            />
        </div>
        <div>
            <form-select
                label="gameConsole"
                name="gameConsole"
                v-model="gameConsole"
                :options="['PS1', 'PS2', 'PS3', 'PS4', 'PS5']"
            />
        </div>
        <div>
            <form-checkbox
                v-model="preOrder"
                label="pre order"
            />
            <form-checkbox
                v-model="postOrder"
                label="post order"
            />
        </div>
        <div>
            <spinner-button
                @click="submitting = true"
                :spin="submitting"
            >
                Submit
            </spinner-button>
        </div>
        <div>
            <form-datetime
                label="reserve date"
                v-model="reserveDate"
                name="reserveDate"
            />
        </div>
        <div>
            <form-checkbox
                v-model="toggle"
                label="toggle me"
            />
            <form-checkbox
                v-model="toggle"
                label="toggle me"
                :toggler="true"
            />
        </div>
    </div>
</template>

<script>
import FormInput from '@/Components/Controls/FormInput';
import FormSelect from '@/Components/Controls/FormSelect';
import FormCheckbox from '@/Components/Controls/FormCheckbox.vue';
import SpinnerButton from '@/Components/Controls/SpinnerButton.vue';
import FormDatetime from '@/Components/Controls/FormDatetime.vue';
export default {
    components: {
        FormInput,
        FormSelect,
        FormCheckbox,
        SpinnerButton,
        FormDatetime,
    },
    data () {
        return {
            name: '',
            gameConsole: '',
            preOrder: false,
            postOrder: true,
            submitting: false,
            reserveDate: '',
            toggle: false
        };
    },
    methods: {
        autosave (name) {
            console.log(this[name]);
        }
    }
};
</script>