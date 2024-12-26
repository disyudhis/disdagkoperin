<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;

    protected $table = 'topics';

    protected $fillable = [
        'title',
        'description',
        'workshop_id'
    ];

    public function workshop() {
        return $this->belongsTo(Workshop::class);
    }

    public function subtopics(){
        return $this->hasMany(Subtopics::class, 'topic_id');
    }
}
