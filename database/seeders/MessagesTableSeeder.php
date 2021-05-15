<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Message;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            $conversation = Conversation::with('users')->find($i);
            for ($k = 1; $k <= 5; $k++) {
                Message::create([
                    'conversation_id' => $conversation->id,
                    'user_id' => $conversation->users->random()->id,
                    'body' => $fake->sentence,
                ]);

                $conversation->find($i)->update(['last_message_at'=>now()]);
            }

        }


    }
}
