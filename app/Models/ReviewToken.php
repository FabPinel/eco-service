<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewToken extends Model
{
    use HasFactory;

    protected $table = "review_tokens";

    protected $fillable = ["user_id", "order_id", "token", "expires_at"];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
