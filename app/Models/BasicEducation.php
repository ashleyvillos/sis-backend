<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'birth_certificate_no',
        'learner_reference_number',
        'lastname',
        'firstname',
        'middlename',
        'extension',
        'birthdate',
        'gender',
        'ip_community',
        'mother_tongue',
        'house_no',
        'street',
        'baranggay',
        'city',
        'municipality',
        'province',
        'country',
        'zipcode',
        'father_lastname',
        'father_firstname',
        'father_middlename',
        'father_mobile',
        'father_phone',
        'mother_lastname',
        'mother_firstname',
        'mother_middlename',
        'mother_mobile',
        'mother_phone',
        'guardian_lastname',
        'guardian_firstname',
        'guardian_middlename',
        'guardian_mobile',
        'guardian_phone',
        'last_grade_level_completed',
        'last_school_year_completed',
        'school_name',
        'school_id',
        'school_address',
        'semester',
        'track',
        'strand',
        'status'
    ];
}
