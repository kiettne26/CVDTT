<?php

namespace App\Http\Controllers;

use App\Models\ShowTime;
use App\Models\Movie;
use App\Models\ScreeningRoom;
use Illuminate\Http\Request;

class ShowTimeComponent extends Controller
{
    /**
     * Hiển thị danh sách suất chiếu.
     */
    public function index()
    {
        $showtimes = ShowTime::with(['movie', 'screeningRoom'])->orderBy('created_at', 'asc')->get();
        return view('showtimes.index', compact('showtimes'));
    }

    /**
     * Hiển thị form thêm suất chiếu.
     */
    public function create()
    {
        $movies = Movie::all();
        $screeningrooms = ScreeningRoom::all();
        return view('showtimes.create', compact('movies', 'screeningrooms'));
    }

    /**
     * Lưu suất chiếu mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'movieId' => 'required|exists:movies,movieId',
            'date' => 'required|date',
            'startTime' => 'required|string|max:20',
            'roomId' => 'required|exists:screening_rooms,roomId',
        ]);

        ShowTime::create([
            'movieId' => $request->movieId,
            'date' => $request->date,
            'startTime' => $request->startTime,
            'roomId' => $request->roomId,
        ]);

        return redirect()->route('showtimes.index')->with('mess_success', 'Thêm suất chiếu thành công!');
    }

    /**
     * Hiển thị chi tiết suất chiếu.
     */
    public function show($id)
    {
        $showtime = ShowTime::with(['movie', 'screeningRoom'])->findOrFail($id);
        return view('showtimes.show', compact('showtime'));
    }

    /**
     * Hiển thị form sửa suất chiếu.
     */
    public function edit($id)
    {
        $showtime = ShowTime::findOrFail($id);
        $movies = Movie::all();
        $screeningrooms = ScreeningRoom::all();
        return view('showtimes.edit', compact('showtime', 'movies', 'screeningrooms'));
    }

    /**
     * Cập nhật thông tin suất chiếu.
     */
    public function update(Request $request, $id)
    {
        $showtime = ShowTime::findOrFail($id);

        $request->validate([
            'movieId' => 'required|exists:movies,movieId',
            'date' => 'required|date',
            'startTime' => 'required|string|max:20',
            'roomId' => 'required|exists:screening_rooms,roomId',
        ]);

        $showtime->update([
            'movieId' => $request->movieId,
            'date' => $request->date,
            'startTime' => $request->startTime,
            'roomId' => $request->roomId,
        ]);

        return redirect()->route('showtimes.index')->with('mess_success', 'Cập nhật suất chiếu thành công!');
    }

    /**
     * Xoá suất chiếu.
     */
    public function destroy($id)
    {
        $showtime = ShowTime::findOrFail($id);
        $showtime->delete();
        return redirect()->route('showtimes.index')->with('mess_success', 'Xoá suất chiếu thành công!');
    }
}
