<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SEO -->
    {!! SEO::generate() !!}
    <meta name="author" content="Mathieu Le Tyrant"/>
    <meta name="copyright" content="Copyright 2015 © RealAion.com"/>
    <meta name="robots" content="index,follow"/>
    <meta name="location" content="France"/>

    <!-- STYLESHEETS -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/global.css" rel="stylesheet">
</head>
<body>


    <!-- Flash Messages -->
    @if(Session::has('success'))
      <div class="flash_messages success" id="flashMsg">
          <p>{{ Session::get('success') }}</p>
      </div>
    @elseif(Session::has('error'))
    <div class="flash_messages error" id="flashMsg">
        <p>{{ Session::get('error') }}</p>
    </div>
    @endif

    <!-- NAV -->
    <nav class="nav">

        <div class="languages">
            <a href="{{Route('language', 'fr')}}" class="flag fr"></a>
            <a href="{{Route('language', 'en')}}" class="flag en"></a>
        </div>

        <ul class="menu">
            <li><a href="{{Route('home')}}">{{Lang::get('all.nav.home')}}</a></li>
            <li>
              <a href="#">{{Lang::get('all.nav.about')}}</a>
              <ul class="sub_menu">
                <li><a href="{{Route('page.teamspeak')}}">{{Lang::get('all.nav.teamspeak')}}</a></li>
                <li><a href="{{Route('page.team')}}">{{Lang::get('all.nav.team')}}</a></li>
                <li><a href="mailto:{{Config::get('aion.contactMail')}}">{{Lang::get('all.nav.contact')}}</a></li>
              </ul>
            </li>
            <li><a href="{{Route('page.rules')}}">{{Lang::get('all.nav.rules')}}</a></li>
            <li><a href="{{Route('page.rates')}}">{{Lang::get('all.nav.rates')}}</a></li>
            <li>
                <a href="#">Stats</a>
                <ul class="sub_menu">
                    <li><a href="{{Route('stats.online')}}">{{Lang::get('all.nav.online')}}</a></li>
                    <li><a href="{{Route('stats.abyss')}}">{{Lang::get('all.nav.abyss')}}</a></li>
                    <li><a href="{{Route('stats.bg')}}">{{Lang::get('all.nav.bg')}}</a></li>
                </ul>
            </li>
            <li><a href="http://realaion.com/forum/">{{Lang::get('all.nav.forum')}}</a></li>
            <li><a href="{{Route('shop')}}">{{Lang::get('all.nav.shop')}}</a></li>
        </ul>
    </nav>

    <!-- LOGO -->
    <div class="logo">
        <img class="logo" src="/images/logo.png" alt="Logo de RealAion">
    </div>

    <!-- HEADER -->
    <header class="header">

      <!-- TOP -->
      <div class="header_top">
        <div class="status">
          @foreach($serversStatus as $value)
            <span>
              {{Lang::get('all.layout.status_of')}} {{$value['name']}} : <span class="{{($value['status']) ? 'online' : 'offline'}}">{{($value['status']) ? 'ON' : 'OFF'}}</span>
            </span>
          @endforeach
        </div>
        <div class="btn_user">
          @if(Session::has('connected'))
            <a href="{{Route('user.account')}}">{{Lang::get('all.nav.account')}} ({{Session::get('user.real')}} Reals)</a>
            <a href="{{Route('user.logout')}}">{{Lang::get('all.nav.logout')}}</a>
          @else
            <a href="#" id="btn_connexion">{{Lang::get('all.nav.login')}}</a>
            <a href="{{Route('user.subscribe')}}">{{Lang::get('all.nav.subscribe')}}</a>
          @endif
        </div>
      </div>

      <!-- USER LOGIN -->
      @include('_modules.login')

      <!-- SLIDER | SOCIAL -->
      <div class="header_bottom">

        <!-- SLIDER -->
        <ul id="bxslider">
          @foreach(Config::get('aion.slider') as $value)
            <li><img src="/images/slider/{{$value['image']}}" title="{{$value['title']}}"/></li>
          @endforeach
        </ul>

        <div class="slider_controller">
          <span id="slider-prev"></span>
          <span id="slider-next"></span>
        </div>

        <!-- SOCIAL -->
        <div class="social">
          <a href="{{Config::get('aion.link_facebook')}}" target="_blank" class="fa fa-facebook"></a>
          <a href="{{Config::get('aion.link_twitter')}}" target="_blank" class="fa fa-twitter"></a>
          <a href="{{Config::get('aion.link_youtube')}}" target="_blank"class="fa fa-youtube-play"></a>
        </div>

      </div>

    </header>

    <!-- BODY -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
      <p>{{Lang::get('all.layout.footer_1')}}</p><br>
      @if (Session::has('connected') && Session::get('user.access_level') > 0)
        <p><a href="{{Route('admin')}}">Administration</a></p><br>
      @endif
      <p>{{Lang::get('all.layout.footer_2')}} <a href="http://mathieuletyrant.com" target="_blank">Mathieu Le Tyrant</a> | Copyright 2015 © Real Aion</p>
    </footer>

    <!-- JAVASCRIPTS -->
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-64716331-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
