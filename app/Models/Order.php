<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
       'order_number', 'full_name', 'email', 'phone', 'address', 'city', 'state', 'zip', 'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
