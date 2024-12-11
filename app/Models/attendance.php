<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $table = 'attendances';

    protected $guarded = [];

    public function members()
    {
        return $this->belongsTo(Members::class);
    }

}
