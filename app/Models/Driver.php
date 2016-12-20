<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['user_id', 'license_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
