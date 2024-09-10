<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'type',
        'description',
        'longitude',
        'lattitude',
        'type',
        'statut'
        ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
    public function pieces(){
        return $this->hasMany(Piece::class);
    }
    //fonction pour le stockage de l'image
    public function ImageUrl(){
        return Storage::disk('public')->url($this->image);
    }
}
