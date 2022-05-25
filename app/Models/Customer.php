<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'mac_address'
    ];

    use HasFactory;

    public function winners()
    {
        return  $this->hasMany(Winner::class);
    }
}
