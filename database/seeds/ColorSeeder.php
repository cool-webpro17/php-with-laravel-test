<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	      DB::table('colors')->insert([
	          'id' 		=> 1,
	          'name' 	=> 'Red'
	      ]);
	      DB::table('colors')->insert([
	          'id' 		=> 2,
	          'name' 	=> 'Orange'
	      ]);
	      DB::table('colors')->insert([
	          'id' 		=> 3,
	          'name' 	=> 'Yellow'
	      ]);
	      DB::table('colors')->insert([
	          'id' 		=> 4,
	          'name' 	=> 'Green'
	      ]);
	      DB::table('colors')->insert([
	          'id' 		=> 5,
	          'name' 	=> 'Blue'
	      ]);
	      DB::table('colors')->insert([
	          'id' 		=> 6,
	          'name'	=> 'Indigo'
	      ]);
	      DB::table('colors')->insert([
	          'id' 		=> 7,
	          'name' 	=> 'Violet'
	      ]);
    }
}
