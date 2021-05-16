<div>

    @foreach($messages as $message)
       @if($message->isOwn())

            <livewire:conversations.conversation-message-own :message="$message" key="{{\Str::random(5)}}" />

        @else
            <livewire:conversations.conversation-message :message="$message" key="{{\Str::random(5)}}" />
        @endif
      @endforeach


</div>
