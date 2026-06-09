<script setup>
import { useForm, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    leitores: Array,
    livros: Array
})

const form = useForm({
    leitor_id: '',
    livro_id: '',
    data_retirada: new Date().toISOString().split('T')[0],
    data_devolucao: ''
})

const submit = () => {
    form.post('/salvarLocacao')
}

const cancelar = () => {
    router.visit('/dashboardLocacoes')
}
</script>

<template>
    <div class="max-w-4xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Nova Locação
            </h1>

            <p class="text-gray-500 mt-2">
                Registre uma nova retirada de livro.
            </p>
        </div>

        <form
            @submit.prevent="submit"
            class="bg-white rounded-xl border border-gray-200 shadow-sm p-8"
        >

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Leitor -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Leitor
                    </label>

                    <select
                        v-model="form.leitor_id"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    >
                        <option value="">
                            Selecione um leitor
                        </option>

                        <option
                            v-for="leitor in leitores"
                            :key="leitor.id"
                            :value="leitor.id"
                        >
                            {{ leitor.nome }}
                        </option>
                    </select>

                    <p
                        v-if="form.errors.leitor_id"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.leitor_id }}
                    </p>
                </div>

                <!-- Livro -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Livro
                    </label>

                    <select
                        v-model="form.livro_id"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    >
                        <option value="">
                            Selecione um livro
                        </option>

                        <option
                            v-for="livro in livros"
                            :key="livro.id"
                            :value="livro.id"
                        >
                            {{ livro.titulo }}
                        </option>
                    </select>

                    <p
                        v-if="form.errors.livro_id"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.livro_id }}
                    </p>
                </div>

                <!-- Data retirada -->
               <!--  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Data de Retirada
                    </label>

                    <input
                        v-model="form.data_retirada"
                        type="date"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    />
                </div> -->

                <!-- Data devolução -->
              <!--   <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Data Prevista de Devolução
                    </label>

                    <input
                        v-model="form.data_devolucao"
                        type="date"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    />
                </div> -->

            </div>

            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">

                <button
                    type="button"
                    @click="cancelar"
                    class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                >
                    Registrar Locação
                </button>

            </div>

        </form>

    </div>
</template>