<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentsFactory> */
    use HasFactory;

    protected $table = 'payments';

    protected $guarded=[];

    public function member()
    {
        return $this->belongsTo(Members::class);
    }
}
