<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $owner = User::create(['profile_id'=>'@owner','name' => 'Mohammad Essam','email'=>"owner@example.com",'password' => 'password',
        'avatar'=>"imgs/avatars/owner.png",
        'cover' =>"imgs/covers/cover.jpg"
        ]);

        $owner->tweet("Hello, I'm the owner of this site.\nthis site is still under construction.\nRight now you can post text tweets and like tweets");
        $owner->tweet("long live #HomeMadeTwitter");


        $hamada = User::create(['profile_id'=>'@Person','name' => 'حمادة السيد','email'=>"hamada@example.com",'password' => 'password',
        'avatar'=>"imgs/avatars/1.png",
        'cover' =>"imgs/covers/cover.jpg"
        ]);
        $hamada->tweet("lorem ipsum is the best thing ever #Best_Thing_Ever");

        $salama = User::create(['profile_id'=>'@Salama','name' => 'Salama Hamdy','email'=>"salama@example.com",'password' => 'password',
        'avatar'=>"imgs/avatars/5.png",
        'cover' =>"imgs/covers/cover.jpg"
        ]);
        
        $salama->tweet(" #HomeMadeTwitter منورين يا شباب ");

    }
}
