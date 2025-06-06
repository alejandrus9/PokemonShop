<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    protected $table = 'productos'; 
    protected $primaryKey = 'ID_PRODUCTO';
    public $timestamps = false; 

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'CATEGORIA', 'ID_CATEGORIA');
    }

    public function expansion()
    {
        return $this->belongsTo(Expansion::class, 'EXPANSION', 'ID_EXPANSION');
    }

    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'IDIOMA', 'ID_IDIOMA');
    }
}
