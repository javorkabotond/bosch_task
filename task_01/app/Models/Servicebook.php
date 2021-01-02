<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicebook extends Model
{
    use HasFactory;

    protected $fillable = ['ownerName', 'car_id', 'startOfService','stopOfService','guarantee', 'car_age_id'];

    public function car() {
        return $this->belongsTo(Car::class);
    }
    public function car_age() {
        return $this->belongsTo(Car_age::class);
    }
}
