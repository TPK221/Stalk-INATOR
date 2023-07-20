<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_profile_id',
        'mission_id',
        'submissionFile',
        'status',
    ];

    public function studentSubmission()
    {
        return $this->belongsTo(studentProfile::class, 'student_profile_id');
    }

    public function mission()
    {
        return $this->belongsTo(Missions::class, 'mission_id');
    }

    public function reservation()
    {
        return $this->belongsTo(reservations::class, 'mission_id');
    }
}

