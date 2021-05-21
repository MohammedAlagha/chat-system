<?php

namespace App\Http\Livewire\Conversations;

use App\Events\Conversations\ConversationCreated;
use App\Models\Conversation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class ConversationCreate extends Component
{

    public $name = '';
    public $body = '';
    public $users = [];



    public function create()
    {
        $this->validate([
            'users' => 'required',
            'name' => 'nullable|string',
            'body' => 'required'
        ]);

        $conversation = Conversation::create([
            'name' => $this->name,
            'uuid'=>Str::uuid(),
            'user_id'=>auth()->id()
        ]);

        $conversation->messages()->create([
            'user_id'=>auth()->id(),
            'body'=>$this->body,
        ]);

        $conversation->users()->sync($this->collectUsersIds());

        broadcast(new ConversationCreated($conversation))->toOthers();

        return redirect()->route('conversations.show',$conversation);
    }

    private function collectUsersIds()
    {
        return collect($this->users)->merge([auth()->user()])->pluck('id')->unique();
    }

    public function addUser($user)
    {
        $filtered_array = array_filter($this->users, function ($value) use ($user) {
            return $value['id'] === $user['id'];
        });        //to prevent add the same user into conversation

        if (!$filtered_array) {
            array_push($this->users, $user);

        }

    }

    public function render()
    {
        return view('livewire.conversations.conversation-create');
    }


}
