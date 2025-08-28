<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { font-size: 18px; margin-bottom: 6px; }
        .autor { background:#f2f2f2; padding:6px 8px; margin-top:12px; font-weight:700; }
        table { width:100%; border-collapse: collapse; margin-top:8px; }
        th, td { border: 1px solid #444; padding:6px; text-align: left; vertical-align: top; }
        th { background:#e9e9e9; }
        .valor { text-align: right; white-space: nowrap; }
        .small { font-size: 11px; color:#555; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <h1>Relatório de Livros por Autor</h1>
    <p class="small">Gerado em: {{ date('d/m/Y H:i') }}</p>

    @foreach($listaPorAutor as $autor => $linhas)
        <div class="autor">{{ $autor }} ({{ $linhas->count() }} livro(s))</div>

        <table>
            <thead>
                <tr>
                <th>Título</th>
                <th>Editora</th>
                <th>Edição</th>
                <th>Ano</th>
                <th>Assuntos</th>
                <th class="valor">Valor (R$)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($linhas as $l)
                    <tr>
                    <td>{{ $l->Titulo }}</td>
                    <td>{{ $l->Editora }}</td>
                    <td>{{ $l->Edicao }}</td>
                    <td>{{ $l->AnoPublicacao }}</td>
                    <td>{{ $l->assuntos }}</td>
                    <td class="valor">R$ {{ number_format($l->Valor, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>
