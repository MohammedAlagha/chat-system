<div>

    @foreach($messages as $message)

       @if($message->isOwn())

            <livewire:conversations.conversation-message-own :messsage="$message" :key="$message->id"/>

        @else
            <livewire:conversations.conversation-message :messsage="$message" :key="$message->id"/>
        @endif
      @endforeach


</div>
