<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';

    protected $fillable = [
        'attendance_id',
        'subtopic_id',
        'is_completed'
    ];

    public function attendance(){
        return $this->belongsTo(Attendance::class);
    }

    public function subtopic(){
        return $this->hasMany(Subtopics::class);
    }
}
