<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawer extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'store_id',
        'bill_no',
        'bill_price',
        'coupon_no',
        'bill_img',
        'active',
        'winner'
    ];
    use HasFactory;

     public function store() {
        return $this->belongsTo(Store::class);
    }
}
