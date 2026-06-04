<script setup>
import Sidebar from '@/Components/Sidebar.vue'
import Navbar from '@/Components/Navbar.vue'
</script>

<template>
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