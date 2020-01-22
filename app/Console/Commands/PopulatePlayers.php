<?php

namespace App\Console\Commands;

use App\Classes\PlayerFormatter;
use App\Models\Player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PopulatePlayers extends Command
{
    /**
     * @var string
     */
    private const API_URL = 'https://fantasy.premierleague.com/api/bootstrap-static/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populatePlayers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates players table';

    /**
     * @var PlayerFormatter $formatter
     */
    private $formatter;

    /**
     * @return void
     */
    public function __construct(PlayerFormatter $formatter)
    {
        parent::__construct();
        $this->formatter = $formatter;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Player::truncate();

        $response = json_decode(
            file_get_contents(self::API_URL)
        );

        $players = $this->formatter->formatPlayerInsertInfo($response->elements);
        Player::insert($players);
    }
}
