<?php

namespace Tests\Unit;

use App\Classes\PlayerFormatter;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    /**
     * @var PlayerFormatter $testClass
     */
    private $testClass;

    /**
     * @return void
     */
    protected function setup(): void
    {
        $this->testClass = new PlayerFormatter();
    }

    /**
     * @param array $data
     * @param array $expected
     *
     * @dataProvider providerTestFormatPlayerInsertInfo
     *
     * @return void
     */
    public function testFormatPlayerInsertInfo(array $data, array $expected): void
    {
        $this->assertEquals(
            $this->testClass->formatPlayerInsertInfo($data),
            $expected
        );
    }

    /**
     * @return array
     */
    public function providerTestFormatPlayerInsertInfo(): array
    {
        $data = new \stdClass();

        $data->id = 1;
        $data->first_name = 'John';
        $data->second_name = 'Doe';
        $data->form = 1.2;
        $data->total_points = 10;
        $data->influence = 1.8;
        $data->creativity = 2.2;
        $data->threat = 2.4;
        $data->ict_index = 2.8;

        return [
            [
                [$data],
                [
                    [
                        'id' => 1,
                        'first_name' => 'John',
                        'second_name' => 'Doe',
                        'form' => 1.2,
                        'total_points' => 10,
                        'influence' => 1.8,
                        'creativity' => 2.2,
                        'threat' => 2.4,
                        'ict_index' => 2.8,
                    ]
                ]

            ]
        ];
    }


    /**
     * @param Collection $data
     * @param string $expected
     *
     * @dataProvider providerTestFormatPlayerNames
     *
     * @return void
     */
    public function testFormatPlayerNames(Collection $data, string $expected): void
    {
        $this->assertEquals(
            json_decode($this->testClass->formatPlayerNames($data)),
            json_decode($expected)
        );
    }

    /**
     * @return array
     */
    public function providerTestFormatPlayerNames(): array
    {
        $collection_one = new Collection();
        $collection_two = new Collection();
        $data_one = new \stdClass();
        $data_two = new \stdClass();
        $data_three = new \stdClass();

        $data_one->id = 1;
        $data_one->first_name = 'John';
        $data_one->second_name = 'Doe';
        $collection_one->push($data_one);

        $data_two->id = 2;
        $data_two->first_name = 'Max';
        $data_two->second_name = 'Richards';
        $collection_one->push($data_two);

        $data_three->id = 3;
        $data_three->first_name = 'Benedict';
        $data_three->second_name = 'Diaz';
        $collection_two->push($data_three);

        return [
            [
                $collection_one,
                '[{"id": 1, "full_name": "John Doe"}, {"id": 2, "full_name": "Max Richards"}]'
            ],
            [
                $collection_two,
                '[{"id": 3, "full_name": "Benedict Diaz"}]'
            ]
        ];
    }


    /**
     * @param Player $data
     * @param \stdClass $expected
     *
     * @dataProvider providerTestFormatPlayerInfo
     *
     * @return void
     */
    public function testFormatPlayerInfo(Player $data, \stdClass $expected): void
    {
        $this->assertEquals(
            json_decode($this->testClass->formatPlayerInfo($data)),
            $expected
        );
    }

    /**
     * @return array
     */
    public function providerTestFormatPlayerInfo(): array
    {
        $data = new Player();

        $data->id = 1;
        $data->first_name = 'John';
        $data->second_name = 'Doe';
        $data->form = 1.2;
        $data->total_points = 10;
        $data->influence = 1.8;
        $data->creativity = 2.2;
        $data->threat = 2.4;
        $data->ict_index = 2.8;

        return [
            [
                $data,
                json_decode(
                    '{"id": 1, "first_name": "John", "second_name": "Doe", "form": "1.2", 
                    "total_points": "10", "influence": "1.8", "creativity": "2.2", "threat": "2.4",
                    "ict_index": "2.8" }'
                )
            ]
        ];
    }
}
