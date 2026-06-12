<script setup>
import {
    BookOpen,
    Users,
    FileText,
    AlertTriangle
} from 'lucide-vue-next'
import { Link } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import Chart from 'chart.js/auto'   

import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    totalLivros: Number,
    totalLeitores: Number,
    locacoesAtivas: Number,
    locacoesPorMes: Array
})

const chartCanvas = ref(null)

onMounted(() => {
    const labels = [
        'Jan', 'Fev', 'Mar', 'Abr',
        'Mai', 'Jun', 'Jul', 'Ago',
        'Set', 'Out', 'Nov', 'Dez'
    ]

    const dados = Array(12).fill(0)

    props.locacoesPorMes.forEach(item => {
        dados[item.mes - 1] = item.total
    })

    new Chart(chartCanvas.value, {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Locações',
                data: dados
            }]
        }
    })
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
                            {{ totalLivros }}
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
                            {{ totalLeitores }}
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

                            {{ locacoesAtivas > 0 ? locacoesAtivas : 0 }}
                        </h2>
                    </div>

                    <FileText class="w-10 h-10 text-purple-600" />
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
                    <canvas ref="chartCanvas"></canvas>
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
    </div>
</template>