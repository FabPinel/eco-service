<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\DIY;

class DiyProduct extends Model
{
    use HasFactory;
    protected $table = 'DIYproducts';
    protected $primaryKey = 'id';
    protected $fillable = ['id_DIY', 'id_product'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function diy()
    {
        return $this->belongsTo(DIY::class, 'id_DIY');
    }
}
