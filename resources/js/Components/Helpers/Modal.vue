<template>
    <!-- backdrop -->
    <div
        v-show="show"
        class="inset-0 z-30 fixed flex items-center justify-center backdrop"
        :class="{ 'open': animate }"
    >
        <!-- modal -->
        <div
            v-if="show"
            class="bg-soft-theme-light rounded shadow p-4 md:p-8 xl:p-10 modal-appear-from-top"
            :class="{
                'open': animate,
                'w-11/12 md:10/12': widthMode == 'document',
                'w-11/12 sm:10/12 md:w-2/5 xl:w-1/4': widthMode == 'form-cols-1',
            }"
        >
            <!-- header -->
            <div class="flex justify-between items-center">
                <div><slot name="header" /></div>
                <button
                    @click="animate = false"
                    class="block p-2 rounded-full hover:bg-white bg-soft-theme-light transition-colors ease-in-out duration-200"
                >
                    <icon
                        name="times"
                        class="w-4 h-4"
                    />
                </button>
            </div>
            <!-- body -->
            <div><slot name="body" /></div>
            <!-- footer -->
            <div><slot name="footer" /></div>
        </div>
    </div>
</template>

<script>
import Icon from '@/Components/Helpers/Icon.vue';
export default {
    emits: ['closed'],
    components: { Icon },
    props: {
        widthMode: { type: String, default: 'document' }
    },
    data () {
        return {
            show: false,
            animate: false,
        };
    },
    watch: {
        show (show) {
            if (show) {
                this.doubleRequestAnimationFrame(() => {
                    this.animate = true;
                });
            } else {
                this.animate = false;
            }
        },
        animate (animate) {
            if (! animate) {
                this.$emit('closed');
                this.doubleRequestAnimationFrame(() => {
                    setTimeout(() => this.show = false, 200);
                });
            }
        }
    },
    methods: {
        open () {
            this.show = true;
        },
        close () {
            this.animate = false;
        },
        doubleRequestAnimationFrame (callback) {
            requestAnimationFrame(() => {
                requestAnimationFrame(callback);
            });
        },
    }
};
</script>

<style scoped>
    .modal-appear-from-top {
        opacity: 0;
        transform: translateY(-100%);
        transition: 0.2s all ease;
    }
    .modal-appear-from-top.open {
        opacity: 1;
        transform: translateY(0);
    }
    .modal-appear {
        opacity: 0;
        transform: scale(0);
        transition: 0.2s all ease;
    }
    .modal-appear.open {
        opacity: 1;
        transform: scale(1);
    }
    .backdrop {
        background-color: rgba(0, 0, 0, 0.0);
        transition: 0.2s background-color ease;
    }
    .backdrop.open {
        background-color: rgba(0, 0, 0, 0.25);
    }
</style>