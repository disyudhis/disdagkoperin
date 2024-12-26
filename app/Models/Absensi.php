<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    const STATUS_ALPHA = 'ALPHA';
    const STATUS_DONE = 'SUDAH';
    const STATUS_NOTYET = 'BELUM';
    const STATUS_SICK = 'SAKIT';

    protected $table = 'absensi';

    protected $fillable = [
        'user_id',
        'status',
        'absen_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getAbsensiStatusColorAttribute() {
        if ($this->status == self::STATUS_DONE) {
            return 'success';
        }elseif($this->status == self::STATUS_NOTYET){
            return 'secondary';
        }else{
            return 'danger';
        }
    }
}
