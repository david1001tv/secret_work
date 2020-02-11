<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicType extends Model
{
    protected $table = 'characteristics_types';
    protected $fillable = ['name', 'category_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
