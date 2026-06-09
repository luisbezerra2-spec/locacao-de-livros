<script setup>
import {
    BookOpen,
    Users,
    FileText,
    AlertTriangle
} from 'lucide-vue-next'
import { Link } from '@inertiajs/vue3'


import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
layout: AppLayout
})
</script>


<template>
    <div class="space-y-6">

        <!-- Cabeçalho -->
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Dashboard
            </h1>

            <p class="text-gray-500 mt-1">
                Visão geral do sistema de locação de livros.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-xl shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">
                            Total de Livros
                        </p>

                        <h2 class="text-3xl font-bold mt-2">
                            1.248
                        </h2>
                    </div>

                    <BookOpen class="w-10 h-10 text-blue-600" />
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">
                            Leitores Cadastrados
                        </p>

                        <h2 class="text-3xl font-bold mt-2">
                            325
                        </h2>
                    </div>

                    <Users class="w-10 h-10 text-green-600" />
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">
                            Locações Ativas
                        </p>

                        <h2 class="text-3xl font-bold mt-2">
                            87
                        </h2>
                    </div>

                    <FileText class="w-10 h-10 text-purple-600" />
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">
                            Atrasos
                        </p>

                        <h2 class="text-3xl font-bold mt-2">
                            12
                        </h2>
                    </div>

                    <AlertTriangle class="w-10 h-10 text-red-600" />
                </div>
            </div>

        </div>







        <!-- Conteúdo Principal -->



        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">

            <!-- Gráfico -->
            <div class="xl:col-span-2 bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Locações por mês
                    </h2>

                    <span class="text-sm text-gray-500">
                        Ano atual
                    </span>
                </div>

                <!-- Seu gráfico entra aqui -->
                <div class="h-80 flex items-center justify-center text-gray-400">
                    Área do gráfico
                </div>

            </div>

            <!-- Atalhos -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">
                    Ações rápidas
                </h2>

                <div class="space-y-4">

                    <Link href="cadastrarLivro"
                        class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-blue-500 hover:bg-blue-50 transition-all">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                            <BookOpen class="w-6 h-6 text-blue-600" />
                        </div>

                        <div>
                            <p class="font-medium">
                                Novo Livro
                            </p>

                            <p class="text-sm text-gray-500">
                                Cadastrar livro
                            </p>
                        </div>

                        <Plus class="ml-auto w-5 h-5 text-gray-400" />
                    </Link>

                    <Link href="cadastrarLeitor"
                        class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-green-500 hover:bg-green-50 transition-all">
                        <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                            <Users class="w-6 h-6 text-green-600" />
                        </div>

                        <div>
                            <p class="font-medium">
                                Novo Leitor
                            </p>

                            <p class="text-sm text-gray-500">
                                Cadastrar leitor
                            </p>
                        </div>

                        <Plus class="ml-auto w-5 h-5 text-gray-400" />
                    </Link>

                    <Link href="cadastrarLocacao"
                        class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-purple-500 hover:bg-purple-50 transition-all">
                        <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                            <FileText class="w-6 h-6 text-purple-600" />
                        </div>

                        <div>
                            <p class="font-medium">
                                Nova Locação
                            </p>

                            <p class="text-sm text-gray-500">
                                Registrar empréstimo
                            </p>
                        </div>

                        <Plus class="ml-auto w-5 h-5 text-gray-400" />
                    </Link>

                </div>

            </div>

        </div>


        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- Locações Recentes -->
            <div class="xl:col-span-2 bg-white rounded-xl shadow-sm border">

                <div class="p-5 border-b">
                    <h2 class="font-semibold text-lg">
                        Locações Recentes
                    </h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left p-4">
                                    Leitor
                                </th>

                                <th class="text-left p-4">
                                    Livro
                                </th>

                                <th class="text-left p-4">
                                    Data
                                </th>

                                <th class="text-left p-4">
                                    Status
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr class="border-t">
                                <td class="p-4">
                                    João Silva
                                </td>

                                <td class="p-4">
                                    Clean Code
                                </td>

                                <td class="p-4">
                                    02/06/2026
                                </td>

                                <td class="p-4">
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                        Ativo
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-t">
                                <td class="p-4">
                                    Maria Souza
                                </td>

                                <td class="p-4">
                                    Dom Casmurro
                                </td>

                                <td class="p-4">
                                    01/06/2026
                                </td>

                                <td class="p-4">
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                                        Devolução Hoje
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-t">
                                <td class="p-4">
                                    Pedro Lima
                                </td>

                                <td class="p-4">
                                    O Hobbit
                                </td>

                                <td class="p-4">
                                    30/05/2026
                                </td>

                                <td class="p-4">
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                        Atrasado
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

            <!-- Resumo -->
            <div class="bg-white rounded-xl shadow-sm border">

                <div class="p-5 border-b">
                    <h2 class="font-semibold text-lg">
                        Resumo Rápido
                    </h2>
                </div>

                <div class="p-5 space-y-4">

                    <div class="flex justify-between">
                        <span class="text-gray-600">
                            Livros disponíveis
                        </span>

                        <span class="font-semibold">
                            1.161
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">
                            Livros emprestados
                        </span>

                        <span class="font-semibold">
                            87
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">
                            Reservas pendentes
                        </span>

                        <span class="font-semibold">
                            24
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">
                            Multas em aberto
                        </span>

                        <span class="font-semibold text-red-600">
                            12
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>
</template>