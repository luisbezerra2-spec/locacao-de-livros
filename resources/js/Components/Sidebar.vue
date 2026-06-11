<script setup>
import { ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

import {
    Menu,
    X,
    LayoutDashboard,
    BookOpen,
    Users,
    FileText,
    Settings,
    LogOut
} from 'lucide-vue-next'

const sidebarOpen = ref(true)

const page = usePage()

const menuItems = [
    {
        label: 'Dashboard',
        href: '/',
        icon: LayoutDashboard
    },
    {
        label: 'Livros',
        href: '/listarLivro',
        icon: BookOpen
    },
    {
        label: 'Leitores',
        href: '/listarLeitor',
        icon: Users
    },
    {
        label: 'Locações',
        href: '/listarLocacao',
        icon: FileText
    },
    {
        label: 'Relatório',
        href: '/livrosPorLeitor',
        icon: FileText
    }
]

const isActive = (url) => page.url === url
</script>

<template>
    <aside
        :class="[
            'h-screen bg-slate-900 text-white flex flex-col transition-all duration-300',
            sidebarOpen ? 'w-64' : 'w-20'
        ]"
    >
        <!-- Header -->
        <div
            class="h-16 border-b border-slate-700 flex items-center justify-between px-4"
        >
            <h1
                v-if="sidebarOpen"
                class="font-bold text-lg"
            >
                Biblioteca
            </h1>

            <button
                @click="sidebarOpen = !sidebarOpen"
                class="p-2 rounded hover:bg-slate-800"
            >
                <X v-if="sidebarOpen" class="w-5 h-5" />
                <Menu v-else class="w-5 h-5" />
            </button>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-3 space-y-2">

            <Link
                v-for="item in menuItems"
                :key="item.href"
                :href="item.href"
                :class="[
                    'flex items-center rounded-lg p-3 transition',
                    isActive(item.href)
                        ? 'bg-blue-600'
                        : 'hover:bg-slate-800'
                ]"
            >
                <component
                    :is="item.icon"
                    class="w-5 h-5"
                />

                <span
                    v-if="sidebarOpen"
                    class="ml-3"
                >
                    {{ item.label }}
                </span>
            </Link>

        </nav>

        <!-- Footer -->
        <div
            class="border-t border-slate-700 p-3 space-y-2"
        >
            <button
                class="w-full flex items-center p-3 rounded-lg hover:bg-slate-800"
            >
                <Settings class="w-5 h-5" />

                <span
                    v-if="sidebarOpen"
                    class="ml-3"
                >
                    Configurações
                </span>
            </button>

            <button
                class="w-full flex items-center p-3 rounded-lg hover:bg-red-600"
            >
                <LogOut class="w-5 h-5" />

                <span
                    v-if="sidebarOpen"
                    class="ml-3"
                >
                    Sair
                </span>
            </button>
        </div>
    </aside>
</template>