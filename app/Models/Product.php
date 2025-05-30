<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
