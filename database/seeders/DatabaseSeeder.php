<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Group,
    Level,
    Location,
    Image,
    Category,
    Tag,
    Post,
    Comment,
    Video,
    Profile
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Group::factory()->count(3)->create();

        Level::factory()->create(['name' => 'Oro']);
        Level::factory()->create(['name' => 'plata']);
        Level::factory()->create(['name' => 'Bronce']);

        User::factory()->count(5)->create()->each(function ($user) {

            $profile = $user->profile()->save(Profile::factory()->make());

            $profile->location()->save(Location::factory()->make());

            $user->groups()->attach($this->array(rand(1, 3)));

            $user->image()->save(Image::factory()->make([
                'url' => 'http://lorempixel.com.br/90/90'
            ]));
        });

        Category::factory()->count(5)->create();
        Tag::factory()->count(12)->create();

        Post::factory()->count(40)->create()->each(function ($post) {

            $post->image()->save(Image::factory()->make());
            $post->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i = 0; $i < $number_comments; $i++) {

                $post->comments()->save(Comment::factory()->make());
            }
        });





        Video::factory()->count(40)->create()->each(function ($video) {

            $video->image()->save(Image::factory()->make());
            $video->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i = 0; $i < $number_comments; $i++) {

                $video->comments()->save(Comment::factory()->make());
            }
        });
    }


    public function array($max)
    {

        $values = [];

        for ($i = 1; $i < $max; $i++) {
            $values[] = $i;
        }

        return $values;
    }
}
