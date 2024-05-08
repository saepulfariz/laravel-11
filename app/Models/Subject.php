<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = "subjects";

    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_subject');
    }
}
