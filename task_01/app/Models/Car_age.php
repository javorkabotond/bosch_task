<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_age extends Model
{
    use HasFactory;

    protected $fillable = ['age'];

    public function servicebooks()
    {
        return $this->hasOne(Servicebooks::class);
    }
}
