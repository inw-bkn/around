<template>
    <div
        role="alert"
        class="border-t-4 rounded-b px-4 py-3 shadow-sm bg-gray-100"
        :class="{
            'border-red-400': type == 'danger', 'text-red-400': type == 'danger',
            'border-yellow-400': type == 'warning', 'text-yellow-400': type == 'warning',
            'border-green-400': type == 'success', 'text-green-400': type == 'success',
            'border-blue-400': type == 'info', 'text-blue-400': type == 'info',
        }"
    >
        <div class="flex items-center">
            <div class="w-1/6 flex justify-center">
                <icon
                    class="w-6 h-6 md:w-10 md:h-10 lg:w-16 lg:h-16"
                    name="info-circle"
                />
            </div>
            <div class="w-5/6 lg:text-lg">
                <p class="font-bold">
                    {{ title }}
                </p>
                <p class="text-gray-700 text-sm lg:text-lg font-light mt-2">
                    {{ message }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import Icon from '@/Components/Helpers/Icon';
export default {
    components: { Icon },
    props: {
        type: { type: String, default: 'info' },
        title: { type: String, default: 'What\'s up!' },
        message: { type: String, default: 'Hello world' },
    },
};
</script>
