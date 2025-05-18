<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'floor',
        'type',
        'description',
        'facilities',
        'code',
        'status',
        'qr_code_path',
        'user',
        'user_id',
    ];

    protected $casts = [
        'facilities' => 'array',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function roomRequests()
    {
        return $this->hasMany(RoomRequest::class);
    }
}
