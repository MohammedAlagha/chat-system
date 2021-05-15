<form action="#" class="bg-light" x-data="conversationReplyState()" wire:submit.prevent="reply"
      enctype="multipart/form-data">
    <div class="input-group">
        <input type="text"
               wire:model="body"
               x-keydown.enter="submit"
               placeholder="Type a message"
               aria-describedby="button-addon2"
               class="form-control rounded-0 border-0 py-4 bg-light"
        >


        <div class="input-group-append">
            <button id="button-addon2" type="button" class="btn btn-link" x-on:click="attach"><i
                    class="fa fa-paperclip file-browser"></i></button>
            <input type="file" id="file_upload" wire:model="attachment" name="attachment" style="display:none;">

            <button id="button-addon2" type="submit" class="btn btn-link" x-ref="submit"><i
                    class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</form>

<script>
    function conversationReplyState()
    {
        return {
            attach() {
                document.getElementById('file_upload').click();
            },

            submit() {
                this.$refs.submit.click();
            }
        }
    }
</script>
