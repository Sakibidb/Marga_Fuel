<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Vehicle;
use App\Models\backend\Driver;
use App\Models\backend\Shift;
use App\Models\User;

class VehicleAssign extends Model
{
    protected $fillable = ['vehicle_id', 'user_id', 'shift_id', 'capacity',];
    use HasFactory;




    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' , "id");
    }


    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
}
