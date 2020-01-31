<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    public function run()
    {
        $faker = Faker::create('en_US');
        
        for($i = 0; $i < 10; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('testtest')
            ]);
        }
    }
}
