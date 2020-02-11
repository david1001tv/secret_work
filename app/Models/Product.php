<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['image', 'cost', 'name', 'description', 'category_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function characteristics()
    {
        return $this->hasMany(Characteristic::class);
    }
}
