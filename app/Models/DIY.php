<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DIY extends Model
{
    use HasFactory;

    protected $table = 'DIY';

    protected $fillable = ['title', 'description', 'image', 'video', 'text', 'recipe', 'ustensils'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;
}