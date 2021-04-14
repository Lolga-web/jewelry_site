<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'articul', 
        'img', 
        'weight', 
        'inserts', 
        'category_id', 
        'subcategory_id', 
        'catalog_id',
        'priority'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class);
    }

}
