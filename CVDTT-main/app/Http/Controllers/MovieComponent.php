<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieComponent extends Controller
{
    /**
     * Hiển thị danh sách phim.
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'asc')->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Hiển thị form thêm phim.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Lưu phim mới vào database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'genre'       => 'required|string|max:255',
            'duration'    => 'required|string|max:50',
            'releaseDate' => 'required|string', // do migration để string!
            'description' => 'nullable|string',
            'status'      => 'required|string|max:50',
            'poster'      => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $posterPath = null;
        $posterOriginalName = null;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $posterOriginalName = $file->getClientOriginalName();
            $file->move(public_path('uploads/movies'), $posterOriginalName);
            $posterPath = 'uploads/movies/' . $posterOriginalName;
        }

        Movie::create([
            'title'                => $validated['title'],
            'director'             => $validated['director'],
            'genre'                => $validated['genre'],
            'duration'             => $validated['duration'],
            'releaseDate'          => $validated['releaseDate'],
            'description'          => $validated['description'] ?? '',
            'status'               => $validated['status'],
            'poster'               => $posterPath,
            'poster_original_name' => $posterOriginalName,
        ]);

        return redirect()->route('movies.index')->with('mess_success', 'Thêm phim thành công!');
    }

    /**
     * Hiển thị chi tiết phim.
     */
    public function show($movieId)
    {
        $movie = Movie::where('movieId', $movieId)->firstOrFail();
        return view('movies.show', compact('movie'));
    }

    /**
     * Hiển thị form sửa phim.
     */
    public function edit($movieId)
    {
        $movie = Movie::where('movieId', $movieId)->firstOrFail();
        return view('movies.edit', compact('movie'));
    }

    /**
     * Cập nhật thông tin phim.
     */
    public function update(Request $request, $movieId)
    {
        $movie = Movie::where('movieId', $movieId)->firstOrFail();

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'genre'       => 'required|string|max:255',
            'duration'    => 'required|string|max:50',
            'releaseDate' => 'required|string',
            'description' => 'nullable|string',
            'status'      => 'required|string|max:50',
            'poster'      => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $posterPath = $movie->poster;
        $posterOriginalName = $movie->poster_original_name;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $posterOriginalName = $file->getClientOriginalName();
            $file->move(public_path('uploads/movies'), $posterOriginalName);
            $posterPath = 'uploads/movies/' . $posterOriginalName;
        }

        $movie->update([
            'title'                => $validated['title'],
            'director'             => $validated['director'],
            'genre'                => $validated['genre'],
            'duration'             => $validated['duration'],
            'releaseDate'          => $validated['releaseDate'],
            'description'          => $validated['description'] ?? '',
            'status'               => $validated['status'],
            'poster'               => $posterPath,
            'poster_original_name' => $posterOriginalName,
        ]);

        return redirect()->route('movies.index')->with('mess_success', 'Cập nhật phim thành công!');
    }

    /**
     * Xoá phim (soft delete).
     */
    public function destroy($movieId)
    {
        $movie = Movie::where('movieId', $movieId)->firstOrFail();
        $movie->delete();
        return redirect()->route('movies.index')->with('mess_success', 'Xoá phim thành công!');
    }
}
