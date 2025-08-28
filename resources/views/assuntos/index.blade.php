@extends('layouts.app')

@section('title', 'Lista de Assuntos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Assuntos</h1>
        <a href="{{ route('assuntos.create') }}" class="btn btn-primary">+ Adicionar Assunto</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Assunto</th>
                <th class="text-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($assuntos as $assunto)
                <tr>
                    <td>{{ $assunto->Descricao }}</td>
                    <td class="text-end">
                        <a href="{{ route('assuntos.edit', $assunto->CodAs) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('assuntos.destroy', $assunto->CodAs) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2" class="text-center">Nenhum assunto encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
