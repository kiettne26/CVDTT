<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\ShowTime;
use App\Models\Movie;
use App\Models\ScreeningRoom;
use Illuminate\Http\Request;

class TicketComponent extends Controller
{
    /**
     * Hiển thị danh sách vé.
     */
    public function index()
    {
        $tickets = Ticket::with(['showTime', 'movie', 'screeningRoom'])->orderBy('created_at', 'asc')->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Hiển thị form thêm vé.
     */
    public function create()
    {
        $showtimes = ShowTime::all();
        $movies = Movie::all();
        $screeningrooms = ScreeningRoom::all();
        return view('tickets.create', compact('showtimes', 'movies', 'screeningrooms'));
    }

    /**
     * Lưu vé mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'showtimeId' => 'required|exists:show_times,showtimeId',
            'movieId' => 'required|exists:movies,movieId',
            'roomId' => 'required|exists:screening_rooms,roomId',
            'seatNumber' => 'required|string|max:10',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:Còn trống,Đã đặt,Đã hủy',
        ]);

        Ticket::create([
            'showtimeId' => $request->showtimeId,
            'movieId' => $request->movieId,
            'roomId' => $request->roomId,
            'seatNumber' => $request->seatNumber,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->route('tickets.index')->with('mess_success', 'Thêm vé thành công!');
    }

    /**
     * Hiển thị chi tiết vé.
     */
    public function show($id)
    {
        $ticket = Ticket::with(['showTime', 'movie', 'screeningRoom'])->findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Hiển thị form sửa vé.
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $showtimes = ShowTime::all();
        $movies = Movie::all();
        $screeningrooms = ScreeningRoom::all();
        return view('tickets.edit', compact('ticket', 'showtimes', 'movies', 'screeningrooms'));
    }

    /**
     * Cập nhật thông tin vé.
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $request->validate([
            'showtimeId' => 'required|exists:show_times,showtimeId',
            'movieId' => 'required|exists:movies,movieId',
            'roomId' => 'required|exists:screening_rooms,roomId',
            'seatNumber' => 'required|string|max:10',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:Còn trống,Đã đặt,Đã hủy',
        ]);

        $ticket->update([
            'showtimeId' => $request->showtimeId,
            'movieId' => $request->movieId,
            'roomId' => $request->roomId,
            'seatNumber' => $request->seatNumber,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->route('tickets.index')->with('mess_success', 'Cập nhật vé thành công!');
    }

    /**
     * Xoá vé.
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('mess_success', 'Xoá vé thành công!');
    }
}
