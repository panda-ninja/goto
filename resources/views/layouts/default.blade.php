<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Parallax Template - Materialize</title>

    <!-- CSS  -->
    <link href="{{asset('css/app.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('css/carousel.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <style>

    </style>

</head>
<body>
<header class="grey darken-4">
    <div class="container">
        <div class="row valign-wrapper">
            <div class="col m4 l4 hide-on-small-only hide-on-small-and-down hide-on-med-and-down">
                <a href="/" class="brand-logo valign"><img src="{{asset('img/logos/logo-ave.png')}}" alt="" class="responsive-img"></a>
            </div>
            <div class="col s12 m8 l8">
                <ul class="header-nav white-text right-align valign">
                    <li>(813) 600-3042</li>
                    <li>Mon to Sun: 9am - 8pm (EST)</li>
                    @if(auth()->guard('cliente')->check())
                        <li><a href="" class="green-text text-darken-3">{{auth()->guard('cliente')->user()->nombres.', '.auth()->guard('cliente')->user()->apellidos}}</a></li>
                        <li><a href="{{route('client_auth_destroy_path')}}" class="yellow-text text-darken-3">Logout</a></li>
                    @else
                        <li><a href="{{route('client_auth_index_path')}}" class="white-text">sign in</a></li>
                        <li><a href="" class="yellow-text text-darken-3">new account</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<nav class="white font-moserrat" role="navigation">
    <div class="nav-wrapper container">
        <a href="/" class="brand-logo"><img src="{{asset('img/logos/logo5.png')}}" alt=""></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse grey-text text-darken-4"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">All Included</a></li>
            <li><a href="badges.html">Ground Package</a></li>
            <li><a href="collapsible.html">Offers</a></li>
            <li><a href="mobile.html">Design</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">All Included</a></li>
            <li><a href="badges.html">Ground Package</a></li>
            <li><a href="collapsible.html">Offers</a></li>
            <li><a href="mobile.html">Design</a></li>
        </ul>
    </div>
</nav>

@yield('content')

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

<script src="{{asset('js/readmore.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>--}}
<script src="{{asset('js/init.js')}}"></script>

<script>
    $('#demo').readmore({
        speed: 500,
        collapsedHeight: 470
    });
    $('#demo2').readmore({
        speed: 500,
        collapsedHeight: 440
    });

</script>

<script type="text/javascript">
    function imgfilter(id) {
        var nombre= document.getElementById(id);
        if (nombre.checked) {
            $('#check_i_'+id).addClass('check-form');
            $('#img_filter_'+id).addClass('desaturada');
        }
        else {
            $('#check_i_'+id).removeClass('check-form');
            $('#img_filter_'+id).removeClass('desaturada');
        }
    }
</script>

<script>
    $(document).ready(function() {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");

        sync1.owlCarousel({
            singleItem : true,
            slideSpeed : 1000,
            navigation: false,
            pagination:false,
            afterAction : syncPosition,
            responsiveRefreshRate : 200,
        });

        sync2.owlCarousel({
            items : 4,
            itemsDesktop      : [1199,10],
            itemsDesktopSmall     : [979,10],
            itemsTablet       : [768,8],
            itemsMobile       : [479,4],
            pagination:false,
            responsiveRefreshRate : 100,
            afterInit : function(el){
                el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        function syncPosition(el){
            var current = this.currentItem;
            $("#sync2")
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced")
            if($("#sync2").data("owlCarousel") !== undefined){
                center(current)
            }

        }

        $("#sync2").on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo",number);
        });

        function center(number){
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

            var num = number;
            var found = false;
            for(var i in sync2visible){
                if(num === sync2visible[i]){
                    var found = true;
                }
            }

            if(found===false){
                if(num>sync2visible[sync2visible.length-1]){
                    sync2.trigger("owl.goTo", num - sync2visible.length+2)
                }else{
                    if(num - 1 === -1){
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if(num === sync2visible[sync2visible.length-1]){
                sync2.trigger("owl.goTo", sync2visible[1])
            } else if(num === sync2visible[0]){
                sync2.trigger("owl.goTo", num-1)
            }
        }

    });
</script>
<script>
    // JQUERY STICKY KIT
    // http://leafo.net/sticky-kit/

    $('#pinned')
        .stick_in_parent({
            parent: '.main-wrapper',
            offset_top: 0
        })
        .on('sticky_kit:bottom', function(e) {
            $(this).parent().css('position', 'static');
        })
        .on('sticky_kit:unbottom', function(e) {
            $(this).parent().css('position', 'relative');
        })
</script>
</body>
</html>
