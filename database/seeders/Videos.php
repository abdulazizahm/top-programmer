<?php

namespace Database\Seeders;

use App\Models\Video;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $youtubes=[
            'https://www.youtube.com/watch?v=Ekm9tkejOi4',
            'https://www.youtube.com/watch?v=Q4hPV2keLb8',
            'https://www.youtube.com/watch?v=oZKia6Kbd5o',
            'https://www.youtube.com/watch?v=nHz_Geg9zxQ',
            'https://www.youtube.com/watch?v=NSN7YjjnSHQ'
        ];
        $images=[
            '1609402261aRGlnmFppQ.jpg',
            '1609399831MFTq1WNReD.jpg',
            '1609400973uH8MZHqmKb.jpg',
            '1610363104ByxFGmWsxj.jpg'
        ];
        $ids=[1,2,3,4,5,6,7,8,9,10];
        for($i=0;$i<10;$i++){
            $array=([
                'name'=>$faker->name,
                'des'=>$faker->name,
                'meta_keywords'=>$faker->name,
                'meta_des'=>$faker->name,
                'youtube'=>$youtubes[rand(0,4)],
                'published'=>rand(0,1),
                'user_id'=>1,
                'cat_id'=>rand(1,10),
                'image'=>$images[rand(0,3)]
            ]);
            $video=Video::create($array);
            $video->tags()->sync(array_rand($ids,3));
            $video->skills()->sync(array_rand($ids,3));
        }
    }
}
