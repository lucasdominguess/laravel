<!DOCTYPE html>
<html lang="en">
@extends('master')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aniversariantes do mes</title>
</head>
<body>
    <h1 class="text-center ">Title</h1>
    <table class="table table-striped table-bordered table-hover d-flex flex-direction-column justify-content-center align-items-center"> ">
        <tbody>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Editar/Excluir</th>
            </tr>


            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->data_nascimento }}</td>
                    <td>
                        <a href="'aniversariantes/update', $user->id) }}" class="btn btn-primary">Editar</a>
                        <form action="'aniversariantes/delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                </tr>
                @endforeach
                {{ $users->links()}}
        </tbody>
    </table>
    <!-- @foreach ($users as $user)
        <div>

            <td>{{ $user->nome }}</td>
            <td>{{ $user->data_nascimento }}</td>

       </div>
    @endforeach

    @if($user->id == 3)
            <div>{{ $user->name }}</div>
    @endif -->

</body>
</html>
