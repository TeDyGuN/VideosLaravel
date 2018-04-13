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

  <script src="{{ asset('js/jquery.min.js' )}}"></script>
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
<h3><i class="fa fa-indent"></i> Categorias</h3><span class="close"><a href="javascript:;"><i class="fa fa-times"></i></a></span>
<ul>
  @foreach ($categorias as $c)
    <li><a href="#"><i class="fa fa-film"></i>{{ $c->nombre}}</a></li>
  @endforeach
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
<script>function scrolltop(){$(window).scroll(function(){$(this).scrollTop()>500?$(".back-fixed").fadeIn(600):$(".back-fixed").fadeOut(600)}),$("#scrolltop").click(function(o){return o.preventDefault(),$("html, body").animate({scrollTop:0},600),!1})};var suggestCallBack,MsuggestCallBack;$(function(){scrolltop();function a(){e.toggleClass(j),d.toggleClass(i),f.toggleClass(k),g.toggleClass(l)}function b(){e.addClass(j),d.animate({left:"0px"},n),f.animate({left:o},n),g.animate({left:o},n)}function c(){e.removeClass(j),d.animate({left:"-"+o},n),f.animate({left:"0px"},n),g.animate({left:"0px"},n)}var d=$(".pushy"),e=$("body"),f=$("#container"),g=$(".push"),h=$(".site-overlay"),i="pushy-left pushy-open",j="pushy-active",k="container-push",l="push-push",m=$("#menu-btn, .pushy a"),n=200,o=d.width()+"px";if(cssTransforms3d=function(){var a=document.createElement("p"),b=!1,c={webkitTransform:"-webkit-transform",OTransform:"-o-transform",msTransform:"-ms-transform",MozTransform:"-moz-transform",transform:"transform"};document.body.insertBefore(a,null);for(var d in c)void 0!==a.style[d]&&(a.style[d]="translate3d(1px,1px,1px)",b=window.getComputedStyle(a).getPropertyValue(c[d]));return document.body.removeChild(a),void 0!==b&&b.length>0&&"none"!==b}())m.click(function(){a()}),h.click(function(){a()});else{d.css({left:"-"+o}),f.css({"overflow-x":"hidden"});var p=!0;m.click(function(){p?(b(),p=!1):(c(),p=!0)}),h.click(function(){p?(b(),p=!1):(c(),p=!0)})};$("#nav-mobile .search a").click(function(){$('#nav-mobile .navbar-search').addClass('hide'),$('#nav-mobile .headbar-m-search').removeClass('hide'),$('#m-autocomplete').focus()});$("#nav-mobile .back-search a").click(function(){$('#nav-mobile .navbar-search').removeClass('hide'),$('#nav-mobile .headbar-m-search').addClass('hide'),$('#m-autocomplete').focusout()});$(".dropbtn").click(function(o){o.stopPropagation(),$(".dropdown-content").toggleClass("dropdown-show")});$(document).click(function(o){$(o.target).closest(".dropbtn").length||$(".dropdown-content").removeClass("dropdown-show")});$("#autocomplete").autocomplete({source:function(request,response){$.getJSON("https://suggestqueries.google.com/complete/search?callback=?",{"ds":"yt","jsonp":"suggestCallBack","q":request.term,"client":"youtube"});suggestCallBack=function(data){var suggestions=[];$.each(data[1],function(key,val){suggestions.push({"value":val[0]})});response(suggestions)}},select:function(event,ui){window.location.href='https://www.clipzui.com/search?k='+encodeURI(ui.item.value).replace(/%20/g,'+')}});$("#m-autocomplete").autocomplete({source:function(request,response){$.getJSON("https://suggestqueries.google.com/complete/search?callback=?",{"ds":"yt","jsonp":"MsuggestCallBack","q":request.term,"client":"youtube"});MsuggestCallBack=function(data){var suggestions=[];$.each(data[1],function(key,val){suggestions.push({"value":val[0]})});suggestions.length = 5;response(suggestions)}},select:function(event,ui){window.location.href='https://www.clipzui.com/search?k='+encodeURI(ui.item.value).replace(/%20/g,'+')}});$(document).on("click",'a[rel="next"]',function(){return"function"==typeof history.pushState&&history.pushState($(this).data("ajax"),"",$(this).attr("href")),$(".scroller-status").css({display:"block"}),$("html,body").animate({scrollTop:0},0),$("#ajax-items").empty(),$.ajax({type:"GET",url:"https://www.clipzui.com/ajax/list-video",data:$(this).data("ajax"),dataType:"html",success:function(t){$("#ajax-items").html(t),$(".scroller-status").css({display:"none"})},error:function(){$("#ajax-items").html('<div style="margin:20px 0;text-align:center;color:#ccc;">Error loading, Try reload page.</div>'),$(".scroller-status").css({display:"none"})}}),!1});$(window).on("popstate",function(t){var a=t.originalEvent.state;null!==a&&"object"==typeof a&&($(".scroller-status").css({display:"block"}),$("#ajax-items").empty(),$.ajax({type:"GET",url:"https://www.clipzui.com/ajax/list-video",data:a,dataType:"html",success:function(t){$("#ajax-items").html(t),$(".scroller-status").css({display:"none"})},error:function(){$("#ajax-items").html('<div style="margin:20px 0;text-align:center;color:#ccc;">Error loading, Try reload page.</div>'),$(".scroller-status").css({display:"none"})}}))})});</script>
<script type="text/javascript">
</body>
</html>
