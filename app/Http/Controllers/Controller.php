<?php

namespace App\Http\Controllers;

use App\Models\Room;

abstract class Controller
{
    public function dashboard()
    {
        // Ambil semua data ruangan
        $rooms = Room::all();
    
        // Hitung total ruangan
        $total = $rooms->count();
    
        // Hitung ruangan yang tersedia
        $available = $rooms->where('status', 'available')->count();
    
        // Hitung ruangan yang terisi
        $occupied = $rooms->where('status', 'occupied')->count();
    
        // Kirim variabel ke view dashboard
        return view('rooms.index', compact('total', 'available', 'occupied'));
    }
}
