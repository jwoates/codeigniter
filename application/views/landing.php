<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SDCC App</title>
  <link href="/resources/css/application.css" rel="stylesheet" type="text/css" media="screen" />
 	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script> 
  <script type="text/javascript" src="/resources/js/mootools-more-1.4.0.1.js"></script> 
  <script type="text/javascript" src="/resources/js/application.js"></script> 
</head>
  <body onload="resize();" >
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '<?php echo $app_id; ?>',
        status     : true,
        cookie     : true,
        oauth      : true,
        xfbml      : true
      });
    };

    (function(d){
       var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
       js = d.createElement('script'); js.id = id; js.async = true;
       js.src = "//connect.facebook.net/en_US/all.js";
       d.getElementsByTagName('head')[0].appendChild(js);
     }(document));

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=180523668723011";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

  </script>

<div id="container">
	<h1>SDCC</h1>

	<div id="body">
    <?php
    print("<pre>".print_r($fb_data['me'],true)."</pre>");
    ?>

    
  <h3>Video Playlist</h3>
    <div class="slideshow"> 
      <?php
        $photos =  $fb_photos;
        foreach ($photos->data as $key=>$value) {
          //print("<pre>".print_r($value->source,true)."</pre>");
          echo '<img height="50" width="50" src="' . $value->source . '" />';
        }
      ?>
    </div>



  <h3>Video Playlist</h3>
    <!-- video player -->
    <div class="alpha">
      <div id="video-wrap" class="yt">
        <iframe frameborder="0" allowfullscreen="" id="yt-video-player" class="yt" title="YouTube video player" height="327" width="536" src="https://www.youtube.com/embed/nsWyP0LBikI?wmode=transparent&amp;rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fe3-2012.herokuapp.com"></iframe>
        <span class="video-title">das videoslogen!</span>
      </div>
    </div>

    <!-- video list -->
    <div class="beta">
      <div id="yt-video-list" class="media-list yt" style="display: block; ">
      <?php
        foreach ($playlist as $key => $value) {
          echo '<a style="display:block;" href="#" data-yt-id="' . $value['id'] .'" ><img src="//img.youtube.com/vi/' . $value['id'] . '/default.jpg" /><span>' . $value['title'] . '</span></a>';
        }
      ?>
			</div>
    </div>
    <div class="clear">&nbsp;</div>

    Time: <?php echo $this->benchmark->elapsed_time(); ?>
    <br />
    Mem: <?php echo $this->benchmark->memory_usage(); ?>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>

<script src="//www.youtube.com/player_api" type="text/javascript" charset="utf-8" async="" defer=""></script>
<script type="text/javascript" src="/resources/js/application.js"></script> 
  <script>
    function resize() {
      FB.Canvas.setAutoResize();
    }
  </script>
</body>
</html>