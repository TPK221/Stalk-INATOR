<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mission_id',
    ];
    
    public function lecturerProfile(){
        return $this->belongsTo(lecturerProfile::class);
    }

    public function studentProfile(){
        return $this->belongsToMany(studentProfile::class);
    }

    public function Missions(){
        return $this->belongsTo(Missions::class);
    }
}
