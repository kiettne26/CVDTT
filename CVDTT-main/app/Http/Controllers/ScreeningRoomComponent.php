<?php

namespace App\Http\Controllers;

use App\Models\ScreeningRoom;
use Illuminate\Http\Request;

class ScreeningRoomComponent extends Controller
{
    /**
     * Hiển thị danh sách phòng chiếu.
     */
    public function index()
    {
        $screeningrooms = ScreeningRoom::orderBy('created_at', 'asc')->get();
        return view('screeningrooms.index', compact('screeningrooms'));
    }

    /**
     * Hiển thị form thêm phòng chiếu.
     */
    public function create()
    {
        return view('screeningrooms.create');
    }

    /**
     * Lưu phòng chiếu mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'roomName' => 'required|string|max:255',
            'capacity' => 'required|numeric|min:1',
            'roomType' => 'required|string|max:100',
            'isAvailable' => 'required|string|max:20',
        ]);

        ScreeningRoom::create([
            'roomName' => $request->roomName,
            'capacity' => $request->capacity,
            'roomType' => $request->roomType,
            'isAvailable' => $request->isAvailable,
        ]);

        return redirect()->route('screeningrooms.index')->with('mess_success', 'Thêm phòng chiếu thành công!');
    }

    /**
     * Hiển thị chi tiết phòng chiếu.
     */
    public function show($id)
    {
        $screeningroom = ScreeningRoom::findOrFail($id);
        return view('screeningrooms.show', compact('screeningroom'));
    }

    /**
     * Hiển thị form sửa phòng chiếu.
     */
    public function edit($id)
    {
        $screeningroom = ScreeningRoom::findOrFail($id);
        return view('screeningrooms.edit', compact('screeningroom'));
    }

    /**
     * Cập nhật thông tin phòng chiếu.
     */
    public function update(Request $request, $id)
    {
        $screeningroom = ScreeningRoom::findOrFail($id);

        $request->validate([
            'roomName' => 'required|string|max:255',
            'capacity' => 'required|numeric|min:1',
            'roomType' => 'required|string|max:100',
            'isAvailable' => 'required|string|max:20',
        ]);

        $screeningroom->update([
            'roomName' => $request->roomName,
            'capacity' => $request->capacity,
            'roomType' => $request->roomType,
            'isAvailable' => $request->isAvailable,
        ]);

        return redirect()->route('screeningrooms.index')->with('mess_success', 'Cập nhật phòng chiếu thành công!');
    }

    /**
     * Xoá phòng chiếu.
     */
    public function destroy($id)
    {
        $screeningroom = ScreeningRoom::findOrFail($id);
        $screeningroom->delete();
        return redirect()->route('screeningrooms.index')->with('mess_success', 'Xoá phòng chiếu thành công!');
    }
}
