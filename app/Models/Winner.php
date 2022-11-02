<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function prize() {
        return $this->belongsTo(Prize::class);
    }
}
