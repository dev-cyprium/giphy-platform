<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();
        foreach($this->tableData() as $giphy_id) {
            DB::table('posts')->insert([
                "giphy_id" => $giphy_id,
                "user_id" => $user->id,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
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
