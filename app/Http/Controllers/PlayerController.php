<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\PlayerRepository;

class PlayerController extends Controller
{
    /**
     * @var PlayerRepository $playerRepository
     */
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * @return string
     */
    public function getPlayerNames(): string
    {
        return $this->playerRepository->getPlayerNames();
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function getPlayerInfo(int $id): string
    {
        return $this->playerRepository->getPlayerInfo($id);
    }
}