<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <title>自己紹介ページ</title>
</head>
<body>
    <h1>自己紹介ページ</h1>
    @if( ( $contact->id ) === ( $post->user_id ) )
        <img src="{{ asset('storage/img/'. $post->user_image)}}" alt="どろがめのプロフィール画像">
    @endif
    <div class="btn-group">
		<a href="{{ route('contact.postimage')}}" class="btn  btn-primary">プロフィール画像を設定する</a>
	</div>
    <h2>プロフィール</h2>
    <p>
        ニックネーム:{{ Auth::user()->name}}<br>
        出身：{{ Auth::user()->address}}<br>
        分野：{{ Auth::user()->user_field}}<br>
    </p>
    <h2>ひとこと</h2>
    <p>
        {{ Auth::user()->favorite_genre}}
    </p>
    <div class="btn-group">
		<a class="btn  btn-primary" href="#">自分の作品を投稿する</a>
	</div>
</body>
</html>
    
