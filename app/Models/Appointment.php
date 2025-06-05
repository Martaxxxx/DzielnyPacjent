<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'pet_name',
        'reason',
        'appointment_date',
        'status',
        'email',
        'phone',
        'description',    
        'prescription',  
        'animal_type',
        'breed',
        'age',
        'weight',
        'notes', 
    ];
}
