<script setup>
import { useForm, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
    layout: AppLayout
})

const form = useForm({
    nome: '',
    documento: '',
    endereco: ''
})

const submit = () => {
    form.post('/salvarLeitor', {
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
                Cadastro de Leitor
            </h1>

            <p class="text-gray-500 mt-2">
                Adicione um novo leitor ao sistema.
            </p>
        </div>

        <!-- Formulário -->
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
                        placeholder="Digite o nome do leitor"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
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
                        Documento (CPF/RG)
                    </label>

                    <input
                        v-model="form.documento"
                        type="text"
                        placeholder="Digite o CPF ou RG"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
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

                    <input
                        v-model="form.endereco"
            
                        placeholder="Digite o endereço completo"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    ></input>

                    <p
                        v-if="form.errors.endereco"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.endereco }}
                    </p>
                </div>

            </div>

            <!-- Botões -->
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
                    class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50"
                >
                    Salvar Leitor
                </button>

            </div>

        </form>

    </div>
</template>