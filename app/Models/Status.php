<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = ['name', 'key'];
    protected $hidden = ['created_at', 'updated_at'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
