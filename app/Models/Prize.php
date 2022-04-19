<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;
    // protected $table="prizes";

    public function prizeType() {
        return $this->belongsTo(PrizeType::class);
    }
    public function winners() {
        return  $this->hasOne(Winner::class);
    }
}
