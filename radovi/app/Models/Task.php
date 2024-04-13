<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_name', 
        'work_name_english', 
        'work_mission', 
        'study_type'
    ];
    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}