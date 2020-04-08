<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'status_id', 'cost', 'delivery_type_id', 'delivery_address'];
    protected $hidden = ['updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class);
    }
}
