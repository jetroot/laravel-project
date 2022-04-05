<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id', 'first_name', 'last_name', 'birth_date',
        'birth_place', 'father_name', 'mother_name', 'gender', 
        'address', 'note', 'phone', 'profession'
    ];

    public $timestamps = false;
}
