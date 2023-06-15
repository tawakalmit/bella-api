<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function productcategory () {
        return $this->belongsTo(ProductCategory::class , 'product_category_id' , 'id');
    }
}
