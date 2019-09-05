<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**Users */
        DB::table('users')->insert([
            'username' => 'superadmin',
            'fullname' => 'Super Admin',
            'phone'     => Str::random(11),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            'schools_id' => 1,
            'roles_id'  => 1,
        ]);
    }
}
