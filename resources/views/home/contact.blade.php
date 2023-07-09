<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QURAAN</title>
    <!-- STYLE -->
    <link rel="stylesheet" href="{{ asset('home/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/all.min.css') }}">

    <!-- LOGO -->
    <link rel="icon" href="{{ asset('home/logo.png') }}">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,700&family=Anton&family=Cairo:wght@300;500;800&family=Reem+Kufi:wght@600&family=Righteous&display=swap" rel="stylesheet">
</head>
<body>

    <!-- START HEADER -->
    <header>
        <div class="container" id="header">
            <p class="logo">QURAN KAREEM</p>
            <nav>
                <ul class="main-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/">Contact</a></li>
                    <li><a href="https://evonscompany.com/" target="blank">Company Website</a></li>
                    <form class="d-flex" role="search" method="get" action="{{ url('search_surah') }}">
                        @csrf
                        <input style="margin-top: 22px;height: 30px; width:300px; padding: 10px;border-radius: 0;" name="search" type="search" placeholder="Search From Surah ...." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" style="background-color: #045C44;color: white;width: 100px;height: 30px;cursor: pointer;">Search</button>
                    </form>
                </ul>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- START LANDING -->
    <!-- Start form -->
    <div class="contact">
        <div class="container">
            <div class="form">
                
                {!! Toastr::message() !!}

                <div class="content">
                    <h2>Request A Discount</h2>
                </div>
                <form action="{{ route('add.contact') }}" method="post">
                    @csrf
                    <input type="text" class="input" placeholder="Your name" name="name">
                    <input type="email" class="input" placeholder="Your Email" name="email">
                    <input type="text" class="input" placeholder="Your phone" name="phone">
                    <textarea placeholder="Tell Us About Your Needs" class="input" name="title"></textarea>
                    <input type="submit" value="send">
                </form>
            </div>
        </div>
    </div>
    <!-- End form -->
    <!-- End MAIN CONTENT-->
    <!-- START NEXT AND BACK SECTION -->
    <div class="container">
        <nav>
            <ul class="last-nav">
                <li><a href="#header">Top Page</a></li>
            </ul>
        </nav>
    </div>
    <!-- END NEXT AND BACK SECTION -->

    <!-- START FOOTER -->
    <footer id="footer" class="footer">
        <div class="container">
            <p class="dad">Designed and developed by</p>
            <h4>Evons Company Team</h4>
        </div>
    </footer>
    <!-- END FOOTER -->
</body>
</html>