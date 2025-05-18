<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type');
        $status = $request->input('status');
    
        $rooms = Room::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('code', 'like', "%{$search}%")
                      ->orWhere('floor', 'like', "%{$search}%");
                });
            })
            ->when($type, fn($query) => $query->where('type', $type))
            ->when($status, fn($query) => $query->where('status', $status))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();
    
        return view('rooms.index', compact('rooms'));
    }
    

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'capacity' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1|max:5',
            'type' => 'required|in:meeting,class,laboratory,office,auditorium',
            'facilities' => 'nullable|array',
            'facilities.*' => 'string',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:available,occupied,maintenance'
        ]);

        $validated['code'] = strtoupper(Str::random(8));
        $validated['facilities'] = json_encode($validated['facilities'] ?? []);

        $room = Room::create($validated);

        // Generate QR Code
        $qrUrl = route('request-access', ['room_id' => $room->id]);
        $qrCode = QrCode::format('png')->size(300)->generate($qrUrl);
        $path = "public/qrcodes/room-{$room->id}.png";
        Storage::put($path, $qrCode);

        $room->qr_code_path = "storage/qrcodes/room-{$room->id}.png";
        $room->save();

        $request->validate([
            'access_date' => ['required', 'date', 'after_or_equal:now'],
        ]);

        return redirect()->route('rooms.show', $room)->with('success', 'Ruangan berhasil dibuat.');
    }

    public function show(Room $room)
    {
        // Generate QR code with room information URL
        $qrCode = QrCode::size(200)->generate(route('rooms.show', $room));

        
        return view('rooms.show', compact('room', 'qrCode'));
        
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }
    
    // public function update(Request $request, Room $room)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'location' => 'required|string|max:255',
    //         'status' => 'required|in:available,occupied',
    //     ]);
    
    //     $room->update($request->all());
    
    //     return redirect()->route('rooms.index')->with('success', 'Data ruangan berhasil diperbarui.');
    // }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:20|unique:rooms,code,'.$room->id,
            'capacity' => 'required|integer|min:1',
            'floor' => 'required|integer|min:1|max:10',
            'type' => 'required|in:meeting,class,laboratory,office,auditorium',
            'status' => 'required|in:available,occupied,maintenance',
            'facilities' => 'nullable',
            'description' => 'nullable|string|max:500'
        ]);
    
        // Convert facilities string to array
        if ($request->has('facilities')) {
            $validated['facilities'] = array_map('trim', explode(',', $request->facilities[0]));
        }
    
        $room->update($validated);
    
        return redirect()->route('rooms.show', $room)
            ->with('success', 'Ruangan berhasil diperbarui!');
    }

    public function destroy(Room $room)
    {
        if ($room->qr_code_path && Storage::exists(str_replace('storage/', 'public/', $room->qr_code_path))) {
            Storage::delete(str_replace('storage/', 'public/', $room->qr_code_path));
        }

        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil dihapus.');
    }

    public function requestAccess($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('rooms.request-access', compact('room'));
    }
}
