<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanent extends Model
{
    use HasFactory;

    protected $table = 'hostel_booking';

    protected $fillable = [
        'tanent name',
        'tanent gender',
        'tanent age',
        'tanent occupation',
        'tanent id number',
        'tanent email',
        'tanent mobile number',
        'tanent address',
        'tanent nationality',
        'tanent deposit',
        'tanent room number',
        'tanent room type',
        'tanent room price per month',
        'tanent room status',
        'tanent room check in date',
        'tanent room check out date',
        'tanent room booking payment status',
        'tanent room booking payment amount'

    ];

}
