<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    protected $table = 'vw_livros_por_autor';
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
}
