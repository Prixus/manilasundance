<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('months')->insert([
            'PK_MonthID' => 1,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 2,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 3,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 4,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 5,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 6,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 7,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 8,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 9,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 10,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 11,
        	]);
             DB::table('months')->insert([
            'PK_MonthID' => 12,
        	]);

    }
}
