<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['date_debut', 'date_fin','status', 'book_id', 'user_id'];
    public function scopeSearch($query, $value){
        $query->where('books.titre', 'like', "%{$value}%")->orderBy('titre');
    }
}
