<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HigherEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'gender',
        'citizenship',
        'religion',
        'civil_status',
        'birthdate',
        'birth_place',
        'contact',
        'permanent_address',
        'current_address',
        'father_name',
        'mother_name',
        'status', 
        'degree_applications', 
        'highschool_attended', 
        'school_names', 
        'grades_submitted', 
        'enrolled_summer', 
        'disciplinary_actions'
    ];
}
