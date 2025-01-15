<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Booking extends EloquentModel
{
    protected $fillable = ['customer_name', 'booking_date'];

    public function models()
    {
        return $this->belongsToMany(Model::class);
    }
}
