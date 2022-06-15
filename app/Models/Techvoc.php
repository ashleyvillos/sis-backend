<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Techvoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'extension',
        'gender',
        'birthdate',
        'birthplace',
        'nationality',
        'street',
        'baranggay',
        'district',
        'region',
        'province',
        'city',
        'email',
        'mobile',
        'phone',
        'guardian',
        'guardian_address',
        'beneficiary',
        'relationship_to_beneficiary'
    ];
}
