<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    /** @use HasFactory<\Database\Factories\ClassesFactory> */
    use HasFactory;

    protected $table = 'classes';

    protected $guarded=[];

    public function trainers()
    {
        return $this->belongsTo(trainers::class);
    }

    public function members()
    {
        return $this->belongsToMany(Members::class,foreignPivotKey:"classes_id",table:"members_classes");
    }
}
