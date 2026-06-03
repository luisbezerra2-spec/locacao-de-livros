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
                    <th scope="col">Nome</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Endereco</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leitores as $leitor)
                <tr>
                    <td class="fw-bold">{{ $leitor->nome }}</td>
                    <td>{{ $leitor->documento }}</td>
                    <td>{{ $leitor->endereco }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>