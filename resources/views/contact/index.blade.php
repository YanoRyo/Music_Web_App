<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/99dc53c218.js" crossorigin="anonymous"></script>

        <title>MUSIC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
        
    </head>
    <body>
    <header>
        <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">音楽マッチングサイト</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                   
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#about">AboutUs</a></li>
                        @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('contact.myprofile',Auth::user())}}">MyProfile</a></li>
                            <li><a href="{{ route('contact.profilechat',['id' => Auth::user()->id])}}">MyMessage</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Registar</a></li>
                                @endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
    </header>
    <section class="full-width-img">
        <div class="container">
            <div class="box">
                <ul class="subheading-text">
                    <li>「あなたの音楽をみんなの音楽に」</li>
                </ul>
                </div>
            </div>
        </section>
        <main>
            <div class="containar">
                <dic class="title">
                    <h1>Search</h1>
                </div>
                <div class="genre">
                    <div class="singer"></div>
                    <div class="lyricist"></div>
                    <div class="composer"></div>
                    
                </div>
                <div class="search-genre">
                    <div class="singer-search"><a href="{{ route('search.singer')}}">Singer</a></div>
                    <div class="lyricist-search"><a href="{{ route('search.lyricist')}}">Lyricist</a></div>
                    <div class="composer-search"><a href="{{ route('search.composer')}}">Composer</a></div>
                </div>
            </div>
                <div class="ourservice">
                    <!-- <img src="img/musician-2563713_1920.jpg" alte="私たちのサービス"> -->
                    <div class="text">
                        <h1>OUR SERVICE</h1>
                        <div class="message-box">
                            <p>自分だけが持っている音楽への情熱や好奇心を、それぞれが活かし、より簡単に楽しく他の人と協力して、実際に形にする事を手助けしたいと思い、このサービスを提供させていただきます。<p>
                        </div>
                        

                    </div>
                </div>
        
        </main>
        <footer>
        　　<ul class="footer-menu">
                <li>SERVICE ｜</li>
                <li>ABOUT US ｜</li>
                <li>INFORMATION</li>
            </ul>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-tiktok"></i>
            <i class="fab fa-facebook-f"></i>

        <p>© All rights reserved by webcampnavi.</p>
    </footer>
    <script>
        $(window).scroll(function () {

            var sc = $(window).scrollTop()
            if (sc > 150) {
                $("#main-navbar").addClass("navbar-scroll")
            } 
            else {
                $("#main-navbar").removeClass("navbar-scroll")
            }
        });
    </script>   
    </body>
</html>
