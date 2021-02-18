<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<10;$i++){
            $array=[
                'user_id'=>1,
                'video_id'=>rand(1,10),
                'comment'=>$faker->name
            ];
            Comment::create($array);
        }
    }
}
