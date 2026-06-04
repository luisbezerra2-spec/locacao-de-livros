
<script setup>
import { Search, Bell, User } from 'lucide-vue-next'
</script>

<template>
    <header
        class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6"
    >
        <!-- Pesquisa -->
        <div class="relative w-full max-w-md">
            <Search
                class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
            />

            <input
                type="text"
                placeholder="Pesquisar..."
                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
        </div>

        <!-- Ações -->
        <div class="flex items-center gap-4">

            <!-- Notificação -->
            <button
                class="relative p-2 rounded-lg hover:bg-gray-100 transition"
            >
                <Bell class="w-5 h-5 text-gray-600" />

                <span
                    class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"
                />
            </button>

            <!-- Usuário -->
            <button
                class="flex items-center gap-3 hover:bg-gray-100 rounded-lg px-3 py-2 transition"
            >
                <div
                    class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center"
                >
                    <User class="w-5 h-5" />
                </div>

                <div class="text-left hidden md:block">
                    <p class="text-sm font-medium text-gray-800">
                        João Paulo
                    </p>

                    <p class="text-xs text-gray-500">
                        Administrador
                    </p>
                </div>
            </button>

        </div>
    </header>
</template>