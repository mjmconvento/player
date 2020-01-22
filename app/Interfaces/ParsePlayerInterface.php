<?php

namespace App\Interfaces;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

interface ParsePlayerInterface
{
    /**
     * @param string $data
     */
    public function parse(string $data);
}