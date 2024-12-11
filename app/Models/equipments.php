<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipments extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentsFactory> */
    use HasFactory;

    protected $table = 'equipments';
    protected $guarded = [];
}
