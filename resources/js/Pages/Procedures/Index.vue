<template>
    <div>
        <h1 class="font-lobster text-2xl text-thick-theme-light">
            Procedures 🔪
        </h1>
        <hr class="my-4 border-b-2 border-bitter-theme-light">
        <div class="bg-white rounded shadow md:w-1/2">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-semibold">
                    <th class="px-6 pt-6 pb-4">
                        Name
                    </th>
                </tr>
                <tr class="hover:bg-alt-theme-light focus-within:text-alt-theme-light">
                    <td class="border-t">
                        <Link
                            class="px-6 py-4 flex items-center focus:text-bitter-theme-light"
                            :href="route('procedures.acute-hemodialysis.index')"
                        >
                            Acute Hemodialysis
                        </Link>
                    </td>
                </tr>
                <tr class="hover:bg-alt-theme-light focus-within:bg-alt-theme-light">
                    <td class="border-t">
                        <Link
                            class="px-6 py-4 flex items-center focus:text-bitter-theme-light"
                            href="#"
                        >
                            Kidney Biopsy
                        </Link>
                    </td>
                </tr>
                <tr class="hover:bg-alt-theme-light focus-within:bg-alt-theme-light">
                    <td class="border-t">
                        <Link
                            class="px-6 py-4 flex items-center focus:text-bitter-theme-light"
                            href="#"
                        >
                            Vascular Access
                        </Link>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>