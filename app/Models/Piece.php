<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $fillable=[
        'description',
        'price',
        'type'
//        'hotel_id'
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
