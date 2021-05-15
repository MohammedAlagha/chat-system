<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConversationReply extends Component
{
    use WithFileUploads;

    public $body = '';
    public $attachment = '';
    public $attachment_name = '';
    public $conversation;

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    protected $rules = [
        'body' => 'attachment',
        'attachment' => 'nullable|files|mimes:png,jpg,jpeg,gif,wav,mp3,mp4|max:102400'
    ];

    public function reply()
    {
        $this->validate();

        if (!is_null($this->attachment)) {
            $this->attachment_name = hexdec(uniqid()) . $this->attachment->getClientOriginalExtension();
            $this->attachment->storeAs('/', $this->attachment_name, 'media');
            $data['attachment'] = $this->attachment_name;
        }

        $data['body'] = $this->body;
        $data['user_id'] = auth()->id();

        $message = $this->conversation->messages()->create($data);

        $this->conversation->update([
            'last_message_at' => now()
        ]);

        foreach ($this->conversation->otherUser as $user) {
            $user->conversations()->updateExisitingPivot($this->conversation,[
                'read-at'=>null
            ]);

        }

        $this->body = '';
        $this->attachment = '';
        $this->attachment_name = '';


    }


    public function render()
    {
        return view('livewire.conversations.conversation-reply');
    }
}
