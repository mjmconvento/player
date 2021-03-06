<?php

namespace App\Interfaces;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

interface FormatPlayerInfoInterface
{
    /**
     * @param Player $player
     */
    public function formatPlayerInfo(Player $player);
}