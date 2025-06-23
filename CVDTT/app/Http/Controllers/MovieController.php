<?php

namespace App\Http\Controllers;

use App\Service\Component\MovieComponent;
use App\Service\Mediator\CinemaConcreteMediator;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $mediator;

    public function __construct()
    {
        // Tạo mediator và component, kết nối hai chiều
        $mediator = new CinemaConcreteMediator();
        $movieComponent = new MovieComponent();
        $movieComponent->setMediator($mediator);
        $mediator->setMovieComponent($movieComponent);
        $this->mediator = $mediator;
    }

    public function index()
    {
        $movies = $this->mediator->listAllMovies();
        return view('movies.index', ['movies' => $movies]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
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

        $posterPath = null;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $originalName = $file->getClientOriginalName(); 
            $file->move(public_path('uploads/movies'), $originalName);
            $posterPath = 'uploads/movies/' . $originalName;
        }

        $movieData = array_merge($validated, ['poster' => $posterPath]);
        $this->mediator->addMovie($movieData);

        return redirect()->route('movies.index')->with('mess_success', 'Thêm phim thành công!');
    }

    public function show($movieId)
    {
        $movie = $this->mediator->viewMovieDetails($movieId);
        return view('movies.show', compact('movie'));
    }

    public function edit($movieId)
    {
        $movie = $this->mediator->viewMovieDetails($movieId);
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $movieId)
    {
        $movieOld = $this->mediator->viewMovieDetails($movieId);

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

        $posterPath = $movieOld ? $movieOld->poster : null;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $originalName = $file->getClientOriginalName();
            $file->move(public_path('uploads/movies'), $originalName);
            $posterPath = 'uploads/movies/' . $originalName;
        }

        $updatedData = array_merge($validated, ['poster' => $posterPath]);
        $this->mediator->updateMovie($movieId, $updatedData);

        return redirect()->route('movies.index')->with('mess_success', 'Cập nhật phim thành công!');
    }

    public function destroy($movieId)
    {
        $this->mediator->deleteMovie($movieId);
        return redirect()->route('movies.index')->with('mess_success', 'Xoá phim thành công!');
    }
}
