<?php

namespace App\Interfaces;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

interface FormatPlayerInsertInfoInterface
{
    /**
     * @param array $elements
     */
    public function formatPlayerInsertInfo(array $elements);
}