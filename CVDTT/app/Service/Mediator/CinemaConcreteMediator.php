<?php

namespace App\Service\Mediator;

use App\Service\Component\MovieComponent;
use Illuminate\Support\Facades\Log;

class CinemaConcreteMediator implements CinemaMediator
{
    protected $movieComponent;

    public function setMovieComponent(MovieComponent $movieComponent)
    {
        $this->movieComponent = $movieComponent;
    }

    //
    public function listAllMovies()
    {
        return $this->movieComponent->listAllMovies();
    }

    public function addMovie($movieData)
    {
        $result = $this->movieComponent->addMovie($movieData);
        $this->notify($this, 'movie_added', $movieData);
        return $result;
    }

    public function viewMovieDetails($movieId)
    {
        return $this->movieComponent->viewMovieDetails($movieId);
    }

    public function updateMovie($movieId, $data)
    {
        $result = $this->movieComponent->updateMovie($movieId, $data);
        $this->notify($this, 'movie_updated', ['id' => $movieId, 'data' => $data]);
        return $result;
    }

    public function deleteMovie($movieId)
    {
        $result = $this->movieComponent->deleteMovie($movieId);
        $this->notify($this, 'movie_deleted', ['id' => $movieId]);
        return $result;
    }

    public function notify($sender, string $event, $data = null)
    {
        Log::info("[CinemaMediator] Event: {$event}", [
            'sender' => is_object($sender) ? get_class($sender) : $sender,
            'data' => $data
        ]);
    }
}
