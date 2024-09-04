<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteTouristique extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'longitude',
        'lattitude'
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
    public function piece(){
        return $this->hasMany(Piece::class);
    }
    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
