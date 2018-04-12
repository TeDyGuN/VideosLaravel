
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="theme-color" content="#333333" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>{{ $video->tittle }}</title>

  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('plantilla/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/video.css')}}" type="text/css" media="all" />
  <link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/helpers.css')}}" type="text/css" media="all" />

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

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
          			<input id="m-autocomplete" autocomplete="off" type="text" placeholder="Buscar..." name="k">
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

      <div id="top" class="container clearfix">
        <div class="box-player">
          <div class="video-container">
            <video id="my-video" class="video-js" controls preload="auto" width="100%" height="auto"
            poster="{{ url('imagen/'.$video->image) }}" data-setup="{}">
            <source src="{{ url('getVideo/'.$video->video_path)}}" type='video/mp4'>

            <p class="vjs-no-js">
              To view this video please enable JavaScript, and consider upgrading to a web browser that
              <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
          </video>
        </div>

      <div class="video-share">
        <ul>
          <li>
            <a id="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.clipzui.com%2Fvideo%2Fh494u4m3h4r5o3n3c5c5g4.html" title="Share on Facebook" onclick="window.open(this.href,'Facebook','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=560,height=660'); return false;" rel="nofollow">
              <div class="facebook">
                <i class="fa fa-facebook"></i>
                <div class="text">
                  <span>Compartir en  </span>Facebook
                </div>
              </div>
            </a>
          </li>
          <li>
            <a id="twitter" href="https://www.twitter.com/share?url=https%3A%2F%2Fwww.clipzui.com%2Fvideo%2Fh494u4m3h4r5o3n3c5c5g4.html" title="Share on Twitter" onclick="window.open(this.href,'Twitter','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=520,height=500'); return false;" rel="nofollow">
              <div class="twitter">
                <i class="fa fa-twitter"></i>
                <div class="text">
                  <span>Compartir en Twitter</span>Twitter
                </div>
              </div>
            </a>
          </li>
          <li>
            <a id="google-plus" href="https://plus.google.com/share?url=https%3A%2F%2Fwww.clipzui.com%2Fvideo%2Fh494u4m3h4r5o3n3c5c5g4.html" title="Share on Google plus" onclick="window.open(this.href,'Google','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=550'); return false;" rel="nofollow">
              <div class="google-plus">
                <i class="fa fa-google-plus"></i>
                <div class="text">
                  <span>Compartir en </span>Google plus
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="video-info">
<div class="title-vid" role="button" data-show="close">
  <span class="less">
    <i class="fa fa-caret-up"></i>
  </span>
  <h1 class="name">{{ $video->tittle }}<small>{{ $video->duration }}</small></h1>
</div><div class="info">
  <span>
    <i class="fa fa-user-circle-o"></i>
    <a href="https://www.clipzui.com/channel?Id=r3d3m5o203w5o3n3d4y4x2o4n594n48406d415w423g423t3x4k4t4c316m4w5s4f2q3c4w5e4y5">Funny Vines
    </a>
  </span>
  <span class="cham"></span>
  <span>
    <i class="fa fa-eye"></i> {{ $video->visitas }} Visitas
    - Subido  {{ \FormatTime::LongTimeFilter($video->created_at) }}
  </span>
</div>
<div class="description">
  <h2 class="desc">
    {{ $video->description }}
  </h2>
<div class="video-tag">
  <h3><a href="#" rel="tag">{{ $video->categoria }} </a></h3>
</div>
</div>
</div>

<div id="box_comment" class="comments">
<div class="tabs">
<div class="tab" data-count="40" data-vid="h494u4m3h4r5o3n3c5c5g4" data-url="https://www.clipzui.com/video/h494u4m3h4r5o3n3c5c5g4.html" data-show="open"><i class="fa fa-comments"></i> 40 comments <span class="comment-down"><i class="fa fa-caret-up"></i></span></div>
</div>
<div class="list tab comments" style="display: block;">
<div class="fbcomment"><div class="fb-comments" data-href="https://www.clipzui.com/video/h494u4m3h4r5o3n3c5c5g4.html" data-width="100%" data-numposts="10" data-colorscheme="dark"></div></div>
<div id="ytbcomment"></div>
</div>
</div>
</div>
<div class="sidebar">
	<div id="box_ads_desktop" style="background-color:#333;border-bottom:1px dashed #777;"><div id="M288989ScriptRootC188960">
	<div id="M288989PreloadC188960"></div>
	<script>(function(){
	var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
	var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M288989ScriptRootC188960")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
	catch(e){var iw=d;var c=d[gi]("M288989ScriptRootC188960");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=188960;c[ac](dv);
	var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/c/l/clipzui.com.188960.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();</script>
</div></div>
	<div class="related">
		<ul class="video-list clearfix"><li><a id="ajax" href="https://www.clipzui.com/video/b4w29414u3j5i484d4m5g4.html" data-ytb-id="i23aUei_7ig" data-vid-id="b4w29414u3j5i484d4m5g4"><div class="video-thumb"><img src="https://i.ytimg.com/vi/i23aUei_7ig/mqdefault.jpg" alt="*Try Not To Laugh Challenge* Funny Kids Vines Compilation 2016 | Funniest Kids Videos"><span class="video-time">14:02</span></div><div class="info-meta"><div class="name" title="*Try Not To Laugh Challenge* Funny Kids Vines Compilation 2016 | Funniest Kids Videos">*Try Not To Laugh Challenge* Funny Kids Vines Compilation 2016 | Funniest Kids Videos</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> All Of Vines</div><div class="views"><i class="fa fa-eye"></i> 49.8M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/q4u236s3v33613f48625e3.html" data-ytb-id="x0uXVy4fzUA" data-vid-id="q4u236s3v33613f48625e3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/x0uXVy4fzUA/mqdefault.jpg" alt="Best Vines of All Time Vine Compilation | Funny Vine 2017"><span class="video-time">12:22</span></div><div class="info-meta"><div class="name" title="Best Vines of All Time Vine Compilation | Funny Vine 2017">Best Vines of All Time Vine Compilation | Funny Vine 2017</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Funny Vines</div><div class="views"><i class="fa fa-eye"></i> 7M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/m3m4r563m3x5s4u466z4m3.html" data-ytb-id="PpiBMssuxRI" data-vid-id="m3m4r563m3x5s4u466z4m3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/PpiBMssuxRI/mqdefault.jpg" alt="TRY NOT TO LAUGH or GRIN: Funny Fails Compilation 2017 | Best Fails Vines of May 2017"><span class="video-time">10:05</span></div><div class="info-meta"><div class="name" title="TRY NOT TO LAUGH or GRIN: Funny Fails Compilation 2017 | Best Fails Vines of May 2017">TRY NOT TO LAUGH or GRIN: Funny Fails Compilation 2017 | Best Fails Vines of May 2017</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Life Awesome</div><div class="views"><i class="fa fa-eye"></i> 49.6M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/p3z2x5m3y255r4y346r4o4.html" data-ytb-id="S5oR5WrUvJo" data-vid-id="p3z2x5m3y255r4y346r4o4"><div class="video-thumb"><img src="https://i.ytimg.com/vi/S5oR5WrUvJo/mqdefault.jpg" alt="TRY NOT TO LAUGH WATCHING - Funny Kids Videos Compilation 2017 | Funny Vine"><span class="video-time">14:47</span></div><div class="info-meta"><div class="name" title="TRY NOT TO LAUGH WATCHING - Funny Kids Videos Compilation 2017 | Funny Vine">TRY NOT TO LAUGH WATCHING - Funny Kids Videos Compilation 2017 | Funny Vine</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Funny Vines</div><div class="views"><i class="fa fa-eye"></i> 11.4M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/i3i386o4f4b4z2t3n4w413.html" data-ytb-id="LHzxj92PAO4" data-vid-id="i3i386o4f4b4z2t3n4w413"><div class="video-thumb"><img src="https://i.ytimg.com/vi/LHzxj92PAO4/mqdefault.jpg" alt="Top WATER SLIDE Fails Compilation | Funny Vines"><span class="video-time">10:30</span></div><div class="info-meta"><div class="name" title="Top WATER SLIDE Fails Compilation | Funny Vines">Top WATER SLIDE Fails Compilation | Funny Vines</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Funny Vines</div><div class="views"><i class="fa fa-eye"></i> 3.1M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/a3p3q4g3e36513z486t4u3.html" data-ytb-id="DODLEX4zzLQ" data-vid-id="a3p3q4g3e36513z486t4u3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/DODLEX4zzLQ/mqdefault.jpg" alt="WATCH and TRY TO STOP LAUGHING - Super FUNNY VIDEOS compilation"><span class="video-time">10:02</span></div><div class="info-meta"><div class="name" title="WATCH and TRY TO STOP LAUGHING - Super FUNNY VIDEOS compilation">WATCH and TRY TO STOP LAUGHING - Super FUNNY VIDEOS compilation</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Tiger Productions</div><div class="views"><i class="fa fa-eye"></i> 39M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/93e4b5s3b4s5m4y4a575y3.html" data-ytb-id="ChYXfnmyXZU" data-vid-id="93e4b5s3b4s5m4y4a575y3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/ChYXfnmyXZU/mqdefault.jpg" alt="Best funny videos 2017 ● People doing stupid things compilation P1"><span class="video-time">10:35</span></div><div class="info-meta"><div class="name" title="Best funny videos 2017 ● People doing stupid things compilation P1">Best funny videos 2017 ● People doing stupid things compilation P1</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Vines best fun</div><div class="views"><i class="fa fa-eye"></i> 13.6M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/8474o5q20355z2f3r5y5u3.html" data-ytb-id="faf27W2BiuQ" data-vid-id="8474o5q20355z2f3r5y5u3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/faf27W2BiuQ/mqdefault.jpg" alt="*IF YOU LAUGH , YOU LOSE*   98% WILL FAIL!"><span class="video-time">10:00</span></div><div class="info-meta"><div class="name" title="*IF YOU LAUGH , YOU LOSE*   98% WILL FAIL!">*IF YOU LAUGH , YOU LOSE*   98% WILL FAIL!</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> FailsAndVines</div><div class="views"><i class="fa fa-eye"></i> 7M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/o3a4u4u2z3z4u2h4e4a4c4.html" data-ytb-id="RdH6ZQ-h89c" data-vid-id="o3a4u4u2z3z4u2h4e4a4c4"><div class="video-thumb"><img src="https://i.ytimg.com/vi/RdH6ZQ-h89c/mqdefault.jpg" alt="Ultimate VIRAL PRANKS &amp; PRANKS GONE WRONG Compilation 2017 | Funny Vine"><span class="video-time">13:35</span></div><div class="info-meta"><div class="name" title="Ultimate VIRAL PRANKS &amp; PRANKS GONE WRONG Compilation 2017 | Funny Vine">Ultimate VIRAL PRANKS & PRANKS GONE WRONG Compilation 2017 | Funny Vine</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Funny Vines</div><div class="views"><i class="fa fa-eye"></i> 827.7K views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/m433t5r21394w4x4p56553.html" data-ytb-id="t9k387wxgY8" data-vid-id="m433t5r21394w4x4p56553"><div class="video-thumb"><img src="https://i.ytimg.com/vi/t9k387wxgY8/mqdefault.jpg" alt="BEST MEMES COMPILATION V13"><span class="video-time">10:11</span></div><div class="info-meta"><div class="name" title="BEST MEMES COMPILATION V13">BEST MEMES COMPILATION V13</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Freememeskids</div><div class="views"><i class="fa fa-eye"></i> 103.7K views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/h4k48493x2h5m4z415r5o4.html" data-ytb-id="on2E4cmzOno" data-vid-id="h4k48493x2h5m4z415r5o4"><div class="video-thumb"><img src="https://i.ytimg.com/vi/on2E4cmzOno/mqdefault.jpg" alt="Try Not to Laugh or Grin Watching Ultimate King Bach Funny Skits Compilation - Co Vines✔"><span class="video-time">34:13</span></div><div class="info-meta"><div class="name" title="Try Not to Laugh or Grin Watching Ultimate King Bach Funny Skits Compilation - Co Vines✔">Try Not to Laugh or Grin Watching Ultimate King Bach Funny Skits Compilation - Co Vines✔</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Co Vines</div><div class="views"><i class="fa fa-eye"></i> 12.9M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/64n4n5k4o4y4d404a4r553.html" data-ytb-id="dqetsPdW4n8" data-vid-id="64n4n5k4o4y4d404a4r553"><div class="video-thumb"><img src="https://i.ytimg.com/vi/dqetsPdW4n8/mqdefault.jpg" alt="vines that cured my cancer"><span class="video-time">14:25</span></div><div class="info-meta"><div class="name" title="vines that cured my cancer">vines that cured my cancer</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Banana Jin</div><div class="views"><i class="fa fa-eye"></i> 8.9M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/q23365o4r454y333m5i5y3.html" data-ytb-id="09Txv3U6deU" data-vid-id="q23365o4r454y333m5i5y3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/09Txv3U6deU/mqdefault.jpg" alt="compilation that cures depression af"><span class="video-time">10:20</span></div><div class="info-meta"><div class="name" title="compilation that cures depression af">compilation that cures depression af</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Lifeples</div><div class="views"><i class="fa fa-eye"></i> 353.6K views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/74z275n4e3v504i4x4a4k4.html" data-ytb-id="e5UwEqWiK9k" data-vid-id="74z275n4e3v504i4x4a4k4"><div class="video-thumb"><img src="https://i.ytimg.com/vi/e5UwEqWiK9k/mqdefault.jpg" alt="TRY NOT TO LAUGH or GRIN Watching Best Mighty Duck Vines Compilation 2017 - Co Viners"><span class="video-time">34:15</span></div><div class="info-meta"><div class="name" title="TRY NOT TO LAUGH or GRIN Watching Best Mighty Duck Vines Compilation 2017 - Co Viners">TRY NOT TO LAUGH or GRIN Watching Best Mighty Duck Vines Compilation 2017 - Co Viners</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Co Viners</div><div class="views"><i class="fa fa-eye"></i> 14.1M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/q3p356j474m5u2v456o5g4.html" data-ytb-id="TOwsbh-vwkg" data-vid-id="q3p356j474m5u2v456o5g4"><div class="video-thumb"><img src="https://i.ytimg.com/vi/TOwsbh-vwkg/mqdefault.jpg" alt="Ultimate PRANK Compilation | Pranks Gone Wrong | Funny Vines March 2018"><span class="video-time">10:29</span></div><div class="info-meta"><div class="name" title="Ultimate PRANK Compilation | Pranks Gone Wrong | Funny Vines March 2018">Ultimate PRANK Compilation | Pranks Gone Wrong | Funny Vines March 2018</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Funny Vines</div><div class="views"><i class="fa fa-eye"></i> 4.3M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/r4g375u3z3w534u494s4u3.html" data-ytb-id="yFUZZrZu3KQ" data-vid-id="r4g375u3z3w534u494s4u3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/yFUZZrZu3KQ/mqdefault.jpg" alt="😂Monthly funny videos 2018, Best Fail &amp; Win Compilation"><span class="video-time">10:55</span></div><div class="info-meta"><div class="name" title="😂Monthly funny videos 2018, Best Fail &amp; Win Compilation">😂Monthly funny videos 2018, Best Fail & Win Compilation</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> VERY FUNNY VIDEOS</div><div class="views"><i class="fa fa-eye"></i> 192.7K views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/o3h316z3b334y4a4s5h5u3.html" data-ytb-id="RGs_B1yajdQ" data-vid-id="o3h316z3b334y4a4s5h5u3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/RGs_B1yajdQ/mqdefault.jpg" alt="Bad Day at Work Compilation 2017 || Best Funny Work Fails Compilation 2017"><span class="video-time">10:56</span></div><div class="info-meta"><div class="name" title="Bad Day at Work Compilation 2017 || Best Funny Work Fails Compilation 2017">Bad Day at Work Compilation 2017 || Best Funny Work Fails Compilation 2017</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Forfuntv</div><div class="views"><i class="fa fa-eye"></i> 6.7M views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/q2j3w5b3f394m3j316k5i3.html" data-ytb-id="0InGF7IFsgE" data-vid-id="q2j3w5b3f394m3j316k5i3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/0InGF7IFsgE/mqdefault.jpg" alt="TRY NOT TO LAUGH CHALLENGE - Epic KIDS FAILS Compilation | Funny Vines April 2018"><span class="video-time">12:31</span></div><div class="info-meta"><div class="name" title="TRY NOT TO LAUGH CHALLENGE - Epic KIDS FAILS Compilation | Funny Vines April 2018">TRY NOT TO LAUGH CHALLENGE - Epic KIDS FAILS Compilation | Funny Vines April 2018</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Funny Vines</div><div class="views"><i class="fa fa-eye"></i> 223K views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/f4d3y4l344s4y4f3x5o4q3.html" data-ytb-id="mCLQ_JyBoGM" data-vid-id="f4d3y4l344s4y4f3x5o4q3"><div class="video-thumb"><img src="https://i.ytimg.com/vi/mCLQ_JyBoGM/mqdefault.jpg" alt="Beyond Vine compilation April 2018 (Part 1) Funny Vines &amp; Instagram Videos 2018"><span class="video-time">19:09</span></div><div class="info-meta"><div class="name" title="Beyond Vine compilation April 2018 (Part 1) Funny Vines &amp; Instagram Videos 2018">Beyond Vine compilation April 2018 (Part 1) Funny Vines & Instagram Videos 2018</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> CooL Vines</div><div class="views"><i class="fa fa-eye"></i> 274.1K views</div></div></div></a></li><li><a id="ajax" href="https://www.clipzui.com/video/c41366x22354x33465q413.html" data-ytb-id="j7x993TZTI4" data-vid-id="c41366x22354x33465q413"><div class="video-thumb"><img src="https://i.ytimg.com/vi/j7x993TZTI4/mqdefault.jpg" alt="Funny Vines MelvinGregg Compilation - Best Vines 2016"><span class="video-time">10:08</span></div><div class="info-meta"><div class="name" title="Funny Vines MelvinGregg Compilation - Best Vines 2016">Funny Vines MelvinGregg Compilation - Best Vines 2016</div><div class="info"><div class="user"><i class="fa fa-user-circle-o"></i> Funny Vines</div><div class="views"><i class="fa fa-eye"></i> 839.7K views</div></div></div></a></li></ul><div id="next-page"><div class="loadmore"><div class="buttonload" role="button" onclick="related_vid({id:'related',vid:'h494u4m3h4r5o3n3c5c5g4',key:'93c335l3a3j4'});"><i class="fa fa-arrow-down"></i> <span class="text">SHOW MORE</span> <i class="fa fa-arrow-down"></i></div></div></div>
	</div>
</div>
</div>

    <footer>
      <div class="container">
          <p class="text">Gamma - Bolivia&copy; 2018</p>
      </div>
    </footer>

<div class="back-fixed">
<a id="scrolltop" class="back-to-top" href="javascript: void(0);"><i class="fa fa-arrow-up"></i></a>
</div>
<script src="https://www.clipzui.com/assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.clipzui.com/assets/js/jquery-ui/1.12.1/jquery-ui.css" type="text/css" media="all" />
<script src="https://www.clipzui.com/assets/js/jquery-ui/1.12.1/jquery-ui.js"></script>
<script>function loadplayer(e,i){$(".video-container").html('<div id="'+i+'"></div>'),setTimeout(function(){load_player(e,i)},100)};function scrolltop(){$(window).scroll(function(){$(this).scrollTop()>500?$(".back-fixed").fadeIn(600):$(".back-fixed").fadeOut(600)}),$("#scrolltop").click(function(o){return o.preventDefault(),$("html, body").animate({scrollTop:0},600),!1})};function related_vid(e){$(".loadmore").length>0&&$(".loadmore").html('<div style="text-align:center;padding:10px 0;"><i class="fa fa-spinner fa-spin"></i></div>'),$.get("https://www.clipzui.com/ajax/video",e).done(function(s){if(e.ajax){$(".loadmore").remove(),$(".related").html(s)}else{$("ul.video-list").append(s),$(".loadmore").remove()}})};function comment_vid(e){$.get("https://www.clipzui.com/ajax/video",e).done(function(s){$("#ytbcomment").html(s)})};var suggestCallBack,MsuggestCallBack;$(function(){$("#ytbcomment").load("https://www.clipzui.com/ajax/video?id=comments&vid=h494u4m3h4r5o3n3c5c5g4");scrolltop();function a(){e.toggleClass(j),d.toggleClass(i),f.toggleClass(k),g.toggleClass(l)}function b(){e.addClass(j),d.animate({left:"0px"},n),f.animate({left:o},n),g.animate({left:o},n)}function c(){e.removeClass(j),d.animate({left:"-"+o},n),f.animate({left:"0px"},n),g.animate({left:"0px"},n)}var d=$(".pushy"),e=$("body"),f=$("#container"),g=$(".push"),h=$(".site-overlay"),i="pushy-left pushy-open",j="pushy-active",k="container-push",l="push-push",m=$("#menu-btn, .pushy a"),n=200,o=d.width()+"px";if(cssTransforms3d=function(){var a=document.createElement("p"),b=!1,c={webkitTransform:"-webkit-transform",OTransform:"-o-transform",msTransform:"-ms-transform",MozTransform:"-moz-transform",transform:"transform"};document.body.insertBefore(a,null);for(var d in c)void 0!==a.style[d]&&(a.style[d]="translate3d(1px,1px,1px)",b=window.getComputedStyle(a).getPropertyValue(c[d]));return document.body.removeChild(a),void 0!==b&&b.length>0&&"none"!==b}())m.click(function(){a()}),h.click(function(){a()});else{d.css({left:"-"+o}),f.css({"overflow-x":"hidden"});var p=!0;m.click(function(){p?(b(),p=!1):(c(),p=!0)}),h.click(function(){p?(b(),p=!1):(c(),p=!0)})};$("#nav-mobile .search a").click(function(){$('#nav-mobile .navbar-search').addClass('hide'),$('#nav-mobile .headbar-m-search').removeClass('hide'),$('#m-autocomplete').focus()});$("#nav-mobile .back-search a").click(function(){$('#nav-mobile .navbar-search').removeClass('hide'),$('#nav-mobile .headbar-m-search').addClass('hide'),$('#m-autocomplete').focusout()});$(document).on("click",".video-info .title-vid",function(){return void 0!==$(this).data("show")&&"close"==$(this).data("show")?($(".title-vid .less").html('<i class="fa fa-caret-down"></i>'),$(".video-info .description").css({height:"0"}),$(this).data("show","open")):void 0!==$(this).data("show")&&"open"==$(this).data("show")&&($(".title-vid .less").html('<i class="fa fa-caret-up"></i>'),$(".video-info .description").removeClass("less").css({height:"auto"}),$(this).data("show","close")),!1});$(document).on("click",".tabs .tab",function(){"hide"==$(this).data("show")?($(this).data("show","open"),$("#box_comment .list.tab").css({display:"block"}),$("#box_comment span.comment-down").html('<i class="fa fa-caret-up"></i>')):($(this).data("show","hide"),$("#box_comment .list.tab").css({display:"none"}),$("#box_comment span.comment-down").html('<i class="fa fa-caret-down"></i>'))});$("#autocomplete").autocomplete({source:function(request,response){$.getJSON("https://suggestqueries.google.com/complete/search?callback=?",{"ds":"yt","jsonp":"suggestCallBack","q":request.term,"client":"youtube"});suggestCallBack=function(data){var suggestions=[];$.each(data[1],function(key,val){suggestions.push({"value":val[0]})});response(suggestions)}},select:function(event,ui){window.location.href='https://www.clipzui.com/search?k='+encodeURI(ui.item.value).replace(/%20/g,'+')}});$("#m-autocomplete").autocomplete({source:function(request,response){$.getJSON("https://suggestqueries.google.com/complete/search?callback=?",{"ds":"yt","jsonp":"MsuggestCallBack","q":request.term,"client":"youtube"});MsuggestCallBack=function(data){var suggestions=[];$.each(data[1],function(key,val){suggestions.push({"value":val[0]})});suggestions.length = 5;response(suggestions)}},select:function(event,ui){window.location.href='https://www.clipzui.com/search?k='+encodeURI(ui.item.value).replace(/%20/g,'+')}});$(document).on("click","a#ajax",function(){var t=$(this).data("ytb-id"),e=$(this).data("vid-id"),i=$(this).attr("href");return loadplayer(t,e),$(".video-info").empty(),$(".comments").empty(),$(".related").html('<div style="text-align:center;padding:10px 0;"><i class="fa fa-spinner fa-spin"></i></div>'),$("html, body").animate({scrollTop:0},0),$.getJSON("https://www.clipzui.com/ajax/video?id=vid_info&vid="+e).done(function(a){a.error?window.location="https://www.clipzui.com/video/"+e+".html":("function"==typeof history.pushState&&history.pushState({ytbId:t,vidId:e},a.meta.title,i),$("head").find("title").text(a.meta.title),$(".video-info").html(a.html),$(".comments").html(a.comments),$(".related").load("https://www.clipzui.com/ajax/video?id=related&vid="+e),$("#ytbcomment").load("https://www.clipzui.com/ajax/video?id=comments&vid="+e),$.each(a.meta.meta,function(t,e){$.each(e,function(e,i){$("meta["+t+'="'+e+'"]').attr("content",i)})}),$.each(a.meta.link,function(t,e){$.each(e,function(e,i){$("head").find("link["+t+'="'+e+'"]').attr("href",i)})}),$.each(a.share.link,function(t,e){$(".video-share").find("a#"+t).attr("href",e)}),"function"==typeof ga&&ga("send","pageview",location.pathname),"undefined"!=typeof FB&&FB.XFBML.parse())}),!1}),$(window).on("popstate",function(t){var e=t.originalEvent.state;null!==e&&"object"==typeof e&&(loadplayer(e.ytbId,e.vidId),$(".video-info").empty(),$(".comments").empty(),$(".related").html('<div style="text-align:center;padding:10px 0;"><i class="fa fa-spinner fa-spin"></i></div>'),$("html, body").animate({scrollTop:0},0),$.getJSON("https://www.clipzui.com/ajax/video?id=vid_info&vid="+e.vidId).done(function(t){t.error?window.location="https://www.clipzui.com/video/"+e.vidId+".html":($("head").find("title").text(t.meta.title),$(".video-info").html(t.html),$(".related").load("https://www.clipzui.com/ajax/video?id=related&vid="+e.vidId),$(".comments").html(t.comments),$("#ytbcomment").load("https://www.clipzui.com/ajax/video?id=comments&vid="+e.vidId),$.each(t.meta.meta,function(t,e){$.each(e,function(e,i){$("meta["+t+'="'+e+'"]').attr("content",i)})}),$.each(t.meta.link,function(t,e){$.each(e,function(e,i){$("head").find("link["+t+'="'+e+'"]').attr("href",i)})}),$.each(t.share.link,function(t,e){$(".video-share").find("a#"+t).attr("href",e)}),"function"==typeof ga&&ga("send","pageview",location.pathname),"undefined"!=typeof FB&&FB.XFBML.parse())}))})});</script>
<div id="fb-root"></div>
<script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1501113019946265";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
 (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,"script","https://www.google-analytics.com/analytics.js","ga");
 ga("create", "UA-104308073-1", "auto");
 ga("send", "pageview");
</script>
</body>
</html>
