<script setup>
import { useForm, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
    layout: AppLayout
})

const props = defineProps({
    leitor: Object
})

const form = useForm({
    nome: props.leitor.nome,
    documento: props.leitor.documento,
    endereco: props.leitor.endereco
})

const submit = () => {
    form.put(`/atualizarLeitor/${props.leitor.id}`)
}

const cancelar = () => {
    router.visit('/listarLeitor')
}
</script>

<template>
    <div class="max-w-3xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Editar Leitor
            </h1>

            <p class="text-gray-500 mt-2">
                Atualize os dados do leitor.
            </p>
        </div>

        <form
            @submit.prevent="submit"
            class="bg-white rounded-xl border border-gray-200 shadow-sm p-8"
        >

            <div class="space-y-6">

                <!-- Nome -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nome
                    </label>

                    <input
                        v-model="form.nome"
                        type="text"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    />

                    <p
                        v-if="form.errors.nome"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.nome }}
                    </p>
                </div>

                <!-- Documento -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Documento
                    </label>

                    <input
                        v-model="form.documento"
                        type="text"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    />

                    <p
                        v-if="form.errors.documento"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.documento }}
                    </p>
                </div>

                <!-- Endereço -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Endereço
                    </label>

                    <textarea
                        v-model="form.endereco"
                        rows="4"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3"
                    ></textarea>

                    <p
                        v-if="form.errors.endereco"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.endereco }}
                    </p>
                </div>

            </div>

                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">

                    <button
                        type="button"
                        @click="cancelar"
                        class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer    "
                    >
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 cursor-pointer"
                    >
                        Salvar Alterações
                    </button>

                </div>

        </form>

    </div>
</template>