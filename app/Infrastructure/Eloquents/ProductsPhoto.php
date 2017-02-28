<?php

namespace App\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model
{
    protected $fillable = ['product_id', 'filename'];

    public function product()
    {
        return $this->belongsTo(Product::class);


//        return $this->belongsToMany(Product::class);
//        return $this->hasMany(Post::class);
//        return $this->hasOne('App\Phone');
    }
}
