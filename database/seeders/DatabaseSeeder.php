<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Discussion;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $topics = Topic::factory(3)
            ->sequence(
                ['name' => 'Laravel'],
                ['name' => 'Inertia'],
                ['name' => 'Vue'],
            )
            ->create();

        $users = User::factory(7)
            ->sequence(
                ['name' => 'Megal'],
                ['name' => 'Alex'],
                ['name' => 'Mabel'],
                ['name' => 'Jack'],
                ['name' => 'Joe'],
                ['name' => 'Monica'],
                ['name' => 'Rachel'],
            )
            ->create();

        $discussions = Discussion::factory(10)
            ->create();

        $discussions->each(function (Discussion $discussion) {
            $posts = Post::factory(rand(2, 20))
                ->create([
                    'discussion_id' => $discussion
                ]);

            $firstPost = $posts->first();


            $discussion->posts()->where('id', '!=', $firstPost->id)
                ->update([
                    'parent_id' => $firstPost->id
                ]);

        });
    }
}
