<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $hidden = ['created_at', 'updated_at', 'password'];

    protected $fillable = ['email', 'password', 'phone', 'name', 'address', 'role_id'];

    /**
     * Set the user's password with hashing
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}