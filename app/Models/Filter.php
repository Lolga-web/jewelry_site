<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Filter extends Model
{
    use HasFactory;

    protected $table = 'filters';

    protected $fillable = [
        'product_id', 
        'stones',
        'nostones',
        'pearls',
        'male',
        'female',
        'newborn',
        'zodiac',
        'love',
        'muslim',
        'enamel'
    ];

    public function products()
    {
        return $this->hasOne(Product::class);
    }

    public function productByFilters(Request $request, $builder)
    {
        if ($request->has('stones')) { 
            $builder->where('stones', 1);
        }
        if ($request->has('nostones')) { 
            $builder->where('nostones', 1);
        }
        if ($request->has('pearls')) { 
            $builder->where('pearls', 1);
        }

        return $builder;
    }

}
