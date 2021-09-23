<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;
    
    protected $table = 'products_galleries';

    protected $fillable = [
        'products_id','photo', 'is_default'
    ] ;

    protected $hidden = [

    ];

    public function products () {
        
        return $this->belongsTo(Product::class,'products_id', 'id');

    }

    public function getPhotoAttribute($value) {
        return url('storage/' , $value);
    }
}
