<div>
    <div class="form-group">
        <label for="user" class="sr-only">User</label>
        <input type="text" id="user"
              x-on:input.debounce="search"
               x-ref="search"
               class="form-control"
               autocomplete="off"
               placeholder="Search here">
    </div>

    {{$suggestions}}
    <script>
        function userSearchState(){
            return {
                suggestions:[],

                search(e){
                    fetch(`/api/search/user?q=${e.target.value}&execludedUser={{auth()->id()}}`)
                    .then(response => response.json())
                    .then(suggestions => {
                        this.suggestions = suggestions;
                    })
                }
            }
        }
    </script>
</div>
