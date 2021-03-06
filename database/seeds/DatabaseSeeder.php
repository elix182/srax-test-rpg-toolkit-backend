<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            WeaponSeeder::class,
            HeroClassSeeder::class,
            HeroRaceSeeder::class,
            MonsterAbilitySeeder::class,
            MonsterRaceSeeder::class,
        ]);
    }
}
