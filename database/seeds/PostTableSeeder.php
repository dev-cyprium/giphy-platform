<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $faker = Faker\Factory::create();
        foreach($this->tableData() as $giphy_id) {
            DB::table('posts')->insert([
                "giphy_id" => $giphy_id,
                "user_id" => factory(User::class)->create()->id,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        }

        foreach(Post::all() as $post) {
            $numberOfComments = rand(0, 5);
            for($i=0; $i < $numberOfComments; $i++) {
                $user = User::all()->random();
                $post->addComment($user, $faker->realText(50));
            }
        }
    }

    private function tableData()
    {
        return [
            "pUKIkouWehLb2",	
            "fcbkCxKMMNrcQ",	
            "sm5d4mthxJAvC",	
            "EvYHHSntaIl5m",	
            "Sid4QgwDxJ8l2",	
            "wc8zKHxhdnI6A",	
            "l0K4jwyp6FZa9phyU",	
            "l41lX7RphWz533qGQ",	
            "xT1XH3ovW4dO1IhHKo",	
            "3o85xpLwVOXSVSSKQw",	
            "AuIvUrZpzBl04",	
        ];
    }
}
