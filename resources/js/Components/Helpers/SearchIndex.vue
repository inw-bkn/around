<template>
    <div class="flex items-center w-full md:w-auto">
        <input
            class="form-input md:w-auto border-r-0 rounded-r-none"
            type="text"
            name="search"
            @input="$emit('searchChanged', $event.target.value)"
            placeholder="search..."
            autocomplete="off"
        >
        <div class="flex justify-end form-input md:w-auto border-l-0 rounded-l-none">
            <dropdown>
                <template #default>
                    <div class="flex items-center cursor-pointer select-none group">
                        <div>Scope : </div>
                        <div class="group-hover:text-bitter-theme-light focus:text-bitter-theme-light mr-1 whitespace-no-wrap">
                            <span class="text-thick-theme-light group-hover:text-bitter-theme-light focus:text-bitter-theme-light">{{ form.scope }}</span>
                        </div>
                        <icon
                            class="w-4 h-4 text-thick-theme-light group-hover:text-bitter-theme-light focus:text-bitter-theme-light"
                            name="double-down"
                        />
                    </div>
                </template>
                <template #dropdown>
                    <div class="mt-2 p-2 shadow-xl bg-white text-thick-theme-light cursor-pointer rounded text-sm">
                        <button
                            class="block w-full text-left font-semibold px-6 py-2 hover:bg-soft-theme-light hover:text-dark-theme-light"
                            v-for="(scope, key) in scopes"
                            :key="key"
                            @click="$emit('scopeChanged', scope)"
                        >
                            {{ scope }}
                        </button>
                    </div>
                </template>
            </dropdown>
        </div>
    </div>
</template>

<script>
import Dropdown from '@/Components/Helpers/Dropdown';
import Icon from '@/Components/Helpers/Icon';
import pickBy from 'lodash/pickBy';
import throttle from 'lodash/throttle';
export default {
    emits: ['searchChanged','scopeChanged'],
    components: {
        Dropdown,
        Icon,
    },
    props: {
        scopes: { type: Array, default: () => [] },
        form: { type: Object, required: true }
    },
    watch: {
        form: {
            handler: throttle(function () {
                let query = pickBy(this.form);
                console.log(query);
                // this.$inertia.visit(location.pathname, {
                //     method: 'get',
                //     data: Object.keys(query).length ? query : { remember: 'forget' },
                //     replace: true
                // });
            }, 800),
            deep: true
        }
    }
};
</script>