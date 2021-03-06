<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $fillable = ['title', 'slug', 'category_id', 'img'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
