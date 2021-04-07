<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement ('TRUNCATE TABLE profiles');
        foreach($this->profiles as $value){
            \DB::insert("INSERT INTO profiles (user_id, first_name, last_name, phone, location, bio) VALUES (?, ?, ?, ?, ?, ?)",
             [$value['user_id'], $value['first_name'], $value['last_name'], $value['phone'], $value['location'], $value['bio']]);
        }   
        
    }
}

