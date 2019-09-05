<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                /**
         * Schools
         */
        /*
        DB::table('schools')->insert([
            'school_id' => 'VMSL',
            'school_name' => 'Virtual Market Solution',
            'School_description' => Str::random(100),
        ]);
        */

        DB::table('schools')->insert([
            'school_id' => 'MDC2019',
            'school_name' => 'MDC Model Institute',
            'School_description' => Str::random(100),
        ]);


    }
}
