<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'star_quantity',
        'comment'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
