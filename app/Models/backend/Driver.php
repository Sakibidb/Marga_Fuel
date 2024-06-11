<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'drivinglicense', 'password', 'driver_id', 'licenseImage','nid','nidimage'];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
}
