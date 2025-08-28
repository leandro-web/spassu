<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Services\LivroService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LivroController extends Controller
{
    protected LivroService $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function index(): View
    {
        $livros = $this->livroService->getAll();
        return view('livros.index', compact('livros'));
    }

    public function create(): View
    {
        $autores = \App\Models\Autor::all();
        $assuntos = \App\Models\Assunto::all();
        return view('livros.create', compact('autores', 'assuntos'));
    }

    public function store(LivroRequest $request): RedirectResponse
    {
        $this->livroService->create($request->validated());
        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso.');
    }

    public function edit(int $id): View
    {
        $livro = $this->livroService->findById($id);
        $autores = \App\Models\Autor::all();
        $assuntos = \App\Models\Assunto::all();

        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    public function update(LivroRequest $request, int $id): RedirectResponse
    {
        $this->livroService->update($id, $request->validated());
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->livroService->delete($id);
        return redirect()->route('livros.index')->with('success', 'Livro deletado com sucesso.');
    }
}
