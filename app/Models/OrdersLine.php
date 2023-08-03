<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'qty',
        'product_id',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function costProduct()
    {
        return $this->qty * $this->product->cost;
    }

}
