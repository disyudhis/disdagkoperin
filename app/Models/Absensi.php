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

    protected $table = 'absensi';

    protected $fillable = [
        'user_id',
        'status',
        'keterangan',
        'absen_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
