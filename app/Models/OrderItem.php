<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Nom de la table associée au modèle
    protected $table = 'order_items';

    // Liste des champs pouvant être remplis massivement
    protected $fillable = ['quantity', 'created_at', 'updated_at', 'id_product', 'id_order'];

    // Colonnes que Laravel convertira automatiquement en objets Carbon (dates)
    protected $dates = ['created_at', 'updated_at'];

    // Clé primaire de la table
    protected $primaryKey = 'id';

    // Indique si les colonnes de timestamp (created_at et updated_at) doivent être activées
    public $timestamps = true;

    // Relation avec le modèle Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    // Relation avec le modèle Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
