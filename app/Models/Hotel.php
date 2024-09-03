<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'type',
        'description',
        'longitude',
        'lattitude'
        ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
    public function pieces(){
        return $this->hasMany(Piece::class);
    }
}
