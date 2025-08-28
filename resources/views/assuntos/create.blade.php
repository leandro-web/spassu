@extends('layouts.app')

@section('title', 'Adicionar Assunto')

@section('content')
    <h1>Adicionar Novo Assunto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assuntos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" name="Descricao" class="form-control" value="{{ old('Descricao') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
