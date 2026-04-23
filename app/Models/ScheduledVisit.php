<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email_address',
        'property_location',
        'preferred_date',
        'preferred_time',
        'service_required',
        'brief_details',
        'status'
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'preferred_time' => 'datetime:H:i',
    ];
}