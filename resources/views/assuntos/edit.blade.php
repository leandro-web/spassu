@extends('layouts.app')

@section('title', 'Editar Assunto')

@section('content')
    <h1>Editar Assunto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assuntos.update', $assunto->CodAs) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" name="Descricao" class="form-control" value="{{ old('Descricao', $assunto->Descricao) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
