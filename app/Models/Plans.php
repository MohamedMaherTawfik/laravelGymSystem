<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    /** @use HasFactory<\Database\Factories\PlansFactory> */
    use HasFactory;
    protected $table = 'plans';
    protected $guarded = [];

    public function members()
    {
        return $this->hasMany(Members::class);
    }
}
