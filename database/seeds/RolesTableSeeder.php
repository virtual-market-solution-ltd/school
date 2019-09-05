<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                /**
         * User Roles
         * 
         */
        DB::table('roles')->insert([
            'name' => 'superadmin',
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'teacher',
        ]);
        DB::table('roles')->insert([
            'name' => 'student',
        ]);
    }
}
