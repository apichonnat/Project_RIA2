<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Customers extends Model
{
    protected $fillable = ['user_id', 'street', 'street_number', 'city', 'country'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
