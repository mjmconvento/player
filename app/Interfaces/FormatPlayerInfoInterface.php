<?php

namespace App\Interfaces;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

interface FormatPlayerInfoInterface
{
    /**
     * @param Player $player
     *
     * @return \stdClass
     */
    public function formatPlayerInfo(Player $player);
}