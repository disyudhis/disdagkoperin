<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    const STATUS_DONE = "SUDAH";
    const STATUS_NOT = "BELUM";
    const STATUS_ALPHA = "ALPHA";

    protected $table = 'attendance';

    protected $fillable = [
        'user_id',
        'workshop_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function workshop(){
        return $this->belongsTo(Workshop::class);
    }

    public function progress(){
        return $this->hasMany(Progress::class);
    }

    public function getAttendanceStatusColorAttribute() {
        if ($this->status == self::STATUS_DONE) {
            return 'success';
        }elseif($this->status == self::STATUS_NOT){
            return 'secondary';
        }else{
            return 'danger';
        }
    }

    public function getProgressPercentageAttribute(){
       $totalSubTopic = $this->workshop->topics()
       ->withCount('subtopics')
       ->get()
       ->sum('subtopics_count');

       if($totalSubTopic === 0) return 0;

       $completedSubtopic = $this->progress()
       ->where('is_completed', true)
       ->count();

       return round(($completedSubtopic / $totalSubTopic) * 100);
    }
}
