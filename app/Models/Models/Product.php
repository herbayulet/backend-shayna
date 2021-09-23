<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    // protected $table ='products';

    protected $fillable = [
        'name', 'type', 'description', 'price', 'quantity'
    ] ;

    protected $hidden = [

    ];

    public function products_galleries () {
        
        return $this->hasMany(ProductGallery::class,'products_id');

    }
}
