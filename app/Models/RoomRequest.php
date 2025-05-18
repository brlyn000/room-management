<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomRequest extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'access_date',
        'status',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
