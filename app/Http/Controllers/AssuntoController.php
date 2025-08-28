<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoRequest;
use App\Services\AssuntoService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AssuntoController extends Controller
{
    protected AssuntoService $assuntoService;

    public function __construct(AssuntoService $assuntoService)
    {
        $this->assuntoService = $assuntoService;
    }

    public function index(): View
    {
        $assuntos = $this->assuntoService->getAll();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create(): View
    {
        return view('assuntos.create');
    }

    public function store(AssuntoRequest $request): RedirectResponse
    {
        $this->assuntoService->create($request->validated());
        return redirect()->route('assuntos.index')->with('success', 'Assunto criado com sucesso.');
    }

    public function edit(int $id): View
    {
        $assunto = $this->assuntoService->findById($id);
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(AssuntoRequest $request, int $id): RedirectResponse
    {
        $this->assuntoService->update($id, $request->validated());
        return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->assuntoService->delete($id);
        return redirect()->route('assuntos.index')->with('success', 'Assunto deletado com sucesso.');
    }
}
