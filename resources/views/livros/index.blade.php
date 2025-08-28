@extends('layouts.app')

@section('title', 'Lista de Livros')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Livros</h1>
        <a href="{{ route('livros.create') }}" class="btn btn-primary">+ Adicionar Livro</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Editora</th>
                <th>Edição</th>
                <th>Ano de Publicação</th>
                <th>Valor</th>
                <th class="text-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($livros as $livro)
                <tr>
                    <td>{{ $livro->Titulo }}</td>
                    <td>{{ $livro->Editora }}</td>
                    <td>{{ $livro->Edicao }}</td>
                    <td>{{ $livro->AnoPublicacao }}</td>
                    <td>R$ {{ number_format($livro->Valor, 2, ',', '.') }}</td>
                    <td class="text-end">
                        <a href="{{ route('livros.edit', $livro->Codl) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('livros.destroy', $livro->Codl) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Nenhum livro encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
