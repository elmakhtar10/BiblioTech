<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['nom', 'prenom', 'biographie', 'photo'];
    public $timestamps = false;
    use HasFactory;
//    public function getPhotoUrlAttribute()
//    {
//        return $this->photo ? asset('storage/authors/' . $this->photo) : asset('storage/authors/default.jpg');
//    }

    public function scopeSearch($query, $value)
    {
        $query->where('nom', 'like', "%{$value}%")
            ->orWhere('prenom', 'like', "%{$value}%")
            ->orderBy('nom');
    }
}
