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
        $owner->tweet("عارف لما تعمل تويتر في البيت؟\n دي بتكون النتيجه");
    }
}
