<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function scopeSearch($query, $value){
        $query->where('titre', 'like', "%{$value}%")
                ->orWhere('authors.nom', 'like', "%{$value}%")
                ->orWhere('authors.prenom', 'like', "%{$value}%");
    }
}
