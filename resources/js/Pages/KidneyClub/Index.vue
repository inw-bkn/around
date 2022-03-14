<template>
    <h1 class="font-lobster text-2xl text-thick-theme-light">
        Kidney Club 📚
    </h1>
    <hr class="my-4 border-b-2 border-bitter-theme-light">
    <div
        class="mb-4 bg-white rounded shadow"
        v-for="(serie, key) in series"
        :key="key"
    >
        <table class="w-full rounded-t">
            <tr class="bg-bitter-theme-light text-left font-semibold">
                <th class="px-6 pt-6 pb-4 text-white underline">
                    {{ serie.name }}
                </th>
            </tr>
            <tr
                class="hover:bg-alt-theme-light focus-within:text-alt-theme-light"
                v-for="episode in serie.episodes"
                :key="episode.slug"
            >
                <td class="border-t">
                    <Link
                        class="px-6 py-4 block focus:text-bitter-theme-light"
                        :href="route('kidney-club.show', episode.slug)"
                    >
                        <h3 class="font-semibold text-lg text-thick-theme-light mb-2">
                            {{ episode.name }}
                        </h3>
                        <span class="italic text-sm">{{ episode.speaker }}</span>
                        <span class="ml-2 px-4 py-2 rounded-xl bg-soft-theme-light text-sm font-semibold text-thick-theme-light">{{ episode.date }}</span>
                    </Link>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
    series: { type: Array, required: true }
});
</script>