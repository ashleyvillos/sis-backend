<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLogFile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_log_id',
        'filename'
    ];
}
