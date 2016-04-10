<?php

use Illuminate\Database\Seeder;

class EconomicSectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cmmd = "mysql -u ".env('DB_USERNAME')." -p".env('DB_PASSWORD')." ".env('DB_DATABASE')." < ".__DIR__."/sql/EconomicSector.sql 2>&1 | grep -v 'Warning: Using a password'";

        exec($cmmd, $out, $err);
    }
}
