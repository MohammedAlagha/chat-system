@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('front/style.css')}}">
@endsection

@section('content')

    <div class="container py-5 px-4">
        <!-- For demo purpose-->
        <header class="text-center">
            <h1 class="display-4 text-white">Chat System</h1>
            <br><br>

        </header>

        <div class="row rounded-lg overflow-hidden shadow">
            <!-- Users box-->
            <div class="col-5 px-0">
                <div class="bg-white">

                    <div class="bg-gray px-4 py-2 bg-light">
                        <p class="h5 mb-0 py-1">Recent</p>
                    </div>

                    <div class="messages-box">
                        <div class="list-group rounded-0">

                            <livewire:conversations.conversation-list :conversations="$conversations"/>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Chat Box-->
            <div class="col-7 px-0">
                <div class="px-4 py-5 chat-box bg-white">

                    <livewire:conversations.conversation-messages :conversation="$conversation"
                                                                  :messages="$conversation->messages"/>

                </div>

                <!-- Typing area -->

                <livewire:conversations.conversation-reply/>

            </div>
        </div>
    </div>

@endsection
