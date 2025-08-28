<?php

namespace App\Services;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Collection;

class LivroService
{
    public function getAll(): Collection
    {
        return Livro::all();
    }

    public function findById(int $Codl): ?Livro
    {
        return Livro::find($Codl);
    }

    public function create(array $data): Livro
    {
        $autores = $data['autores'] ?? [];
        $assuntos = $data['assuntos'] ?? [];
        unset($data['autores'], $data['assuntos']);

        $livro = Livro::create($data);

        $livro->autores()->sync($autores);
        $livro->assuntos()->sync($assuntos);

        return $livro;
    }

    public function update(int $Codl, array $data): ?Livro
    {
        $livro = Livro::find($Codl);
        if ($livro) {
            $autores = $data['autores'] ?? [];
            $assuntos = $data['assuntos'] ?? [];
            unset($data['autores'], $data['assuntos']);

            $livro->update($data);

            $livro->autores()->sync($autores);
            $livro->assuntos()->sync($assuntos);
        }
        return $livro;
    }

    public function delete(int $Codl): bool
    {
        $livro = Livro::find($Codl);
        return $livro ? $livro->delete() : false;
    }
}
