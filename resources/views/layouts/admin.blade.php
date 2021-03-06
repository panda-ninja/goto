<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Materialize - Material Design Admin Template</title>

    <!-- Favicons-->
    <link rel="icon" href="{{asset("img/icons/favicon/favicon.ico")}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{asset("img/icons/favicon/apple-touch-icon-ipad-retina-display.png")}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{asset("img/icons/favicon/apple-touch-icon-ipad-retina-display.png")}}">

    <!-- CORE CSS-->
    <link href="{{asset('css/admin-theme.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>

<body>
<!-- Start Page Loading -->
{{--<div id="loader-wrapper">--}}
    {{--<div id="loader"></div>--}}
    {{--<div class="loader-section section-left"></div>--}}
    {{--<div class="loader-section section-right"></div>--}}
{{--</div>--}}
<!-- End Page Loading -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><h1 class="logo-wrapper"><a href="{{route("inicio_path")}}" class="brand-logo darken-1"><img src="{{asset("images/materialize-logo.png")}}" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1></li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="mdi-action-search"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize"/>
                </div>
                <ul class="right hide-on-med-and-down">
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown"><img src="{{asset("images/flag-icons/United-States.png")}}" alt="USA" /></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                        </a>
                    </li>
                    <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                    </li>
                </ul>
                <!-- translation-button -->
                <ul id="translation-dropdown" class="dropdown-content">
                    <li>
                        <a href="#!"><img src="{{asset("images/flag-icons/United-States.png")}}" alt="English" />  <span class="language-select">English</span></a>
                    </li>
                    <li>
                        <a href="#!"><img src="{{asset("images/flag-icons/France.png")}}" alt="French" />  <span class="language-select">French</span></a>
                    </li>
                    <li>
                        <a href="#!"><img src="{{asset("images/flag-icons/China.png")}}" alt="Chinese" />  <span class="language-select">Chinese</span></a>
                    </li>
                    <li>
                        <a href="#!"><img src="{{asset("images/flag-icons/Germany.png")}}" alt="German" />  <span class="language-select">German</span></a>
                    </li>

                </ul>
                <!-- notifications-dropdown -->
                <ul id="notifications-dropdown" class="dropdown-content">
                    <li>
                        <h5>NOTIFICATIONS <span class="new badge">5</span></h5>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="{{ Gravatar::src(auth()->guard('admin')->user()->email), 100}}" alt="" class="circle responsive-img valign profile-image">
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                </li>
                                {{--<li><a href="#"><i class="mdi-action-settings"></i> Settings</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>--}}
                                {{--</li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>--}}
                                {{--</li>--}}
                                <li><a href="{{route('admin_auth_destroy_path')}}"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                            </ul>
                            {{--<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{auth()->guard('admin')->user()->name}}<i class="mdi-navigation-arrow-drop-down right"></i></a>--}}
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><i class="mdi-navigation-arrow-drop-down"></i>{{auth()->guard('admin')->user()->name}}</a>
                            <p class="user-roal">Administrator</p>
                        </div>
                    </div>
                </li>
                <li class="bold active"><a href="{{route("inicio_path")}}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                </li>
                {{--<li class="no-padding">--}}
                    {{--<ul class="collapsible collapsible-accordion">--}}
                        {{--<li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Quotes</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="{{route("admin_client_path")}}">New</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="#">Current</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Packages</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{route("nuevo_paquete_path")}}">New</a>
                                    </li>
                                    <li><a href="{{route("current_list_path")}}">Current</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Quotes</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{route("cotizacion_path")}}">New</a>
                                    </li>
                                    <li><a href="{{route('admin_current_packages_path')}}">Current</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">MORE</p></li>
                <li><a href="{{route("admin_itinerary_new_path")}}"><i class="mdi-action-view-list"></i> Itinerary</a>
                </li>
                <li><a href="{{route("admin_concepts_index_path")}}"><i class="mdi-image-grid-on"></i> Concepts</a>
                </li>
                {{--<li><a href="css-color.html"><i class="mdi-editor-format-color-fill"></i> Color</a>--}}
                {{--</li>--}}
                {{--<li><a href="css-helpers.html"><i class="mdi-communication-live-help"></i> Helpers</a>--}}
                {{--</li>--}}
                {{--<li><a href="changelogs.html"><i class="mdi-action-swap-vert-circle"></i> Changelogs</a>--}}
                {{--</li>--}}


                {{--<li class="bold"><a href="app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Mailbox <span class="new badge">4</span></a>--}}
                {{--</li>--}}
                {{--<li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Calender</a>--}}
                {{--</li>--}}
                {{--<li class="no-padding">--}}
                    {{--<ul class="collapsible collapsible-accordion">--}}
                        {{--<li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i> CSS</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="css-typography.html">Typography</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="css-icons.html">Icons</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="css-animations.html">Animations</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="css-shadow.html">Shadow</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="css-media.html">Media</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="css-sass.html">Sass</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i> UI Elements</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="ui-alerts.html">Alerts</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-buttons.html">Buttons</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-badges.html">Badges</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-breadcrumbs.html">Breadcrumbs</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-collections.html">Collections</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-collapsibles.html">Collapsibles</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-tabs.html">Tabs</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-navbar.html">Navbar</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-pagination.html">Pagination</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-preloader.html">Preloader</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-toasts.html">Toasts</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-tooltip.html">Tooltip</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="ui-waves.html">Waves</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-queue"></i> Advanced UI <span class="new badge"></span></a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="advanced-ui-chips.html">Chips</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-cards.html">Cards</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-modals.html">Modals</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-media.html">Media</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-range-slider.html">Range Slider</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-sweetalert.html">SweetAlert</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-nestable.html">Shortable & Nestable</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-translation.html">Language Translation</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="advanced-ui-highlight.html">Highlight</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a href="app-widget.html" class="waves-effect waves-cyan"><i class="mdi-device-now-widgets"></i> Widgets</a>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Tables</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="table-basic.html">Basic Tables</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="table-data.html">Data Tables</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="table-jsgrid.html">jsGrid</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="table-editable.html">Editable Table</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="table-floatThead.html">floatThead</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i> Forms <span class="new badge"></span></a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="form-elements.html">Form Elements</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="form-layouts.html">Form Layouts</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="form-validation.html">Form Validations</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="form-masks.html">Form Masks</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="form-file-uploads.html">File Uploads</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-social-pages"></i> Pages</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="page-contact.html">Contact Page</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="page-todo.html">ToDos</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="page-blog-1.html">Blog Type 1</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="page-blog-2.html">Blog Type 2</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="page-404.html">404</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="page-500.html">500</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="page-blank.html">Blank</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-shopping-cart"></i> eCommers</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="eCommerce-products-page.html">Products Page</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="eCommerce-pricing.html">Pricing Table</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="eCommerce-invoice.html">Invoice</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-image"></i> Medias</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="media-gallary-page.html">Gallery Page</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="media-hover-effects.html">Image Hover Effects</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> User</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="user-profile-page.html">User Profile</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="user-login.html">Login</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="user-register.html">Register</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="user-forgot-password.html">Forgot Password</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="user-lock-screen.html">Lock Screen</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="user-session-timeout.html">Session Timeout</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> Charts</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="charts-chartjs.html">Chart JS</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="charts-chartist.html">Chartist</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="charts-morris.html">Morris Charts</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="charts-xcharts.html">xCharts</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="charts-flotcharts.html">Flot Charts</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="charts-sparklines.html">Sparkline Charts</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="li-hover"><div class="divider"></div></li>--}}
                {{--<li class="li-hover"><p class="ultra-small margin more-text">MORE</p></li>--}}
                {{--<li><a href="angular-ui.html"><i class="mdi-action-verified-user"></i> Angular UI  <span class="new badge"></span></a>--}}
                {{--</li>--}}
                {{--<li><a href="css-grid.html"><i class="mdi-image-grid-on"></i> Grid</a>--}}
                {{--</li>--}}
                {{--<li><a href="css-color.html"><i class="mdi-editor-format-color-fill"></i> Color</a>--}}
                {{--</li>--}}
                {{--<li><a href="css-helpers.html"><i class="mdi-communication-live-help"></i> Helpers</a>--}}
                {{--</li>--}}
                {{--<li><a href="changelogs.html"><i class="mdi-action-swap-vert-circle"></i> Changelogs</a>--}}
                {{--</li>--}}
                {{--<li class="li-hover"><div class="divider"></div></li>--}}
                {{--<li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>--}}
                {{--<li class="li-hover">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col s12 m12 l12">--}}
                            {{--<div class="sample-chart-wrapper">--}}
                                {{--<div class="ct-chart ct-golden-section" id="ct2-chart"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->

        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- START CONTENT -->
        <section id="content">

            <!--start container-->
            @yield('content')


        </section>
        <!-- END CONTENT -->

        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START RIGHT SIDEBAR NAV-->
        <aside id="right-sidebar-nav">
            <ul id="chat-out" class="side-nav rightside-navigation">
                <li class="li-hover">
                    <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                    <div id="right-search" class="row">
                        <form class="col s12">
                            <div class="input-field">
                                <i class="mdi-action-search prefix"></i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Search</label>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="li-hover">
                    <ul class="chat-collapsible" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                            <div class="collapsible-body recent-activity">
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">just now</a>
                                        <p>Jim Doe Purchased new equipments for zonal office.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">Yesterday</a>
                                        <p>Your Next flight for USA will be on 15th August 2015.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">5 Days Ago</a>
                                        <p>Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">Last Week</a>
                                        <p>Jessy Jay open a new store at S.G Road.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">5 Days Ago</a>
                                        <p>Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                            <div class="collapsible-body sales-repoart">
                                <div class="sales-repoart-list  chat-out-list row">
                                    <div class="col s8">Target Salse</div>
                                    <div class="col s4"><span id="sales-line-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Payment Due</div>
                                    <div class="col s4"><span id="sales-bar-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Delivery</div>
                                    <div class="col s4"><span id="sales-line-2"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Progress</div>
                                    <div class="col s4"><span id="sales-bar-2"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                            <div class="collapsible-body favorite-associates">
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="{{asset("images/avatar.jpg")}}" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Eileen Sideways</p>
                                        <p class="place">Los Angeles, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="{{asset("images/avatar.jpg")}}" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Zaham Sindil</p>
                                        <p class="place">San Francisco, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="{{asset("images/avatar.jpg")}}" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Renov Leongal</p>
                                        <p class="place">Cebu City, Philippines</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="{{asset("images/avatar.jpg")}}" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Weno Carasbong</p>
                                        <p>Tokyo, Japan</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="{{asset("images/avatar.jpg")}}" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Nusja Nawancali</p>
                                        <p class="place">Bangkok, Thailand</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <!-- LEFT RIGHT SIDEBAR NAV-->

    </div>
    <!-- END WRAPPER -->

</div>
<!-- END MAIN -->



<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START FOOTER -->
<footer class="page-footer">
    {{--<div class="container">--}}
        {{--<div class="row section">--}}
            {{--<div class="col l6 s12">--}}
                {{--<h5 class="white-text">World Market</h5>--}}
                {{--<p class="grey-text text-lighten-4">World map, world regions, countries and cities.</p>--}}
                {{--<div id="world-map-markers"></div>--}}
            {{--</div>--}}
            {{--<div class="col l4 offset-l2 s12">--}}
                {{--<h5 class="white-text">Sales by Country</h5>--}}
                {{--<p class="grey-text text-lighten-4">A sample polar chart to show sales by country.</p>--}}
                {{--<div id="polar-chart-holder">--}}
                    {{--<canvas id="polar-chart-country" width="200"></canvas>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="footer-copyright">--}}
        {{--<div class="container">--}}
            {{--Copyright © 2015 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.--}}
            {{--<span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>--}}
        {{--</div>--}}
    {{--</div>--}}
</footer>
<!-- END FOOTER -->


<!-- ================================================
Scripts
================================================ -->

<!-- jQuery Library -->
<script src="{{asset('js/admin-app.js')}}"></script>
<!-- google map api -->
<script>
    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });
</script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset("js/plugins.js")}}"></script>


<!-- Toast Notification -->
{{--<script type="text/javascript">--}}
    {{--// Toast Notification--}}
    {{--$(window).load(function() {--}}
        {{--setTimeout(function() {--}}
            {{--Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);--}}
        {{--}, 1500);--}}
        {{--setTimeout(function() {--}}
            {{--Materialize.toast('<span>You can swipe me too!</span>', 3000);--}}
        {{--}, 5000);--}}
        {{--setTimeout(function() {--}}
            {{--Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);--}}
        {{--}, 15000);--}}
    {{--});--}}
{{--</script>--}}
@yield('scripts')

<script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            email: {
                required: true,
                email:true
            },
            number: {
                required: true,
                maxlength: 2
            },
            date: {
                required: true
            },

        },
        //For custom messages
        messages: {
            email: "Ingrese el email del pasajero",
            number:{
                required: "Ingrese el numero de pasajeros",
                minlength: "El numero de pasajeros debe ser menor o igual a 99"
            },
            date: "Ingrese fecha de viaje"
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#formPackage").validate({
        rules: {
            codigo_txt: {
                required: true,
                maxlength: 8
            },
            duracion_txt: {
                required: true,
                maxlength: 2
            },
            titulo_txt: {
                required: true
            },
            descipcion_txt: {
                required: true
            }

        },
        //For custom messages
        messages: {
            codigo_txt: "Ingrese codigo de paquete",
            duracion_txt:{
                required: "Ingrese la duracion del paquete",
                minlength: "La duracion debe ser menor o igual a 99"
            },
            titulo_txt: "Ingrese titulo del paquete",
            descipcion_txt: "Ingrese descripcion del paquete"
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });

</script>

<script type="text/javascript">
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify({
            messages: {
                'default': 'Arraste y suelte o cargue una imagen para el paquete',
                'replace': 'Arrastre y suelte o haga clic para reemplazar',
                'remove':  'Quitar imagen',
                'error':   'Lo sentimos, este archivo es demasiado grande'
            }
        });
    });
</script>
<script>
    $( function() {
        $( ".column" ).sortable({
            connectWith: ".column",
            handle: ".portlet-header",
            cancel: ".portlet-toggle",
            placeholder: "portlet-placeholder ui-corner-all"
        });

        $( ".portlet" )
            .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
            .find( ".portlet-header" )
            .addClass( "ui-widget-header ui-corner-all" )
            .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");

        $( ".portlet-toggle" ).on( "click", function() {
            var icon = $( this );
            icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
            icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
        });

    } );

    $(function () {
       $('#email3').autocomplete({
            source: '{{route('buscar_cliente_path')}}',
            minLength: 1,
            select:function(event,ui){
                $('#email3').val(ui.item.value);
            }
        });
        $('#codigo').autocomplete({
            source: '{{route('buscar_paquete_path')}}',
            minLength: 1,
            select:function(event,ui){
                $('#codigo').val(ui.item.value);
            }
        });
    });

</script>
<script>
    // JQUERY STICKY KIT
    // http://leafo.net/sticky-kit/

    $('#pinned')
        .stick_in_parent({
            parent: '.main-wrapper',
            offset_top: 25
        })
        .on('sticky_kit:bottom', function(e) {
            $(this).parent().css('position', 'static');
        })
        .on('sticky_kit:unbottom', function(e) {
            $(this).parent().css('position', 'relative');
        })
</script>


<script type="text/javascript">
    function addConcept(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });

        $("#c_send").attr("disabled", true);

        var s_titulo = $('#c_titulo_txt').val();
        var s_price = $('#c_price_txt').val();
        var s_observacion = $('#c_observacion_txt').val();

        if (s_titulo.length == 0 ){
            $('#c_titulo_txt').css("border-bottom", "2px solid #FF0000");
            validation = "false";
        }else{
            validation = "true";
        }

        if (s_price.length == 0 ){
            $('#c_price_txt').css("border-bottom", "2px solid #FF0000");
            validation = "false";
        }else{
            validation = "true";
        }

        if(validation == "true"){
            var datos = {

                "titulo_txt" : s_titulo,
                "price_txt" : s_price,
                "observacion_txt" : s_observacion
            };
            $.ajax({
                data:  datos,
                url:   '{{route('admin_concept_store2_path')}}',
                type:  'get',

                beforeSend: function () {
                    $("#c_send").html('<div class="preloader-wrapper small active">'+
                        '<div class="spinner-layer spinner-green-only">'+
                        '<div class="circle-clipper left">'+
                        '<div class="circle"></div>'+
                        '</div><div class="gap-patch">'+
                        '<div class="circle"></div>'+
                        '</div><div class="circle-clipper right">'+
                        '<div class="circle"></div>'+
                        '</div>'+
                        '</div>'+
                        '</div>');;
                },
                success:  function (response) {
                    var $idservices = response.split('_');
//                    $("#theForm")[0].reset();
                    $("#c_send").html("Send");
//                    $("#c_congratulation p").html(response);
//                    $("#c_congratulation").fadeIn('slow');
                    $("#c_send").removeAttr("disabled");
                    $("#c_services").append('' +
                        '<div class="col s9">'+
                        '<input type="checkbox" id="services-'+$idservices[0]+'" name="services[]" class="filled-in" value="'+$idservices[0]+'"/>'+
                        '<label for="services-'+$idservices[0]+'">'+s_titulo+' <i class="text-10">('+s_observacion+')</i></label>'+
                        '</div>'+
                        '<div class="col s3">'+
                        '<b class="right">('+s_price+'$)</b>'+
                        '</div>');
                    $('#staggered-test li').css("opacity", "0");
                }
            });
        } else{
            $("#c_send").removeAttr("disabled");
        }
    }

</script>

</body>

</html>