<?php

namespace Database\Seeders;

use App\Models\Add;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::factory()->count(20)->create();

        $adds = Add::factory()->count(20)->make(['user_id'=> null]);

        $adds->each(function (Add $adds) use ($users){
            $adds->user()->associate($users->random());
            $adds->save();
        });

    }
}
