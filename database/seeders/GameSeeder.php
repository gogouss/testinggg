<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'title' => 'Counter-Strike 2',
                'short_description' => 'For over two decades, Counter-Strike has offered an elite competitive experience.',
                'price' => 0,
                'is_free' => true,
                'is_featured' => true,
                'genres' => 'Action, FPS',
                'developer' => 'Valve',
                'publisher' => 'Valve',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/730/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/730/capsule_616x353.jpg',
            ],
            [
                'title' => 'Dota 2',
                'short_description' => 'Every day, millions of players worldwide enter battle as one of over a hundred Dota heroes.',
                'price' => 0,
                'is_free' => true,
                'genres' => 'Action, Strategy, MOBA',
                'developer' => 'Valve',
                'publisher' => 'Valve',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/570/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/570/capsule_616x353.jpg',
            ],
            [
                'title' => 'Hades II',
                'short_description' => 'Battle beyond the Underworld using dark sorcery to take on the Titan of Time.',
                'price' => 29.99,
                'is_featured' => true,
                'genres' => 'Action, Roguelike',
                'developer' => 'Supergiant Games',
                'publisher' => 'Supergiant Games',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1145350/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1145350/capsule_616x353.jpg',
            ],
            [
                'title' => 'Balatro',
                'short_description' => 'The poker roguelike. All the fun of poker but with Jokers and crazy combos.',
                'price' => 14.99,
                'discount_price' => 9.74,
                'discount_percent' => 35,
                'genres' => 'Casual, Indie, Strategy',
                'developer' => 'LocalThunk',
                'publisher' => 'Playstack',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/2379780/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/2379780/capsule_616x353.jpg',
            ],
            [
                'title' => 'ELDEN RING',
                'short_description' => 'THE CRITICAL ACCLAIMED FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring.',
                'price' => 59.99,
                'discount_price' => 35.99,
                'discount_percent' => 40,
                'is_featured' => true,
                'genres' => 'Action, RPG',
                'developer' => 'FromSoftware Inc.',
                'publisher' => 'FromSoftware Inc., Bandai Namco Entertainment',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1245620/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1245620/capsule_616x353.jpg',
            ],
            [
                'title' => 'Palworld',
                'short_description' => 'Fight, farm, build and work alongside mysterious creatures called "Pals" in this completely new multiplayer, open world survival and crafting game!',
                'price' => 29.99,
                'discount_price' => 23.99,
                'discount_percent' => 20,
                'genres' => 'Action, Adventure, Indie',
                'developer' => 'Pocketpair, Inc.',
                'publisher' => 'Pocketpair, Inc.',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1623730/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1623730/capsule_616x353.jpg',
            ],
            [
                'title' => 'Helldivers 2',
                'short_description' => 'The Galaxy’s Last Line of Offence. Enlist in the Helldivers and join the fight for freedom across a hostile galaxy in a fast, frantic, and ferocious third-person shooter.',
                'price' => 39.99,
                'discount_price' => 31.99,
                'discount_percent' => 20,
                'is_featured' => true,
                'genres' => 'Action, Third-Person Shooter',
                'developer' => 'Arrowhead Game Studios',
                'publisher' => 'PlayStation Publishing LLC',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/553850/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/553850/capsule_616x353.jpg',
            ],
            [
                'title' => 'Vampire Survivors',
                'short_description' => 'Murderous legions of the undead are invading! Survivors of the immortal night are rallied and ready to defend the world! Create your own overpowered build in a matter of seconds.',
                'price' => 4.99,
                'is_free' => true,
                'genres' => 'Action, Casual, Indie',
                'developer' => 'poncle',
                'publisher' => 'poncle',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1794680/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1794680/capsule_616x353.jpg',
            ],
            [
                'title' => 'Cyberpunk 2077',
                'short_description' => 'Cyberpunk 2077 is an open-world, action-adventure RPG set in Night City, a megalopolis obsessed with power, glamour and body modification.',
                'price' => 59.99,
                'discount_price' => 29.99,
                'discount_percent' => 50,
                'genres' => 'Action, RPG',
                'developer' => 'CD PROJEKT RED',
                'publisher' => 'CD PROJEKT RED',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1091500/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1091500/capsule_616x353.jpg',
            ],
            [
                'title' => 'Stardew Valley',
                'short_description' => 'You’ve inherited your grandfather’s old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life.',
                'price' => 14.99,
                'genres' => 'Indie, RPG, Simulation',
                'developer' => 'ConcernedApe',
                'publisher' => 'ConcernedApe',
                'header_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/413150/header.jpg',
                'capsule_image' => 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/413150/capsule_616x353.jpg',
            ],
        ];

        foreach ($games as $game) {
            Game::updateOrCreate(
                ['slug' => Str::slug($game['title'])],
                array_merge($game, ['slug' => Str::slug($game['title'])])
            );
        }
    }
}
