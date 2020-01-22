<?php

namespace App\Classes;

use App\Interfaces\FormatPlayerInfoInterface;
use App\Interfaces\FormatPlayerNamesInterface;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

class PlayerFormatter implements FormatPlayerInfoInterface, FormatPlayerNamesInterface
{
    /**
     * @var string
     */
    private const RECORD_LIMIT = 100;

    /**
     * @param Player[] $players
     *
     * @return string
     */
    public function formatPlayerNames(Collection $players): string
    {
        $collections = [];

        foreach ($players as $player) {
            $element = new \stdClass();

            $element->id = $player->id;
            $element->full_name = sprintf('%s %s', $player->first_name, $player->second_name);
            $collections[] = $element;
        }

        return json_encode($collections);
    }

    /**
     * @param Player $player
     *
     * @return string
     */
    public function formatPlayerInfo(Player $player): string
    {
        $element = new \stdClass();

        $element->id = $player->id;
        $element->first_name = $player->first_name;
        $element->second_name = $player->second_name;
        $element->form = $player->form;
        $element->total_points = $player->total_points;
        $element->influence = $player->influence;
        $element->creativity = $player->creativity;
        $element->threat = $player->threat;
        $element->ict_index = $player->ict_index;

        return json_encode($element);
    }

    /**
     * @param array $elements
     *
     * @return array
     */
    public function formatPlayerInsertInfo(array $elements): array
    {
        $collection = [];

        foreach ($elements as $key => $element) {
            $player = [];

            $player['id'] = $element->id;
            $player['first_name'] = $element->first_name ?? null;
            $player['second_name'] = $element->second_name ?? null;
            $player['form'] = $element->form ?? null;
            $player['total_points'] = $element->total_points ?? null;
            $player['influence'] = $element->influence ?? null;
            $player['creativity'] = $element->creativity ?? null;
            $player['threat'] = $element->threat ?? null;
            $player['ict_index'] = $element->ict_index ?? null;

            $collection[] = $player;

            if ($key === self::RECORD_LIMIT) {
                break;
            }
        }

        return $collection;
    }
}
