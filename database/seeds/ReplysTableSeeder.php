<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Topic;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        // 所有用户🆔数组，如：[1,2,3,4]
        $user_ids = User::all()->pluck('id')->toArray();

        // 所有话题🆔数组
        $topic_ids = Topic::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $replys = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use($user_ids, $topic_ids, $faker) {
            $reply->user_id = $faker->randomElement($user_ids);
            $reply->topic_id = $faker->randomElement($topic_ids);
        });

        Reply::insert($replys->toArray());
    }

}

