<script setup>
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
    layout: AppLayout
})

defineProps({
    locacoes: Array
})
const submit = () => {
    form.post('/salvarLivro', {
        onSuccess: () => {
            form.reset()
        }
    })
}
const devolverLivro = (id) => {
    if (confirm('Confirmar devolução do livro?')) {
        router.delete(`/finalizarLocacao/${id}`)
    }
}
</script>

<template>

    <div class="max-w-7xl mx-auto p-6">

        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Dashboard de Locações
                </h1>

                <p class="text-gray-500 mt-2">
                    Controle de empréstimos de livros
                </p>
            </div>

            <button @click="$inertia.visit('/cadastrarLocacao')"
                class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 cursor-pointer">
                Nova Locação
            </button>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <p class="text-gray-500 text-sm">
                    Total de Locações
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ locacoes.length }}
                </h2>
            </div>

            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <p class="text-gray-500 text-sm">
                    Em Andamento
                </p>

                <h2 class="text-3xl font-bold text-orange-500 mt-2">
                    {{
                        locacoes.filter(
                            l => l.data_devolucao === null
                        ).length
                    }}
                </h2>
            </div>

        </div>

        <!-- Tabela -->

        <div class="bg-white border rounded-xl shadow-sm overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-6 py-4">
                            Leitor
                        </th>

                        <th class="text-left px-6 py-4">
                            Livro
                        </th>

                        <th class="text-left px-6 py-4">
                            Retirada
                        </th>

                        <th class="text-left px-6 py-4">
                            Devolução
                        </th>

                        <th class="text-left px-6 py-4">
                            Status
                        </th>

                        <th class="text-center px-6 py-4">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr v-for="locacao in locacoes" :key="locacao.id" class="border-t hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ locacao.leitor.nome }}
                        </td>

                        <td class="px-6 py-4">
                            {{ locacao.livro.titulo }}
                        </td>

                        <td class="px-6 py-4">
                            {{ locacao.data_retirada }}
                        </td>

                        <td class="px-6 py-4">
                            {{
                                locacao.data_devolucao ??
                                'Não devolvido'
                            }}
                        </td>

                        <td class="px-6 py-4">

                            <span v-if="locacao.data_devolucao"
                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                                Devolvido
                            </span>

                            <span v-else class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">
                                Em andamento
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center">

                            <button v-if="!locacao.data_devolucao" @click="devolverLivro(locacao.id)"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 cursor-pointer">
                                Devolver
                            </button>

                        </td>

                    </tr>

                    <tr v-if="locacoes.length === 0">

                        <td colspan="6" class="text-center py-8 text-gray-500">
                            Nenhuma locação encontrada.
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</template>