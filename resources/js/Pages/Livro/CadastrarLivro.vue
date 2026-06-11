<script setup>
import { useForm, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
    layout: AppLayout
})
const form = useForm({
    titulo: '',
    categoria: '',
    autor: '',
    status: 'Disponível'
})

const submit = () => {
    form.post('/salvarLivro', {
        onSuccess: () => {
            form.reset()
        }
    })
}

const cancelar = () => {
    router.visit('/')
}
</script>

<template>
    <div class="max-w-3xl mx-auto">

        <!-- Cabeçalho -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Cadastro de Livro
            </h1>

            <p class="text-gray-500 mt-2">
                Adicione um novo livro ao acervo.
            </p>
        </div>

        <!-- Formulário -->
        <form @submit.prevent="submit" class="bg-white rounded-xl border border-gray-200 shadow-sm p-8">

            <div class="space-y-6">

                <!-- Título -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Título
                    </label>

                    <input v-model="form.titulo" type="text" placeholder="Digite o título do livro"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />

                    <p>
                        <span v-if="form.errors.titulo" class="text-red-500 text-sm mt-1">
                            {{ form.errors.titulo }}
                        </span>
                    </p>
                </div>

                <!-- Autor -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Autor
                    </label>

                    <input v-model="form.autor" type="text" placeholder="Digite o autor"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <p>
                        <span v-if="form.errors.autor" class="text-red-500 text-sm mt-1">
                            {{ form.errors.autor }}
                        </span>
                    </p>
                </div>

                <!-- Categoria -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Categoria
                    </label>

                    <select v-model="form.categoria"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">
                            Selecione uma categoria
                        </option>

                        <option value="Romance">
                            Romance
                        </option>

                        <option value="Ficção">
                            Ficção
                        </option>

                        <option value="Tecnologia">
                            Tecnologia
                        </option>

                        <option value="História">
                            História
                        </option>

                        <option value="Educação">
                            Educação
                        </option>
                    </select>
                    <p>
                        <span v-if="form.errors.categoria" class="text-red-500 text-sm mt-1">
                            {{ form.errors.categoria }}
                        </span>
                    </p>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>

                    <select v-model="form.status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Disponível">
                            Disponível
                        </option>
                    </select>
                    <p>
                        <span v-if="form.errors.status" class="text-red-500 text-sm mt-1">
                            {{ form.errors.status }}
                        </span>
                    </p>
                </div>

            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">

                <button type="button" @click="cancelar"
                    class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancelar
                </button>

                <button type="submit" :disabled="form.processing"
                    class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Salvar Livro
                </button>

            </div>

        </form>

    </div>
</template>