<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackFactory> */
    use HasFactory;
    protected $table = 'feedback';
    protected $guarded = [];

    public function member(){
        return $this->belongsTo(Members::class);
    }
}
