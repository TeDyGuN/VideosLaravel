<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="theme-color" content="#333333" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Gama - Bolivia</title>
	{{-- <link rel="stylesheet" href="https://www.clipzui.com/assets/css/style.css?t=81415318" type="text/css" media="all" /> --}}
  <link rel="stylesheet" href="{{ asset('css/video.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{ asset('css/helpers.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('plantilla/css/font-awesome.min.css') }}">

  /<script src="{{ asset('js/jquery.min.js' )}}"></script>
	<!--[if lt IE 9]>
	<script src="https://www.clipzui.com/assets/js/html5shiv.min.js"></script>
	<script src="https://www.clipzui.com/assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar fixed">
<div class="container">
<div id="nav-desktop">
  <ul>
    <li id="menu-btn" role="button">
		    <i class="fa fa-reorder fa-lg"></i>
    </li>
    <li class="navbar-brand">
      <a href="{{ url('/')}} "><img src="{{ asset('img/logo.png')}}" alt="Videos Bolivia"></a>
    </li>
	   <li class="search">
		     <form class="form-wrapper cf" method="get" action="https://www.clipzui.com/search">
			        <input id="autocomplete" autocomplete="off" type="text" placeholder="Buscar..." name="k">
			        <button type="submit"><i class="fa fa-search"></i></button>
		     </form>
    </li>
    @guest
        <li class="pull-right" style="padding-top: 6px;"><a class="links-nav" href="{{ route('login') }}">| Ingresar</a></li>
        <li class="pull-right" style="padding-top: 6px;"><a class="links-nav" href="{{ route('register') }}">Registrarse</a></li>
    @else
      @if(Auth::user()->role == 'ADMIN')
        <li class="pull-right" style="padding-top: 6px;">
          <a class="links-nav" href="{{ url('admin') }}">{{ Auth::user()->name }}</a>
        </li>
      @else
        <li class="pull-right" style="padding-top: 6px;"><a class="links-nav" href="#">{{ Auth::user()->name }} </a></li>
      @endif

      <li class="pull-right" style="padding-top: 6px;">
          <a class="links-nav" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Logout |
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </li>
    @endguest
  </ul>
  {{-- <ul class="nav navbar-nav navbar-right pull-right">

  </ul> --}}
</div>
<div id="nav-mobile">
	<div class="navbar-search">
		<div id="menu-btn" class="menu">
		  <a href="javascript:;"><i class="fa fa-bars fa-lg"></i></a>
		</div>
		<div class="logo">
		  <a href="https://www.clipzui.com/"><img src="https://www.clipzui.com/assets/images/logo.png" alt="ClipZui.Com"></a>
		</div>
		<div class="search">
		  <a class="m_search" href="javascript:;"><i class="fa fa-search"></i></a>
		</div>
	</div>
	<div class="headbar-m-search hide">
		<div class="back-search">
			<a href="javascript:;"><i class="fa fa-arrow-left"></i></a>
		</div>
		<div class="mm-search">
		<form class="form-wrapper cf" method="get" action="https://www.clipzui.com/search">
			<input id="m-autocomplete" autocomplete="off" type="text" placeholder="Search..." name="k">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
		</div>
	</div>
</div>
</div>
</nav>
<div class="pushy pushy-left">
<div class="scrollbar">
<h3><i class="fa fa-indent"></i> Category</h3><span class="close"><a href="javascript:;"><i class="fa fa-times"></i></a></span>
<ul>
	<li><a href="https://www.clipzui.com/category/film-animation"><i class="fa fa-film"></i> Film & Animation</a></li>
	<li><a href="https://www.clipzui.com/category/autos-vehicles"><i class="fa fa-car"></i> Autos & Vehicles</a></li>
	<li><a href="https://www.clipzui.com/category/music"><i class="fa fa-music"></i> Music</a></li>
	<li><a href="https://www.clipzui.com/category/pets-animals"><i class="fa fa-paw"></i> Pets & Animals</a></li>
	<li><a href="https://www.clipzui.com/category/sports"><i class="fa fa-futbol-o"></i> Sports</a></li>
	<li><a href="https://www.clipzui.com/category/travel-events"><i class="fa fa-globe"></i> Travel & Events</a></li>
	<li><a href="https://www.clipzui.com/category/gaming"><i class="fa fa-gamepad"></i> Gaming</a></li>
	<li><a href="https://www.clipzui.com/category/comedy"><i class="fa fa-smile-o"></i> Comedy</a></li>
	<li><a href="https://www.clipzui.com/category/entertainment"><i class="fa fa-star-o"></i> Entertainment</a></li>
	<li><a href="https://www.clipzui.com/category/howto-style"><i class="fa fa-thumbs-o-up"></i> Howto & Style</a></li>
	<li><a href="https://www.clipzui.com/category/education"><i class="fa fa-graduation-cap"></i> Education</a></li>
	<li><a href="https://www.clipzui.com/category/science-technology"><i class="fa fa-flask"></i> Science & Technology</a></li>
</ul>
<h3><i class="fa fa-indent"></i> Funny & Fails</h3>
<ul>
	<li><a href="https://www.clipzui.com/search?k=funny+video" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny videos</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+fail" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny fails</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+baby" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny baby</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+sport" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny sport</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+animal" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny animal</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+magic" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny magic</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+prank" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny prank</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+vine" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny vines</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+viral" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny viral</a></li>
	<li><a href="https://www.clipzui.com/search?k=funny+moment" rel="search"><i class="fa fa-arrow-circle-right"></i> Funny moments</a></li>
	<li><a href="https://www.clipzui.com/search?k=epic+fail" rel="search"><i class="fa fa-arrow-circle-right"></i> Epic fails</a></li>
	<li><a href="https://www.clipzui.com/search?k=animal+fail" rel="search"><i class="fa fa-arrow-circle-right"></i> Animal fails</a></li>
	<li><a href="https://www.clipzui.com/search?k=stupid+fail" rel="search"><i class="fa fa-arrow-circle-right"></i> Stupid fails</a></li>
</ul>
<div style="padding:10px;background:#222;"></div>
</div>
</div>
<div class="site-overlay"></div>

<div class="container clearfix">
<div class="list-item">
<div class="blocktitle">
	<div class="filter"><button class="dropbtn"><span class="text">Relevance</span> <i class="fa fa-sort-desc"></i></button><div class="dropdown-content"><a href="https://www.clipzui.com/category/sports?sort=date">Upload date</a><a href="https://www.clipzui.com/category/sports?sort=view">View count</a><a href="https://www.clipzui.com/category/sports?sort=rating">Rating</a></div></div>
	<div class="title">
		<i class="fa fa-video-camera"></i> <h1>Videos Musicales Top Bolivia</h1>
	</div>
</div>

<div class="scroller-status" style="display: none;">
  <div class="loader-ellips">
	<span class="loader-ellips__dot"></span>
	<span class="loader-ellips__dot"></span>
	<span class="loader-ellips__dot"></span>
	<span class="loader-ellips__dot"></span>
  </div>
</div>

<div id="ajax-items">
  <ul class="list-video">
    @foreach ($videos as $v)
      <li>
        <a href="{{ url('video/'.$v->id) }}">
          <div class="item">
            <div class="thumb">
              <img src="{{ url('imagen/'.$v->image) }}" alt="{{ $v->tittle}}" />
              <span class="video-time">{{ $v->duration }}</span>
            </div>
            <h2 class="name" title="{{ $v->tittle }}">{{ $v->tittle }}</h2>
            <span class="user_ytb"><i class="fa fa-user-circle-o"></i> Subido por VideosBolivia {{ \FormatTime::LongTimeFilter($v->created_at) }}</span>
            <span class="meta-video">
              <span class="info">
                <i class="fa fa-eye"></i> {{ $v->visitas }} Visitas<span class="cham"></span>
              </span>
            </span>
          </div>
        </a>
      </li>
    @endforeach

    {{-- <li>
      <a href="https://www.clipzui.com/video/q2d495o4h3o4q3o4p5a4w4.html">
        <div class="item">
          <div class="thumb">
            <img src="https://i.ytimg.com/vi/3MGew-4Cbs8/mqdefault.jpg" alt="Pickup Basketball Stereotypes" />
            <span class="video-time">5:28</span>
          </div>
          <h2 class="name" title="Pickup Basketball Stereotypes">Veneno - Todo Cambio</h2>
          <span class="user_ytb"><i class="fa fa-user-circle-o"></i> Admin</span>
          <span class="meta-video">
            <span class="info">
              <i class="fa fa-eye"></i> 67.819.500 views<span class="cham"></span>4 year ago
            </span>
          </span>
        </div>
      </a>
    </li> --}}
  </ul>
</div>

<script>"function"==typeof history.replaceState&&history.replaceState({"type":"category","data":"r213a643x4x5p4o406x5s4"},"",window.location.href);</script>
</div>
</div>

    <footer>
        <div class="container">
            <p class="text">Gamma - Bolivia&copy; 2018</p>
        </div>
    </footer>

<div class="back-fixed">
<a id="scrolltop" class="back-to-top" href="javascript:;"><i class="fa fa-arrow-up"></i></a>
</div>
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}" type="text/css" media="all" />
<script src="{{ asset('js/jquery-ui.js')}}"></script>

</body>
</html>
