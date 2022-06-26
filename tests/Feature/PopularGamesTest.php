<?php

    namespace Tests\Feature;

    use App\Http\Livewire\PopularGames;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Support\Facades\Http;
    use Livewire\Livewire;
    use Tests\TestCase;

    class PopularGamesTest extends TestCase
    {

        /**
         * A basic test example.
         *
         * @return void
         */

        /** @test */
        public function the_main_page_show_popular_games()
        {
            Http::fake([
                'https://api.igdb.com/v4/games' => $this->fakePopularGames(),
            ]);

            Livewire::test(PopularGames::class)
                    ->assertSet('popularGames', [])
                    ->call('loadPopularGames')
                    ->assertSee('Tears To Tiara II: Heir Of The Overlord')->assertSee('PS3');
        }

        private function fakePopularGames()
        {
            return Http::response([
                0 => [
                    "id" => 21874,
                    "cover" => [
                        "id" => 113126,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2fae.jpg"
                    ],
                    "first_release_date" => 1383177600,
                    "name" => "Tears To Tiara II: Heir Of The Overlord",
                    "platforms" => [
                        0 => [
                            "id" => 9,
                            "abbreviation" => "PS3",
                        ],
                    ],
                    "rating" => 100.0,
                    "slug" => "tears-to-tiara-ii-heir-of-the-overlord",
                ],
                1 => [
                    "id" => 45131,
                    "cover" => [
                        "id" => 123528,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2nbc.jpg"
                    ],
                    "first_release_date" => 1379376000,
                    "name" => "Grand Theft Auto V: Special Edition",
                    "platforms" => [
                        0 => [
                            "id" => 9,
                            "abbreviation" => "PS3",
                        ],
                        1 => [
                            "id" => 12,
                            "abbreviation" => "X360",
                        ]
                    ],
                    "rating" => 99.860938789371,
                    "slug" => "grand-theft-auto-v-special-edition",
                ],
                2 => [
                    "id" => 20196,
                    "cover" => [
                        "id" => 193803,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co45jf.jpg",
                    ],
                    "first_release_date" => 1373328000,
                    "name" => "Metal Gear Solid: The Legacy Collection",
                    "platforms" => [
                        0 => [
                            "id" => 9,
                            "abbreviation" => "PS3",
                        ]
                    ],
                    "rating" => 99.711911105854,
                    "slug" => "metal-gear-solid-the-legacy-collection",
                ],
                3 => [
                    "id" => 72327,
                    "cover" => [
                        "id" => 130589,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2srh.jpg",
                    ],
                    "first_release_date" => 1303344000,
                    "name" => "Streets of Rage Remake",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC",
                        ]
                    ],
                    "rating" => 99.653129215501,
                    "slug" => "streets-of-rage-remake",
                ],
                4 => [
                    "id" => 11226,
                    "cover" => [
                        "id" => 10508,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/gjc9m7jasmxs6ofv6i3h.jpg",
                    ],
                    "first_release_date" => 959817600,
                    "name" => "Anstoss 3",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC",
                        ]
                    ],
                    "rating" => 99.622285663569,
                    "slug" => "anstoss-3",
                ],
                5 => [
                    "id" => 5951,
                    "cover" => [
                        "id" => 114888,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2gnc.jpg",
                    ],
                    "first_release_date" => 1159142400,
                    "name" => "NBA Live 07",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC",
                        ],
                        1 => [
                            "id" => 8,
                            "abbreviation" => "PS2"
                        ],
                        2 => [
                            "id" => 11,
                            "abbreviation" => "XBOX"
                        ],
                        3 => [
                            "id" => 12,
                            "abbreviation" => "X360"
                        ],
                        4 => [
                            "id" => 38,
                            "abbreviation" => "PSP"
                        ],
                        5 => [
                            "id" => 55,
                            "abbreviation" => "Mobile"
                        ]
                    ],
                    "rating" => 99.602973521413,
                    "slug" => "nba-live-07",
                ],
                6 => [
                    "id" => 25651,
                    "cover" => [
                        "id" => 68955,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1h7f.jpg",
                    ],
                    "first_release_date" => 1497830400,
                    "name" => "Darkest Dungeon: The Crimson Court",
                    "platforms" => [
                        0 => [
                            "id" => 3,
                            "abbreviation" => "Linux",
                        ],
                        1 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        2 => [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ],
                        3 => [
                            "id" => 39,
                            "abbreviation" => "iOS"
                        ],
                        4 => [
                            "id" => 46,
                            "abbreviation" => "Vita"
                        ],
                        5 => [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ]
                    ],
                    "rating" => 99.56796104471,
                    "slug" => "darkest-dungeon-the-crimson-court",
                ],
                7 => [
                    "id" => 14173,
                    "cover" => [
                        "id" => 12745,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/d0ynqp6kf2jfrnp2vl1t.jpg"
                    ],
                    "first_release_date" => 1072828800,
                    "name" => "Heroes of Might and Magic III: Horn of the Abyss",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                    ],
                    "rating" => 99.537209268506,
                    "slug" => "heroes-of-might-and-magic-iii-horn-of-the-abyss",
                ],
                8 => [
                    "id" => 122661,
                    "cover" => [
                        "id" => 81851,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1r5n.jpg"
                    ],
                    "first_release_date" => 1569974400,
                    "name" => "Gwent: Iron Judgment",
                    "platforms" => [
                        0 => [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                    ],
                    "rating" => 99.526142382556,
                    "slug" => "gwent-iron-judgment"
                ],
                9 => [
                    "id" => 51267,
                    "cover" => [
                        "id" => 224206,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co4szy.jpg"
                    ],
                    "first_release_date" => 1252972800,
                    "name" => "Umineko: When They Cry Chiru",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                    ],
                    "rating" => 99.492082656109,
                    "slug" => "umineko-when-they-cry-chiru",
                ],
                10 => [
                    "id" => 21073,
                    "cover" => [
                        "id" => 101884,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co26m4.jpg"
                    ],
                    "first_release_date" => 1329782400,
                    "name" => "Metal Gear Solid: Snake Eater 3D",
                    "platforms" => [
                        0 => [
                            "id" => 37,
                            "abbreviation" => "3DS"
                        ],
                    ],
                    "rating" => 99.462140218664,
                    "slug" => "metal-gear-solid-snake-eater-3d"
                ],
                11 => [
                    "id" => 113119,
                    "cover" => [
                        "id" => 219277,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co4p71.jpg"
                    ],
                    "first_release_date" => 1651017600,
                    "name" => "The Stanley Parable: Ultra Deluxe",
                    "platforms" => [
                        0 => [
                            "id" => 3,
                            "abbreviation" => "Linux"
                        ],
                        1 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        2 => [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ],
                        3 => [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        4 => [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                        5 => [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ],
                        6 => [
                            "id" => 167,
                            "abbreviation" => "PS5"
                        ],
                        7 => [
                            "id" => 169,
                            "abbreviation" => "Series X"
                        ],
                    ],
                    "rating" => 99.397682400501,
                    "slug" => "the-stanley-parable-ultra-deluxe",
                ],
            ]);
        }

    }
