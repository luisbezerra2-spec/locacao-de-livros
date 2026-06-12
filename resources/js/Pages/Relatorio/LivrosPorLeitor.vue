<script setup>

import AppLayout from '@/Layouts/AppLayout.vue'
import {Link} from '@inertiajs/vue3'


defineOptions({
    layout: AppLayout
})

defineProps({
    leitores: Object
})

</script>

<template>
    <!-- Tabela -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">Leitor</th>
                    <th class="p-4 text-left">Quantidade</th>
                    <th class="p-4 text-left">Livros</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="leitor in leitores.data" :key="leitor.id" class="border-t align-top">
                    <td class="p-4 font-medium text-gray-800">
                        {{ leitor.nome }}
                    </td>
                    <td class="p-4">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ leitor.locacoes_count }}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex flex-wrap gap-2">
                            <span v-for="locacao in leitor.locacoes" :key="locacao.id" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">
                                {{ locacao.livro.titulo }}
                            </span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Botões de Paginação com Tailwind -->
    <div class="flex item-center justify-between mt-4">
        <div class="flex gap-1">
            <Link
                v-for="(link, index) in leitores.links"
                :key="index"
                :href="link.url || '#'"
                v-html="link.label"
                class="px-3 py-2 border rounded"
                :class="{
                    'bg-blue-600 text-white border-blue-600': link.active
                }"
            />
        </div>
    </div>
</template>
