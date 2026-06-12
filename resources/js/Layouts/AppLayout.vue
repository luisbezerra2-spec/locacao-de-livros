<script setup>
import Sidebar from '@/Components/Sidebar.vue'
import Navbar from '@/Components/Navbar.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
</script>

<template>
    <div v-if="page.props.flash.success" class="m-4 p-4 bg-green-100 text-green-700 rounded">
        {{ page.props.flash.success }}
    </div>

    <div v-if="page.props.flash.error" class="m-4 p-4 bg-red-100 text-red-700 rounded">
        {{ page.props.flash.error }}
    </div>
    <div class="flex h-screen">

        <Sidebar />

        <div class="flex-1 flex flex-col">

            <Navbar />

            <main class="flex-1 p-6 overflow-auto">
                <slot />
            </main>

        </div>

    </div>
</template>