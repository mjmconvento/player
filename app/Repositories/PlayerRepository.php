<?php

namespace App\Repositories;

use App\Interfaces\FormatPlayerNamesInterface;
use App\Models\Player;

class PlayerRepository
{
    /**
     * @var PlayerFormatter $formatter
     */
    private $formatter;

    public function __construct(FormatPlayerNamesInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @return string
     */
    public function getPlayerNames(): string
    {
        return $this->formatter->formatPlayerNames(
            Player::all()
        );
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function getPlayerInfo(int $id): string
    {
        return $this->formatter->formatPlayerInfo(
            Player::find($id)
        );
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function getPlayerInsertInfo(int $id): string
    {
        return $this->formatter->formatPlayerInfo(
            Player::find($id)
        );
    }
}