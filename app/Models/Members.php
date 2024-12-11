<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    /** @use HasFactory<\Database\Factories\MembersFactory> */
    use HasFactory;
    protected $table = 'members';
    protected $guarded = [];

    public function attendance()
    {
        return $this->hasMany(attendance::class);
    }

    public function classes(){
        return $this->belongsToMany(classes::class,foreignPivotKey:"members_id",table:"members_classes");
    }

    public function plans(){
        return $this->belongsTo(Plans::class);
    }

    public function payments(){
        return $this->hasMany(Payments::class);
    }

    public function feedback(){
        return $this->hasMany(feedback::class);
    }
}
