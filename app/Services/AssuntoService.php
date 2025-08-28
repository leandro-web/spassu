<?php

namespace App\Services;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Collection;

class AssuntoService
{
    public function getAll(): Collection
    {
        return Assunto::all();
    }

    public function findById(int $CodAs): ?Assunto
    {
        return Assunto::find($CodAs);
    }

    public function create(array $data): Assunto
    {
        return Assunto::create($data);
    }

    public function update(int $CodAs, array $data): ?Assunto
    {
        $assunto = Assunto::find($CodAs);
        if ($assunto) {
            $assunto->update($data);
        }
        return $assunto;
    }

    public function delete(int $CodAs): bool
    {
        $assunto = Assunto::find($CodAs);
        return $assunto ? $assunto->delete() : false;
    }
}
