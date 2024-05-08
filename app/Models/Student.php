<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'npm',
        'gender',
        'address',
    ];

    public $genders = ['L', 'P'];

    protected $table = "students";

    public function subject()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }
}
