<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['articul', 'img', 'weight', 'inserts', 'category_id', 'catalog_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
