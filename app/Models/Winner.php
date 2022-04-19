<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    public function customers() {
        return $this->belongsTo(Customer::class);
    }
    public function prizes() {
        return $this->belongsTo(Prize::class);
    }
}
