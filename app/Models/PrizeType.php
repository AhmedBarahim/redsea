<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrizeType extends Model
{
    // protected $table="prize_types";
    protected $fillable = ['name'];
    use HasFactory;

    public function prizes() {
        return $this->hasMany(Prize::class);
    }
}
