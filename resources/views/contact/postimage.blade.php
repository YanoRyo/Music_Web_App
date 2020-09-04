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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ProfileImage') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('contact.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('プロフィール写真') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="user_image" required autocomplete="user_image">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                                

                                @error('user_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input class="btn btn-info" type="submit" value="登録する">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

