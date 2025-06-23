<?php
namespace App\Service\Component;

use App\Models\Movie;
use App\Service\Mediator\CinemaMediator;

class MovieComponent
{
    protected $mediator;

    public function setMediator(CinemaMediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function listAllMovies()
    {
        $movies = Movie::all();
        if ($this->mediator) {
            $this->mediator->notify($this, 'list_all_movies', $movies);
        }
        return $movies;
    }

    public function addMovie($data)
    {
        $movie = Movie::create($data);
        if ($this->mediator) {
            $this->mediator->notify($this, 'movie_added', $movie);
        }
        return $movie;
    }

    public function viewMovieDetails($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        if ($this->mediator) {
            $this->mediator->notify($this, 'movie_viewed', $movie);
        }
        return $movie;
    }

    public function updateMovie($movieId, $data)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->update($data);
        if ($this->mediator) {
            $this->mediator->notify($this, 'movie_updated', $movie);
        }
        return $movie;
    }

    public function deleteMovie($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $deleted = $movie->delete();
        if ($this->mediator) {
            $this->mediator->notify($this, 'movie_deleted', $movieId);
        }
        return $deleted;
    }
}
