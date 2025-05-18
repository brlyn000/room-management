<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = Room::count();
        $available = Room::where('status', 'available')->count();
        $occupied = Room::where('status', 'occupied')->count();
    
        // Jika kamu juga mengirim daftar ruangan
        $rooms = Room::paginate(8); // Adjust 10 to the number of items per page    
        return view('dashboard', compact('total', 'available', 'occupied', 'rooms'));
    }
   }
