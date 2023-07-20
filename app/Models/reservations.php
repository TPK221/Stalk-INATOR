<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mission_id',
        'status',
        'points',
        'feedback',
        
    ];

    public function lecturerProfile()
    {
        return $this->belongsTo(lecturerProfile::class);
    }

    public function studentProfile()
    {
        return $this->belongsTo(studentProfile::class, 'user_id');
    }

    public function mission()
    {
        return $this->belongsTo(Missions::class, 'mission_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submission()
    {
        return $this->hasOne(Submissions::class, 'mission_id');
    }
}
