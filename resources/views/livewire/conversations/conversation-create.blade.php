<form action="" class="bg-white" wire:submit.prevent="create">
    <div class="p-4 border-bottom">

        <div class="mb-2 text-muted">
            Send to
            @foreach($users as $user)
                <a href="#" class="font-weight-bold">{{$user['name']}}</a>{{!$loop->last?', ':''}}
            @endforeach
        </div>

        <div x-data="{...userSearchState(),...ConversationCreateStatus()}">
            <x-conversations.user-search>
                <x-slot name="suggestions">
                    <template x-for="user in suggestions" :key="user.id">
                        <a href="#" class="d-block" x-on:click="addUser(user)" x-text="user.name"></a>
                    </template>
                </x-slot>

            </x-conversations.user-search>
        </div>
        <div class="p-4 border-bottom">
            <div class="form-group">
                <label for="name">Group name</label>
                <input type="text" id="name" class="form-control" wire:model="name" placeholder="Group name">
            </div>
            <div class="form-group">
                <label for="body">Message</label>
                <textarea id="body" rows="3" class="form-control" wire:model="body">

            </textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Start Conversation</button>
    </div>

</form>

@section('script')
    <script>
        function ConversationCreateStatus() {
            return {
                addUser(user) {
                     @this.call('addUser',user)
                    this.$refs.search.value = '';
                     this.suggestion = [];
                }
            }
        }
    </script>
@endsection
