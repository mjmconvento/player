<?php

namespace App\Classes;

use App\Interfaces\ParsePlayerInterface;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

class PlayerParser implements ParsePlayerInterface
{
    /**
     * @param string $endpoint
     *
     * @return array
     */
    public function parse(string $endpoint): array
    {
        $response = json_decode(
            file_get_contents($endpoint)
        );

        return $response->elements;
    }
}
