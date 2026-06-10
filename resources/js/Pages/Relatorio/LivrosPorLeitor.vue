<script setup>

import AppLayout from '@/Layouts/AppLayout.vue'


defineOptions({
    layout: AppLayout
})

defineProps({
    leitores: Array
})

</script>

<template>

<div class="max-w-7xl mx-auto p-6">
    
    <!-- Cabeçalho -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Relatório de Livros por Leitor
        </h1>

    </div>

    <!-- Tabela -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-4 text-left">
                        Leitor
                    </th>

                    <th class="p-4 text-left">
                        Quantidade
                    </th>

                    <th class="p-4 text-left">
                        Livros
                    </th>
                </tr>

            </thead>

            <tbody>

                <tr
                    v-for="leitor in leitores"
                    :key="leitor.id"
                    class="border-t align-top"
                >
                    <td class="p-4 font-medium text-gray-800">
                        {{ leitor.nome }}
                    </td>

                    <!-- Quantidade -->
                    <td class="p-4">
                        <span
                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold"
                        >
                            {{ leitor.locacoes.length }}
                        </span>
                    </td>
                    <!-- Lista livros -->
                    <td class="p-4">
                        <div
                            class="flex flex-wrap gap-2"
                        >
                            <span
                                v-for="locacao in leitor.locacoes"
                                :key="locacao.id"
                                class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm"
                            >
                                {{ locacao.livro.titulo }}
                            </span>

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

</template>