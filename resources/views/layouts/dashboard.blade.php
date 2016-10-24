<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Parallax Template - Materialize</title>

    <!-- CSS  -->
    <link href="{{asset('css/app.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<header class="grey darken-4">
    <div class="container">
        <div class="row valign-wrapper">
            <div class="col m5 l6 hide-on-small-only hide-on-small-and-down hide-on-med-and-down">
                <a href="#!" class="brand-logo valign"><img src="{{asset('img/logos/logo-ave-5.png')}}" alt="" class="responsive-img"></a>
            </div>
            <div class="col s12 m8 l6">
                <ul class="header-nav white-text right-align valign">
                    <li>(813) 600-3042</li>
                    <li><a href="" class="white-text">sign in</a></li>
                    <li><a href="" class="yellow-text text-darken-3">new account</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <a href="#!" class="brand-logo"><img src="{{asset('img/logos/logo5.png')}}" alt=""></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse grey-text text-darken-4"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">Only Tours</a></li>
            <li><a href="badges.html">Ground Packages</a></li>
            <li><a href="collapsible.html">With Flight</a></li>
            <li><a href="mobile.html">Design My Trip</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Only Tours</a></li>
            <li><a href="badges.html">Ground Packages</a></li>
            <li><a href="collapsible.html">With Flight</a></li>
            <li><a href="mobile.html">Design My Trip</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="section">
        <!-- Page Layout here -->
        <div class="row">

            <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
                <!-- Grey navigation panel

                      This content will be:
                  3-columns-wide on large screens,
                  4-columns-wide on medium screens,
                  12-columns-wide on small screens  -->
                <div class="collection">
                    <a href="#!" class="collection-item">Quotes<span class="badge">1</span></a>

                    <a href="#!" class="collection-item">Payments</a>
                    <a href="#!" class="collection-item">Reports</a>
                    <a href="#!" class="collection-item">Wish list<span class="new badge">4</span></a>
                    <a href="#!" class="collection-item">Profile<span class="badge">14</span></a>
                </div>

            </div>

            <div class="col s12 m8 l9 position-relative"> <!-- Note that "m8 l9" was added -->
                @yield('content')
            </div>

        </div>
    </div>
</div>

<footer class="no-padding">
    <div>
        <img src="{{asset('img/banners/footer-1.jpg')}}" alt="" class="responsive-img">
    </div>
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">ABOUT US</h5>
                <p class="grey-text text-lighten-4">Is built on one very simple principle. Do the right thing all the time, every time. For our team, for our travelers, for the people and places we visit ...
                    <a href="">read more</a></p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">GOTOPERU GROUP</h5>
                <ul>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">English:</b> www.gotoperu.com</a></li>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">Portuguese:</b> www.andesviagens.com</a></li>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">French:</b> www.andesperou.com</a></li>
                    <li><a class="white-text" href="#!"><b class="light yellow-text text-darken-3">Luxury:</b> www.incaluxury.com</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">COMPANY INFO</h5>
                <ul>
                    <li></li>
                    <li class="light white-text text-darken-3"><b>USA:</b> 1(800) 610-8406</a></li>
                    <li class="light white-text text-darken-3"><b>CHILE:</b> 1(230) 020-9019</li>
                    <li class="light white-text text-darken-3"><b>BRAZIL:</b>(11) 3230-1121</li>
                    <li class="light white-text text-darken-3"><b>PERU:</b> (51) 84 262-555</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container orange-text">
            Made by <a class="brown-text text-lighten-3" href="">PandaNinja</a>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/init.js')}}"></script>

</body>
</html>
