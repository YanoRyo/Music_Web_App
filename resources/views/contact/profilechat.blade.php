<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MUSIC</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
</head>
<body>

<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Message</div>
            <div class="card-body chat-card">
            <div class="card-body chat-card">
                @foreach ($comments as $item)
                @include('components.comment', ['item' => $item])
                <td><a href="{{ route('contact.send',['id' => $item->send]) }}">返信を送る</a></td>
                @endforeach
                @foreach ($replycomments as $item)
                @include('components.comment', ['item' => $item])
                <td><a href="{{ route('contact.send',['id' => $item->send]) }}">返信を送る</a></td>
                @endforeach
                @foreach ($replys as $item)
                @include('components.replycomment', ['item' => $item])
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
