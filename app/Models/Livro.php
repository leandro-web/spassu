<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'Livro';
    protected $primaryKey = 'Codl';

    protected $fillable = ['Titulo','Editora','Edicao','AnoPublicacao','Valor'];

    public function autores()  {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'Livro_Codl', 'Autor_CodAu');
    }

    public function assuntos() {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'Livro_Codl', 'Assunto_CodAs');
    }
}
