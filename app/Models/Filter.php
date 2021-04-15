<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $table = 'filters';

    protected $fillable = [
        'product_id', 
        'stones',
        'nostones',
        'pearls'
    ];

    public function products()
    {
        return $this->hasOne(Product::class);
    }
}
