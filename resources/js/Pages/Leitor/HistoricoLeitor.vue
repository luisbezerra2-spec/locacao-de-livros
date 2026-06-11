<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

defineOptions({
    layout: AppLayout
})

defineProps({
    leitor: Object
})
</script>

<template>

    <div class="container">

        <h1>
            Histórico de Empréstimos de {{ leitor.nome }}
        </h1>

        <div v-if="leitor.locacoes.length">

            <table border="1">

                <thead>
                    <tr>
                        <th>Livro</th>
                        <th>Data de Empréstimo</th>
                        <th>Data de Devolução</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="locacao in leitor.locacoes"
                        :key="locacao.id"
                    >
                        <td>{{ locacao.livro.titulo }}</td>

                        <td>
                            {{ locacao.data_retirada }}
                        </td>

                        <td>
                            {{
                                locacao.data_devolucao
                                    ? new Date(locacao.data_devolucao).toLocaleDateString()
                                    : 'Ainda não devolvido'
                            }}
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>

        <p v-else>
            Este leitor ainda não realizou nenhum empréstimo.
        </p>

        <button @click="$inertia.visit('/listarLeitor')">
            Voltar para Lista de Leitores
        </button>

    </div>

</template>

<style scoped>

.container {
    padding: 20px;
}

h1 {
    color: #333;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

th,
td {
    padding: 10px;
}

th {
    background-color: #f0f0f0;
}

button {
    margin-top: 20px;
    padding: 10px 15px;
    background-color: blue;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: darkblue;
}

</style>