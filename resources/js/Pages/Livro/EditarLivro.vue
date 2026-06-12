<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router, useForm } from "@inertiajs/vue3";
defineOptions({
    layout: AppLayout
})
const props = defineProps({
    livro: Object
})

const form = useForm({
    titulo: props.livro.titulo,
    autor: props.livro.autor,
    categoria: props.livro.categoria,
    status: props.livro.status
})

const submit = () => {
    form.put(`/atualizarLivro/${props.livro.id}`)
}
const cancelar = () => {
    router.visit('/listarLivro')
}
</script>


<template>
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Editar Livro</h1>
            <p class="text-gray-500 mt-2">Atualize as informações do livro</p>
        </div>
        <form @submit.prevent="submit" class="bg-white rounded-xl border border-gray-200 shadow-sm p-8">
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                    <input v-model="form.titulo" type="text" class="w-full rounded-lg border border-gray-300 px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Autor</label>
                    <input v-model="form.autor" type="text" class="w-full rounded-lg border border-gray-300  px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                    <input v-model="form.categoria" type="text"
                        class="w-full rounded-lg border border-gray-300  px-4 py-3">
                </div>
                <div class="hidden">   
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select v-model="form.status" class="w-full rounded-lg border border-gray-300 px-4 py-3">
                        <option value="disponivel">Disponível</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" @click="cancelar"
                        class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit" :disabled="form.processing"
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer">
                        Salvar Alterações
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>