<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reproductiveHealth extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function searchCase()
    {
        return $this->belongsTo(searchCase::class);
    }
}
