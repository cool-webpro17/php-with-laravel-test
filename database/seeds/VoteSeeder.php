<?php

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				DB::table('votes')->insert([
	          'id' 				=> 1,
	          'city' 			=> 'Anchorage',
	          'color_id' 	=> 5,
	          'count'			=> 10000
	      ]);
	      DB::table('votes')->insert([
	          'id' 				=> 2,
	          'city' 			=> 'Anchorage',
	          'color_id' 	=> 3,
	          'count'			=> 15000
	      ]);
	      DB::table('votes')->insert([
	          'id' 				=> 3,
	          'city' 			=> 'Brooklyn',
	          'color_id' 	=> 1,
	          'count'			=> 100000
	      ]);
	      DB::table('votes')->insert([
	          'id' 				=> 4,
	          'city' 			=> 'Brooklyn',
	          'color_id' 	=> 5,
	          'count'			=> 250000
	      ]);
	      DB::table('votes')->insert([
	          'id' 				=> 5,
	          'city' 			=> 'Detroit',
	          'color_id' 	=> 1,
	          'count'			=> 160000
	      ]);
	      DB::table('votes')->insert([
	          'id' 				=> 6,
	          'city' 			=> 'Selma',
	          'color_id' 	=> 3,
	          'count'			=> 15000
	      ]);
	      DB::table('votes')->insert([
	          'id' 				=> 7,
	          'city' 			=> 'Selma',
	          'color_id' 	=> 7,
	          'count'			=> 5000
	      ]);
    }
}
