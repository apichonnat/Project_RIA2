<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['user_id', 'street', 'street_number', 'city', 'npa','country'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
