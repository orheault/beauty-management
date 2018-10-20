<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'firstName' => 'Sarah',
            'lastName' => 'Lavigne',
            'phoneNumber' => '1112223333',
        ]);
        DB::table('clients')->insert([
            'firstName' => 'Lea',
            'lastName' => 'Desmarais',
            'phoneNumber' => '4445556666',
        ]);
        DB::table('clients')->insert([
            'firstName' => 'Alice',
            'lastName' => 'Merchant',
            'phoneNumber' => '7778889999',
            'idReferringClient' => 1,
            'glueAllergy' => true
        ]);
    }
}
