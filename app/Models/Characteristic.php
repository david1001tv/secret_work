<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $table = 'characteristics';
    protected $fillable = ['type_id', 'product_id', 'value'];
    protected $hidden = ['created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo(CharacteristicType::class, 'type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
