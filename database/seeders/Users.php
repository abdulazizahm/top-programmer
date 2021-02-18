<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'khaled ahmed',
            'password'=>bcrypt('khaledahmed'),
            'email'=>'khaledahmed106622@gmail.com',
            'group'=>'admin'
        ]);
    }
}
