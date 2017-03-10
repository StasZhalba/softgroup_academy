<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::insert('INSERT INTO `countries` (`name`) VALUES (?)', [
            'Ukraine'
        ]);

        //2
        DB::table('countries')->insert([
            [
                'name' => 'Ukraine'
            ]
        ]);

        //3
        /*Country::create([
            'name' => 'Ukraine'
        ]);*/
    }
}
