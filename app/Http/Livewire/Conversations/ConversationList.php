<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationList extends Component
{
    public $conversations;

    public function getListeners()
    {
        return [
            "echo-private:User.".auth()->id().",Conversations\\ConversationUpdated"=>'UpdatedConversationFromBroadcast',
            "echo-private:User.".auth()->id().",Conversations\\ConversationCreated"=>'CreatedConversationFromBroadcast',
        ];
    }

    public function UpdatedConversationFromBroadcast($payload)
    {
        if ($conversation = $this->conversations->find($payload['conversation']['id'])){
            $conversation->fresh();
        }
    }

    public function CreatedConversationFromBroadcast($payload)
    {
         $this->conversations->prepend(Conversation::find($payload['conversation']['id']));
    }

    public function mount(Collection $conversations)
    {
        $this->conversations = $conversations->load('messages');
    }

    public function render()
    {
        return view('livewire.conversations.conversation-list');
    }
}
