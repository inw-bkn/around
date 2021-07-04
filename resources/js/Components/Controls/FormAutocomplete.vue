<template>
    <div class="relative">
        <div
            class="fixed inset-0 z-10"
            @click="open = false"
            v-if="open"
        />
        <div class="w-full">
            <label
                v-if="label"
                class="form-label"
                :for="name"
            >{{ label }} : </label>
            <div class="relative">
                <input
                    type="text"
                    class="form-input"
                    @input="search"
                    :id="name"
                    :name="name"
                    ref="input"
                    :value="modelValue"
                >
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </div>
            </div>
        </div>
        <transition name="fade-appear">
            <div
                class="absolute mt-1 bg-white rounded border-2 border-yellow-200 shadow-xl w-full max-h-44 py-2 overflow-y-scroll z-20 origin-top"
                :class="{ 'scale-100 opacity-100': open }"
                v-if="open"
            >
                <button
                    class="block w-full py-1 px-2 lg:px-3 hover:bg-soft-theme-light hover:text-bitter-theme-light text-left"
                    v-for="(item, key) in items"
                    :key="key"
                    @click="selectItem(item)"
                >
                    {{ item }}
                </button>
            </div>
        </transition>
    </div>
</template>

<script>
import { ref } from '@vue/reactivity';
import throttle from 'lodash/throttle';
export default {
    emits: ['update:modelValue', 'autosave'],
    props: {
        modelValue: { type: String, default: '' },
        label: { type: String, default: '' },
        endpoint: { type: String, default: '' },
        name: { type: String, required: true },
    },

    setup (props, context) {
        const items = ref([]);
        const input = ref(null);
        const open = ref(false);

        const search = throttle(function () {
            context.emit('update:modelValue', input.value.value);

            if (input.value.value.length < 3) {
                if (open.value) {
                    open.value = false;
                }

                if (! input.value.value) {
                    context.emit('autosave');
                }

                return;
            }
            window.axios
                .get(props.endpoint + '?search=' + input.value.value)
                .then(response => {
                    items.value = response.data.length ? response.data : ['No match found'];
                    open.value = true;
                }).catch(error => {
                    console.log(error);
                });
        }, 300);

        const selectItem = (item) => {
            input.value.value = item;
            open.value = false;
            context.emit('update:modelValue', item);
            context.emit('autosave');
        };

        return {
            open,
            items,
            selectItem,
            input,
            search
        };
    }
};
</script>

<style scoped>
    .fade-appear-enter-active {
        animation: fade-appear .2s;
    }
    .fade-appear-leave-active {
        animation: fade-appear .2s reverse;
    }
    @keyframes fade-appear {
        0% {
            transform: scale(0.9);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>