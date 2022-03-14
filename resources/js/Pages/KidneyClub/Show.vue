<template>
    <h1 class="text-lg text-center font-semibold text-thick-theme-light mb-5">
        {{ episode.name }}
    </h1>

    <video
        id="player"
        playsinline
        controls
        data-poster="/image/kidney-club-cover.png"
    >
        <source
            :src="asset"
            type="video/mp4"
        >
        <!-- <source
            src="/path/to/video.webm"
            type="video/webm"
        > -->

        <!-- Captions are optional -->
        <!-- <track
            kind="captions"
            label="English captions"
            src="/path/to/captions.vtt"
            srclang="en"
            default
        > -->
    </video>
    <p class="mt-5">
        <span class="italic text-sm">{{ episode.speaker }}</span>
        <span class="ml-2 px-4 py-2 rounded-xl bg-white text-sm font-semibold text-thick-theme-light">{{ episode.date }}</span>
    </p>
</template>

<script setup>
import { onMounted } from '@vue/runtime-core';
import Plyr from 'plyr';
import 'plyr/dist/plyr.css';
defineProps({
    asset: { type: String, required: true },
    episode: { type: Object, required: true },
});

onMounted(() => {
    const player = new Plyr('#player');
});
</script>
