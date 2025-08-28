@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')
    <h1>Editar Livro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.update', $livro->Codl) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-3 col-3">
                <label class="form-label">Título</label>
                <input type="text" name="Titulo" class="form-control" value="{{ $livro->Titulo ?? old('Titulo') }}" required>
            </div>

            <div class="mb-3 col-3">
                <label class="form-label">Editora</label>
                <input type="text" name="Editora" class="form-control" value="{{ $livro->Editora ?? old('Editora') }}" required>
            </div>

            <div class="mb-3 col-2">
                <label class="form-label">Edição</label>
                <input type="number" min="1" name="Edicao" class="form-control" value="{{ $livro->Edicao ?? old('Edicao') }}" required>
            </div>
            <div class="mb-3 col-2">
                <label class="form-label">Ano da Publicação</label>
                <input type="number" min="1000" name="AnoPublicacao" class="form-control" value="{{ $livro->AnoPublicacao ?? old('AnoPublicacao') }}" required>
            </div>

            <div class="mb-3 col-2">
                <label class="form-label">Valor</label>
                <input type="text" name="Valor" class="form-control" id="valor" value="{{ $livro->Valor ?? old('Valor') }}" required>
            </div>

            <div class="mb-3 col-6">
                <label class="form-label">Autores</label>
                <select name="autores[]" class="form-select" multiple required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->CodAu }}"
                            {{ in_array($autor->CodAu, old('autores', $livro->autores->pluck('CodAu')->toArray())) ? 'selected' : '' }}>
                            {{ $autor->Nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-6">
                <label class="form-label">Assuntos</label>
                <select name="assuntos[]" class="form-select" multiple required>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->CodAs }}"
                            {{ in_array($assunto->CodAs, old('assuntos', $livro->assuntos->pluck('CodAs')->toArray())) ? 'selected' : '' }}>
                            {{ $assunto->Descricao }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-4">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>

    </form>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#valor').mask('#.##0,00', {reverse: true});
    });
</script>
@endsection
