<?php

namespace App\Console\Commands;

use App\Classes\PlayerFormatter;
use App\Classes\PlayerParser;
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
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(PlayerFormatter $formatter, PlayerParser $parser)
    {
        Player::truncate();
        
        Player::insert(
            $formatter->formatPlayerInsertInfo(
                $parser->parse(self::API_URL)
            )
        );
    }
}
