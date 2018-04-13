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
            <form class="form-wrapper cf" method="get" action="{{ url('search')}}">
                 <input id="autocomplete" autocomplete="off" type="text" placeholder="Buscar..." name="key" required>
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
                      Salir |
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
                <form class="form-wrapper cf" method="get" action="{{ url('search')}}">
                     <input id="autocomplete" autocomplete="off" required type="text" placeholder="Buscar..." name="key">
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
              <li><a href="{{ url('categorias/'.$c->id ) }}"><i class="fa fa-film"></i>{{ $c->nombre}}</a></li>
            @endforeach

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
            <a id="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"  title="Share on Facebook" onclick="window.open(this.href,'Facebook','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=560,height=660'); return false;" rel="nofollow">
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
    <i class="fa fa-eye"></i> {{ $video->visitas }} Visitas
  </span>
  <span class="cham"></span>
  <span>
      <i class="fa fa-arrow-up"></i> Subido  {{ \FormatTime::LongTimeFilter($video->created_at) }}
  </span>

</div>
<div class="description">
  <h2 class="desc">
    {{ $video->description }}
  </h2>
<div class="video-tag">
  <h3><a href="#" rel="tag">{{ $video->categoria->nombre }} </a></h3>
</div>
</div>
</div>

<div id="box_comment" class="comments">
  <div class="tabs">
    <div class="tab" data-count="40" data-vid="h494u4m3h4r5o3n3c5c5g4" data-url="https://www.clipzui.com/video/h494u4m3h4r5o3n3c5c5g4.html" data-show="open"><i class="fa fa-comments"></i>Comentarios <span class="comment-down"><i class="fa fa-caret-up"></i></span></div>
  </div>
  <div class="list tab comments" style="display: block;">
    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%"  data-numposts="10" data-colorscheme="dark"></div>
  </div>

</div>
</div>
<div class="sidebar">
	<div id="box_ads_desktop" style="background-color:#333;border-bottom:1px dashed #777;">
    <img src="{{ asset('img/pub.jpg') }}" alt="" width="100%" height="auto">
  </div>
	<div class="related">
		<ul class="video-list clearfix">
      @foreach ($otros as $o)
        <li>
          <a id="ajax" href="{{ url('video/'.$o->id) }}">
            <div class="video-thumb">
              <img src="{{ url('imagen/'.$o->image) }}" alt="{{ $o->tittle}}" >
              <span class="video-time">{{ $o->duration }}</span>
            </div>
            <div class="info-meta">
              <div class="name" title="{{ $o->tittle }}">{{ $o->tittle }}</div>
              <div class="info">
                <div class="user">
                  <i class="fa fa-user-circle-o"></i> {{ \FormatTime::LongTimeFilter($o->created_at) }}
                </div>
                <div class="views">
                  <i class="fa fa-eye"></i> {{ $o->visitas }}
                </div>
              </div>
            </div>
          </a>
        </li>
      @endforeach

    </ul>
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
<script src="{{ asset('js/jquery.min.js' )}}"></script>
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}" type="text/css" media="all" />
<script src="{{ asset('js/jquery-ui.js')}}"></script>

<script src="http://vjs.zencdn.net/6.6.3/video.js"></script>

<script>function loadplayer(e,i){$(".video-container").html('<div id="'+i+'"></div>'),setTimeout(function(){load_player(e,i)},100)};function scrolltop(){$(window).scroll(function(){$(this).scrollTop()>500?$(".back-fixed").fadeIn(600):$(".back-fixed").fadeOut(600)}),$("#scrolltop").click(function(o){return o.preventDefault(),$("html, body").animate({scrollTop:0},600),!1})};function related_vid(e){$(".loadmore").length>0&&$(".loadmore").html('<div style="text-align:center;padding:10px 0;"><i class="fa fa-spinner fa-spin"></i></div>'),$.get("https://www.clipzui.com/ajax/video",e).done(function(s){if(e.ajax){$(".loadmore").remove(),$(".related").html(s)}else{$("ul.video-list").append(s),$(".loadmore").remove()}})};function comment_vid(e){$.get("https://www.clipzui.com/ajax/video",e).done(function(s){$("#ytbcomment").html(s)})};var suggestCallBack,MsuggestCallBack;$(function(){$("#ytbcomment").load("https://www.clipzui.com/ajax/video?id=comments&vid=h494u4m3h4r5o3n3c5c5g4");scrolltop();function a(){e.toggleClass(j),d.toggleClass(i),f.toggleClass(k),g.toggleClass(l)}function b(){e.addClass(j),d.animate({left:"0px"},n),f.animate({left:o},n),g.animate({left:o},n)}function c(){e.removeClass(j),d.animate({left:"-"+o},n),f.animate({left:"0px"},n),g.animate({left:"0px"},n)}var d=$(".pushy"),e=$("body"),f=$("#container"),g=$(".push"),h=$(".site-overlay"),i="pushy-left pushy-open",j="pushy-active",k="container-push",l="push-push",m=$("#menu-btn, .pushy a"),n=200,o=d.width()+"px";if(cssTransforms3d=function(){var a=document.createElement("p"),b=!1,c={webkitTransform:"-webkit-transform",OTransform:"-o-transform",msTransform:"-ms-transform",MozTransform:"-moz-transform",transform:"transform"};document.body.insertBefore(a,null);for(var d in c)void 0!==a.style[d]&&(a.style[d]="translate3d(1px,1px,1px)",b=window.getComputedStyle(a).getPropertyValue(c[d]));return document.body.removeChild(a),void 0!==b&&b.length>0&&"none"!==b}())m.click(function(){a()}),h.click(function(){a()});else{d.css({left:"-"+o}),f.css({"overflow-x":"hidden"});var p=!0;m.click(function(){p?(b(),p=!1):(c(),p=!0)}),h.click(function(){p?(b(),p=!1):(c(),p=!0)})};$("#nav-mobile .search a").click(function(){$('#nav-mobile .navbar-search').addClass('hide'),$('#nav-mobile .headbar-m-search').removeClass('hide'),$('#m-autocomplete').focus()});$("#nav-mobile .back-search a").click(function(){$('#nav-mobile .navbar-search').removeClass('hide'),$('#nav-mobile .headbar-m-search').addClass('hide'),$('#m-autocomplete').focusout()});$(document).on("click",".video-info .title-vid",function(){return void 0!==$(this).data("show")&&"close"==$(this).data("show")?($(".title-vid .less").html('<i class="fa fa-caret-down"></i>'),$(".video-info .description").css({height:"0"}),$(this).data("show","open")):void 0!==$(this).data("show")&&"open"==$(this).data("show")&&($(".title-vid .less").html('<i class="fa fa-caret-up"></i>'),$(".video-info .description").removeClass("less").css({height:"auto"}),$(this).data("show","close")),!1});$(document).on("click",".tabs .tab",function(){"hide"==$(this).data("show")?($(this).data("show","open"),$("#box_comment .list.tab").css({display:"block"}),$("#box_comment span.comment-down").html('<i class="fa fa-caret-up"></i>')):($(this).data("show","hide"),$("#box_comment .list.tab").css({display:"none"}),$("#box_comment span.comment-down").html('<i class="fa fa-caret-down"></i>'))});$("#autocomplete").autocomplete({source:function(request,response){$.getJSON("https://suggestqueries.google.com/complete/search?callback=?",{"ds":"yt","jsonp":"suggestCallBack","q":request.term,"client":"youtube"});suggestCallBack=function(data){var suggestions=[];$.each(data[1],function(key,val){suggestions.push({"value":val[0]})});response(suggestions)}},select:function(event,ui){window.location.href='https://www.clipzui.com/search?k='+encodeURI(ui.item.value).replace(/%20/g,'+')}});$("#m-autocomplete").autocomplete({source:function(request,response){$.getJSON("https://suggestqueries.google.com/complete/search?callback=?",{"ds":"yt","jsonp":"MsuggestCallBack","q":request.term,"client":"youtube"});MsuggestCallBack=function(data){var suggestions=[];$.each(data[1],function(key,val){suggestions.push({"value":val[0]})});suggestions.length = 5;response(suggestions)}},select:function(event,ui){window.location.href='https://www.clipzui.com/search?k='+encodeURI(ui.item.value).replace(/%20/g,'+')}});$(document).on("click","a#ajax",function(){var t=$(this).data("ytb-id"),e=$(this).data("vid-id"),i=$(this).attr("href");return loadplayer(t,e),$(".video-info").empty(),$(".comments").empty(),$(".related").html('<div style="text-align:center;padding:10px 0;"><i class="fa fa-spinner fa-spin"></i></div>'),$("html, body").animate({scrollTop:0},0),$.getJSON("https://www.clipzui.com/ajax/video?id=vid_info&vid="+e).done(function(a){a.error?window.location="https://www.clipzui.com/video/"+e+".html":("function"==typeof history.pushState&&history.pushState({ytbId:t,vidId:e},a.meta.title,i),$("head").find("title").text(a.meta.title),$(".video-info").html(a.html),$(".comments").html(a.comments),$(".related").load("https://www.clipzui.com/ajax/video?id=related&vid="+e),$("#ytbcomment").load("https://www.clipzui.com/ajax/video?id=comments&vid="+e),$.each(a.meta.meta,function(t,e){$.each(e,function(e,i){$("meta["+t+'="'+e+'"]').attr("content",i)})}),$.each(a.meta.link,function(t,e){$.each(e,function(e,i){$("head").find("link["+t+'="'+e+'"]').attr("href",i)})}),$.each(a.share.link,function(t,e){$(".video-share").find("a#"+t).attr("href",e)}),"function"==typeof ga&&ga("send","pageview",location.pathname),"undefined"!=typeof FB&&FB.XFBML.parse())}),!1}),$(window).on("popstate",function(t){var e=t.originalEvent.state;null!==e&&"object"==typeof e&&(loadplayer(e.ytbId,e.vidId),$(".video-info").empty(),$(".comments").empty(),$(".related").html('<div style="text-align:center;padding:10px 0;"><i class="fa fa-spinner fa-spin"></i></div>'),$("html, body").animate({scrollTop:0},0),$.getJSON("https://www.clipzui.com/ajax/video?id=vid_info&vid="+e.vidId).done(function(t){t.error?window.location="https://www.clipzui.com/video/"+e.vidId+".html":($("head").find("title").text(t.meta.title),$(".video-info").html(t.html),$(".related").load("https://www.clipzui.com/ajax/video?id=related&vid="+e.vidId),$(".comments").html(t.comments),$("#ytbcomment").load("https://www.clipzui.com/ajax/video?id=comments&vid="+e.vidId),$.each(t.meta.meta,function(t,e){$.each(e,function(e,i){$("meta["+t+'="'+e+'"]').attr("content",i)})}),$.each(t.meta.link,function(t,e){$.each(e,function(e,i){$("head").find("link["+t+'="'+e+'"]').attr("href",i)})}),$.each(t.share.link,function(t,e){$(".video-share").find("a#"+t).attr("href",e)}),"function"==typeof ga&&ga("send","pageview",location.pathname),"undefined"!=typeof FB&&FB.XFBML.parse())}))})});</script>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12&appId=216607665588598&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>
