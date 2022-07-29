<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'logged_by',
        'log_type',
        'remarks'
    ];
}
