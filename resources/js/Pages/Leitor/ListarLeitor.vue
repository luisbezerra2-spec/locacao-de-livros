<script setup>
import { ref, computed } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { router } from '@inertiajs/vue3'
defineOptions({
    layout: AppLayout
})

const props = defineProps({
    leitores: Array
})

const pesquisa = ref('')

const leitoresFiltrados = computed(() => {
    return props.leitores.filter(leitor =>
        leitor.nome.toLowerCase().includes(
            pesquisa.value.toLowerCase()
        )
    )
})

const deletarLeitor = (id) => {
    if (confirm('Tem certeza que deseja excluir este leitor?')) {
        router.delete(`/deletarLeitor/${id}`)
    }
}

</script>

<template>
    <div class="max-w-7xl mx-auto p-6">

        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Dashboard de Leitores
                </h1>

                <p class="text-gray-500 mt-2">
                    Gerencie os leitores cadastrados na biblioteca
                </p>
            </div>

            <button class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700"
                @click="$inertia.visit('/cadastrarLeitor')">
                + Novo Leitor
            </button>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-xl border shadow-sm p-6">
                <p class="text-gray-500 text-sm">
                    Total de Leitores
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ leitores.length }}
                </h2>
            </div>

        </div>

        <!-- Pesquisa -->
        <div class="bg-white rounded-xl border shadow-sm p-6 mb-6">

            <input v-model="pesquisa" type="text" placeholder="Pesquisar leitor pelo nome..."
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        </div>

        <!-- Tabela -->
        <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-6 py-4">
                            Nome
                        </th>

                        <th class="text-left px-6 py-4">
                            Documento
                        </th>

                        <th class="text-left px-6 py-4">
                            Endereço
                        </th>

                        <th class="text-center px-6 py-4">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr v-for="leitor in leitoresFiltrados" :key="leitor.id" class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4">
                            {{ leitor.nome }}
                        </td>

                        <td class="px-6 py-4">
                            {{ leitor.documento }}
                        </td>

                        <td class="px-6 py-4">
                            {{ leitor.endereco }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            <button @click="$inertia.visit(`/editarLeitor/${leitor.id}`)"
                                class="text-blue-600 hover:underline mr-4">
                                Editar
                            </button>

                            <button 
                            @click="deletarLeitor(leitor.id)"
                            class="text-red-600 hover:underline">
                                Excluir
                            </button>
                        </td>
                    </tr>

                    <tr v-if="leitoresFiltrados.length === 0">
                        <td colspan="4" class="text-center py-8 text-gray-500">
                            Nenhum leitor encontrado.
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>
</template>