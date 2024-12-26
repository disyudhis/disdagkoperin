<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtopics extends Model
{
    use HasFactory;

    protected $table = 'subtopics';

    protected $fillable = [
        'topic_id',
        'title',
        'content',
        'file',
    ];

    public function topics(){
        return $this->belongsTo(Topics::class);
    }

    public function progress(){
        return $this->hasMany(Progress::class);
    }
}
