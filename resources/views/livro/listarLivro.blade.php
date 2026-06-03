<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($livros as $livro)
                <tr>
                    <td class="fw-bold">{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->categoria }}</td>
                    <td>
                        @if($livro->status === 'disponivel')
                        <span class="badge bg-success text-capitalize">Disponível</span>
                        @elseif($livro->status === 'alugado')
                        <span class="badge bg-danger text-capitalize">Alugado</span>
                        @else
                        <span class="badge bg-secondary text-capitalize">{{ $livro->status }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        Nenhum livro cadastrado até o momento.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>