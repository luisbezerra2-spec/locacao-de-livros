<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { router } from '@inertiajs/vue3'
defineOptions({
    layout: AppLayout
})
defineProps({
    livros: Array
})

const editarLivro = (id) => {
    router.visit(`/editarLivro/${id}`);
}
</script>

<template>
    <div class="max-w-7xl mx-auto p-6">

        <!-- Cabeçalho -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Dashboard de Livros
                </h1>

                <p class="text-gray-500 mt-1">
                    Gerencie o acervo da biblioteca
                </p>
            </div>

            <a href="/cadastrarLivro" class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
                + Novo Livro
            </a>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-xl shadow-sm border p-6">
                <p class="text-gray-500 text-sm">
                    Total de Livros
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ livros.length }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow-sm border p-6">
                <p class="text-gray-500 text-sm">
                    Disponíveis
                </p>

                <h2 class="text-3xl font-bold text-green-600 mt-2">
                    {{
                        livros.filter(
                            livro => livro.status === 'Disponível'
                        ).length
                    }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow-sm border p-6">
                <p class="text-gray-500 text-sm">
                    Indisponíveis
                </p>

                <h2 class="text-3xl font-bold text-red-600 mt-2">
                    {{
                        livros.filter(
                            livro => livro.status === 'Indisponível'
                        ).length
                    }}
                </h2>
            </div>

        </div>

        <!-- Tabela -->
        <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-6 py-4">Título</th>
                        <th class="text-left px-6 py-4">Autor</th>
                        <th class="text-left px-6 py-4">Categoria</th>
                        <th class="text-left px-6 py-4">Status</th>
                        <th class="text-center px-6 py-4">Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <tr v-for="livro in livros" :key="livro.id" class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4">
                            {{ livro.titulo }}
                        </td>

                        <td class="px-6 py-4">
                            {{ livro.autor }}
                        </td>

                        <td class="px-6 py-4">
                            {{ livro.categoria }}
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-3 py-1 rounded-full text-sm" :class="livro.status === 'Disponível'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700'
                                ">
                                {{ livro.status }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center">

                            <button @click="editarLivro(livro.id)" class="text-blue-600 hover:underline mr-4 cursor-pointer">
                                Editar
                            </button>

                            <button class="text-red-600 hover:underline cursor-pointer">
                                Excluir
                            </button>

                        </td>
                    </tr>

                    <tr v-if="livros.length === 0">
                        <td colspan="5" class="text-center py-8 text-gray-500">
                            Nenhum livro cadastrado.
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>
</template>