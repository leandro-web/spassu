@extends('layouts.app')

@section('title', 'Adicionar Livro')

@section('content')
    <h1>Adicionar Novo Livro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="mb-3 col-3">
                <label class="form-label">Título</label>
                <input type="text" name="Titulo" class="form-control" value="{{ old('Titulo') }}" required>
            </div>

            <div class="mb-3 col-3">
                <label class="form-label">Editora</label>
                <input type="text" name="Editora" class="form-control" value="{{ old('Editora') }}" required>
            </div>

            <div class="mb-3 col-2">
                <label class="form-label">Edição</label>
                <input type="number" min="1" name="Edicao" class="form-control" value="{{ old('Edicao') }}" required>
            </div>
            <div class="mb-3 col-2">
                <label class="form-label">Ano da Publicação</label>
                <input type="number" min="1000" name="AnoPublicacao" class="form-control" value="{{ old('AnoPublicacao') }}" required>
            </div>

            <div class="mb-3 col-2">
                <label class="form-label">Valor</label>
                <input type="text" name="Valor" class="form-control" id="valor" value="{{ old('Valor') }}" required>
            </div>

            <div class="mb-3 col-6">
                <label class="form-label">Autores</label>
                <select name="autores[]" class="form-select" multiple required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->CodAu }}">{{ $autor->Nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-6">
                <label class="form-label">Assuntos</label>
                <select name="assuntos[]" class="form-select" multiple required>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->CodAs }}">{{ $assunto->Descricao }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3 col-4">
                <button type="submit" class="btn btn-success">Salvar</button>

                <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
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
