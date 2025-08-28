<?php

namespace App\Services;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Collection;

class AutorService
{
    public function getAll(): Collection
    {
        return Autor::all();
    }

    public function findById(int $CodAu): ?Autor
    {
        return Autor::find($CodAu);
    }

    public function create(array $data): Autor
    {
        return Autor::create($data);
    }

    public function update(int $CodAu, array $data): ?Autor
    {
        $autor = Autor::find($CodAu);
        if ($autor) {
            $autor->update($data);
        }
        return $autor;
    }

    public function delete(int $CodAu): bool
    {
        $autor = Autor::find($CodAu);
        return $autor ? $autor->delete() : false;
    }
}
