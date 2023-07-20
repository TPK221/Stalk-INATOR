<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missions extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_instruction',
        'difficulty',
        'start_date',
        'due_date',
    ];

    public function lecturerProfile()
    {
        return $this->belongsTo(lecturerProfile::class, 'lecturer_profile_id');
    }

    public function studentProfile()
    {
        return $this->belongsToMany(studentProfile::class);
    }

    public function Submissions()
    {
        return $this->hasMany(Submissions::class, 'mission_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(reservations::class, 'mission_id');
    }


    public function isReservedBy(User $user)
    {
        return $this->reservations()->where('user_id', $user->id)->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
