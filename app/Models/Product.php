<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'created_at', 'updated_at', 'id_discount', 'id_cart_item', 'id_inventory'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'id_discount');
    }

    public function cartItem()
    {
        return $this->belongsTo(Cart::class, 'id_cart_item');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'id_inventory');
    }
}
