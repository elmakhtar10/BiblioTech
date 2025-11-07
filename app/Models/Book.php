<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['titre', 'nombre_exemplaires','description','date_publication','date_creation',
        'date_modification','author_id','image'];

    public function scopeSearch($query, $value){
        $query->where('titre', 'like', "%{$value}%")
                ->orWhere('authors.nom', 'like', "%{$value}%")
                ->orWhere('authors.prenom', 'like', "%{$value}%")
                ->orderBy('titre');
    }
}
