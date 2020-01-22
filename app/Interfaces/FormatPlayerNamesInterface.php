<?php

namespace App\Interfaces;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

interface FormatPlayerNamesInterface
{
    /**
     * @param Player[] $players
     *
     * @return array
     */
    public function formatPlayerNames(Collection $players);
}