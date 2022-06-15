<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassList extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'room_id',
        'teacher_id',
        'from',
        'to',
        'term_id',
        'sy',
    ];
}
