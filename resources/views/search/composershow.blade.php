
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <title>自己紹介ページ</title>
</head>
<body>
    
    <h1>自己紹介ページ</h1>
    @if( ( $contact->id ) === ( $post->user_id ) )
        <img src="{{ asset('storage/img/'. $post->user_image)}}" alt="どろがめのプロフィール画像">
    @endif
    <h2>プロフィール</h2>
    <p>
        ニックネーム:{{ $contact->name}}<br>
        出身：{{ $contact->address}}<br>
        分野：{{ $contact->user_field}}<br>
        
    </p>
    <h2>ひとこと</h2>
    <p>
        {{ $contact->favorite_genre}}
    </p>
    <a href="{{ route('chat1') }}"><button type="button" class="btn btn-primary">Chat</button></a>
</body>
</html>
