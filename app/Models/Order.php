<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_ref',
        'customer_name',
    ];

    public function orderLines()
    {
        return $this->hasMany(OrdersLine::class, 'order_id', 'id');
    }

    public function totalQty()
    {   
        $qty = 0;
        foreach($this->orderLines as $line){
            $qty = $qty + $line->qty;
        }
        return $qty;
    }

    public function total()
    {   
        $total = 0;
        foreach($this->orderLines as $line){
            $total = $total + $line->costProduct();
        }
        return $total;
    }
}

