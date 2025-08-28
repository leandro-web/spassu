<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $rows = Relatorio::orderBy('autor_nome')->get();
        $listaPorAutor = $rows->groupBy('autor_nome');
        $pdf = Pdf::loadView('relatorios.index', compact('listaPorAutor'));

        return $pdf->stream('relatorio_livros.pdf');
    }
}
