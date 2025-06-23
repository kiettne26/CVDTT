<?php

namespace App\Service\Mediator;

interface CinemaMediator
{
    public function notify($sender, string $event, $data = null);
    
}
