<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $fillable = ['first_name', 'last_name', 'phone_number', 'mail'];

    public function Customers()
    {
        return $this->hasMany(Customers::class);
    }

    public function Driver()
    {
        return $this->hasMany(Driver::class);
    }
}
