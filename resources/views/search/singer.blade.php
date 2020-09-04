<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Digger Gelman</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Singer</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="GET" action="{{route('search.singer')}}" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="キーワード検索" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                    </form>
                    
                    
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">プロフィール写真</th>
                        <th scope="col">ニックネーム</th>
                        <th scope="col">住まい</th>
                        <th scope="col">分野</th>
                        <th scope="col">楽しんでる事</th>
                        <th scope="col">詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                        <th><img src="{{ asset('storage/img/'. $contact->user_image)}}" width="80" height="80" style ="border-radius:50%"></th>
                        <th>{{ $contact->name}}</th>
                        <th>{{ $contact->address}}</th>
                        <th>{{ $contact->user_field}}</th>
                        <th>{{ $contact->favorite_genre}}</th>
                        <td><a href="{{ route('search.singershow',['id' => $contact->id]) }}">詳細を見る</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


