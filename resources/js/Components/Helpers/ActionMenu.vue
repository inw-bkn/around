<template>
    <div v-if="$page.props.flash.actionMenu.length">
        <div class="mb-4">
            <button
                class="flex items-center group py-2 text-soft-theme-light"
                v-for="(action, key) in $page.props.flash.actionMenu.filter(action => action.can)"
                :key="key"
                @click="$emit('action-clicked', action.action)"
            >
                <Icon
                    :name="action.icon"
                    class="w-4 h-4 mr-2 group-hover:text-alt-theme-light transition-colors duration-200 ease-in-out"
                />
                <div class="group-hover:text-alt-theme-light transition-colors duration-200 ease-in-out">
                    {{ action.label }}
                </div>
            </button>
        </div>
    </div>
</template>

<script setup>
import Icon from '@/Components/Helpers/Icon.vue';
defineEmits(['action-clicked']);
</script>