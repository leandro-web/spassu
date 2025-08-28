@extends('layouts.app')

@section('title', 'Lista de Autores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Autores</h1>
        <a href="{{ route('autores.create') }}" class="btn btn-primary">+ Adicionar Autor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Autor</th>
                <th class="text-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($autores as $autor)
                <tr>
                    <td>{{ $autor->Nome }}</td>
                    <td class="text-end">
                        <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2" class="text-center">Nenhum autor encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
