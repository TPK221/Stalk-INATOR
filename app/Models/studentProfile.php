<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentProfile extends Model
{
    use HasFactory;
    protected $table = 'student_profiles';

    protected $fillable =
    [
        'user_id',
        'fullName',
        'studentID',
        'image',
        'points'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Submission(){
        return $this->hasMany(Submissions::class);
    }

    public function mission()
    {
        return $this->belongsTo(Missions::class);
    }

    public function reservations()
    {
        return $this->hasMany(reservations::class, 'user_id');
    }
    
}
