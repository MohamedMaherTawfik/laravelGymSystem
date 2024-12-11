<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    /** @use HasFactory<\Database\Factories\TrainersFactory> */
    use HasFactory;
    protected $table = 'trainers';
    protected $guarded = [];

    public function classes(){
        return $this->hasMany(classes::class);
    }
}
