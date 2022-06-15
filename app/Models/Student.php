<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'basic_education_id',
        'madaris_id',
        'higher_education_id',
        'techvoc_id',
    ];
}
