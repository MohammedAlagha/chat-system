<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        User::create([
            'name' => 'mohammed',
            'email' => 'alagha2013@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Ahmed',
            'email' => 'ahmed2013@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'sami',
            'email' => 'sami2013@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'khaled',
            'email' => 'khaled2013@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(10)
        ]);


        Conversation::create(['name' => 'family', 'uuid' => Str::uuid(), 'user_id' => 1,]);
        Conversation::create(['name' => 'Work', 'uuid' => Str::uuid(), 'user_id' => rand(1,4),]);
        Conversation::create(['name' => 'Friend', 'uuid' => Str::uuid(), 'user_id' => rand(1,4),]);
        Conversation::create(['name' => 'Guys', 'uuid' => Str::uuid(), 'user_id' => rand(1,4),]);
        Conversation::create(['name' => 'Art', 'uuid' => Str::uuid(), 'user_id' => rand(1,4),]);

        DB::table('conversation_user')->insert(['conversation_id'=>1,'user_id'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>1,'user_id'=>2,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>1,'user_id'=>3,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>1,'user_id'=>4,'created_at'=>now(),'updated_at'=>now()]);

        DB::table('conversation_user')->insert(['conversation_id'=>2,'user_id'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>2,'user_id'=>2,'created_at'=>now(),'updated_at'=>now()]);

        DB::table('conversation_user')->insert(['conversation_id'=>3,'user_id'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>3,'user_id'=>2,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>3,'user_id'=>3,'created_at'=>now(),'updated_at'=>now()]);

        DB::table('conversation_user')->insert(['conversation_id'=>4,'user_id'=>2,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>4,'user_id'=>3,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>4,'user_id'=>4,'created_at'=>now(),'updated_at'=>now()]);

        DB::table('conversation_user')->insert(['conversation_id'=>5,'user_id'=>3,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('conversation_user')->insert(['conversation_id'=>5,'user_id'=>4,'created_at'=>now(),'updated_at'=>now()]);
    }
}
