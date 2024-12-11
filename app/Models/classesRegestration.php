<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classesRegestration extends Model
{
    /** @use HasFactory<\Database\Factories\ClassesRegestrationFactory> */
    use HasFactory;

    protected $table = 'members_classes';

    protected $guarded=[];
}
