<?php

namespace App\Http\Controllers;

use App\Models\RoomRequest;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomRequests = RoomRequest::with('room')->latest()->paginate(10);
        return view('room-requests.index', compact('roomRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function accept($id)
    {
        $request = RoomRequest::findOrFail($id);
    
        // Cek apakah request punya relasi room yang valid
        if ($request->room) {
            $room = $request->room;
            $room->status = 'occupied'; // ubah status menjadi occupied
            $room->save(); // simpan perubahan
        }
    
        return redirect()->back()->with('success', 'Ruangan telah diterima dan status diubah menjadi occupied.');
    }

    public function editStatus(Request $request, RoomRequest $roomRequest)
    {
        $roomRequest->status = $request->input('status');
        $roomRequest->save();

        return redirect()->route('room-requests.index')->with('success', 'Status permintaan diubah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'access_date' => 'required|date|after_or_equal:today',
        ]);
    
        RoomRequest::create([
            'room_id' => $request->room_id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'access_date' => $request->access_date,
        ]);
    
        return redirect()->route('rooms.index')->with('success', 'Permintaan ruangan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $request = RoomRequest::findOrFail($id);
    
        // Kembalikan status room menjadi 'available' jika ruangan ada
        if ($request->room) {
            $room = $request->room;
            $room->status = 'available';
            $room->save();
        }
    
        // Hapus request
        $request->delete();
    
        return redirect()->back()->with('success', 'Permintaan ruangan telah dihapus dan status ruangan dikembalikan.');
    }
}
