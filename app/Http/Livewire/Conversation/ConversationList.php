<?php

namespace App\Http\Livewire\Conversation;

use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationList extends Component
{
    public $conversations;

    public function mount(Collection $conversations)
    {
        $this->conversations = $conversations;
    }

    public function render()
    {
        return view('livewire.conversation.conversation-list');
    }
}
