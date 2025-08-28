<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorRequest;
use App\Services\AutorService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AutorController extends Controller
{
    protected AutorService $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function index(): View
    {
        $autores = $this->autorService->getAll();
        return view('autores.index', compact('autores'));
    }

    public function create(): View
    {
        return view('autores.create');
    }

    public function store(AutorRequest $request): RedirectResponse
    {
        $this->autorService->create($request->validated());
        return redirect()->route('autores.index')->with('success', 'Autor criado com sucesso.');
    }

    public function edit(int $id): View
    {
        $autor = $this->autorService->findById($id);
        return view('autores.edit', compact('autor'));
    }

    public function update(AutorRequest $request, int $id): RedirectResponse
    {
        $this->autorService->update($id, $request->validated());
        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->autorService->delete($id);
        return redirect()->route('autores.index')->with('success', 'Autor deletado com sucesso.');
    }
}
