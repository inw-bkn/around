<template>
    <button
        type="button"
        @click="show = true"
    >
        <slot />
        <transition
            name="fade-appear"
            mode="in-out"
            appear
        >
            <teleport
                v-if="show"
                to="#portal"
            >
                <div>
                    <div
                        class="fixed inset-0 bg-black bg-opacity-20 z-50"
                        @click="show = false"
                    />

                    <div
                        class="absolute z-50"
                        ref="dropdown"
                        @click.stop="show = autoClose ? false : true"
                    >
                        <slot name="dropdown" />
                    </div>
                </div>
            </teleport>
        </transition>
    </button>
</template>

<script>
import { createPopper } from '@popperjs/core';

export default {
    props: {
        placement: {
            type: String,
            default: 'bottom-end',
        },
        boundary: {
            type: String,
            default: 'scrollParent',
        },
        autoClose: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            show: false,
        };
    },
    watch: {
        show(show) {
            if (show) {
                this.$nextTick(() => {
                    this.popper = createPopper(this.$el, this.$refs.dropdown, {
                        placement: this.placement,
                    });
                });
            } else if (this.popper) {
                setTimeout(() => this.popper.destroy(), 100);
            }
        },
    },
    mounted() {
        document.addEventListener('keydown', (e) => {
            if (e.keyCode === 27) {
                this.show = false;
            }
        });
    },
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