<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $fillable = ['name', 'price', 'img', 'status', 'content', 'create_year'];
    use HasFactory;
    public function product() {
        return $this->belongsTo(Product::class, 'brand_product');
    }

    public function getNameAttribute() {
        $this->attributes;
    }
}
