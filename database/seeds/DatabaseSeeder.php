<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UserTableSeeder::class);
        $this->call(EconomicSectorTableSeeder::class);
        $this->call(EconomicActivitiesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(ComunasTableSeeder::class);
        $this->call(UfsTableSeeder::class);
    }
}
