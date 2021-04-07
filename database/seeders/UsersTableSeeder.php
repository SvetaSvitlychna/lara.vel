<?php

namespace Database\Seeders;

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
        \DB::statement ('TRUNCATE TABLE users');
        foreach($this->users as $value){
            \DB::insert("INSERT INTO users (name, email, password) VALUES (?, ?, ?)",
             [$value['name'],$value['email'], $value['password']]);
        }
        
    }
}
