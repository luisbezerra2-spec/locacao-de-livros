<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
defineOptions({
    layout: AppLayout
})

const props = defineProps({
    leitor: Object
})

</script>

<template>
    <div class="max-w-3xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Histórico de Locação de Leitores
            </h1>

            <p class="text-gray-500 mt-2">
                Veja o histórico de locações do leitor.
            </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">
                {{ leitor.nome }}
            </h2>

            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Livro</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Data de Locação</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Data de Devolução</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="locacao in leitor.locacoes" :key="locacao.id" class="border-t">
                        <td class="px-4 py-2">{{ locacao.livro.titulo }}</td>
                        <td class="px-4 py-2">{{ locacao.data_retirada }}</td>
                        <td class="px-4 py-2">{{ locacao.data_devolucao ? new Date(locacao.data_devolucao).toLocaleDateString() : 'Em aberto' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</template>