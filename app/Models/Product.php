<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cost',
    ];

    public function orderLines()
    {
        return $this->belongsTo(orderLines::class, 'product_id', 'id');
    }
}
