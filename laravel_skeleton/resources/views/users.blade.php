<!DOCTYPE html>
<html lang="pt-br">
@extends('master')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuarios</h1>
    @foreach ($users as $user)
        <div>{{ $user->nome }} - {{ $user->data_nascimento }}</div>
    @endforeach

    <!-- @if($user->id == 3)
            <div>{{ $user->name }}</div>
    @endif -->
</body>
</html>
