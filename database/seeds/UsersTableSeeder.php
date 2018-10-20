<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Olivier',
            'email' => 'oxman@gmail.com',
            'password' => bcrypt('9604'),
        ]);

        DB::table('users')->insert([
            'name' => 'Debby Tremblay',
            'email' => 'debby.tremblay@hotmail.com',
            'password' => bcrypt('33693369'),
        ]);
    }
}
