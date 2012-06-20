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
  	<?php if(!$fb_data['me']): ?>
    	Please login with your FB account: <a target="_parent" href="<?php echo $fb_data['loginUrl']; ?>">login</a>
	  	<div class="fb-login-button" data-show-faces="false" data-width="100" data-max-rows="1" data-scope="email,user_birthday,publish_stream"></div>
  	<?php else: ?>
  		<img src="https://graph.facebook.com/<?php echo $fb_data['uid']; ?>/picture" alt="" class="pic" />
	  	<p>Hi <?php echo $fb_data['me']['name']; ?>,<br />
	    <a href="<?php echo site_url('landing'); ?>">You can access the top secret page</a> or <a href="<?php echo $fb_data['logoutUrl']; ?>">logout</a> </p>
    <?php endif; ?>

		<?php $photos = $fb_data['photos']; ?>
    
    <div class="slideshow"> 
    <?php
    	foreach($photos['data'] as $photo)
    		{
    		  echo "<img src='{$photo['source']}' />";
        }
    ?>
    </div>

		<!-- video player -->
		<div class="alpha">
		  <div id="video-wrap" class="yt">
		    <iframe frameborder="0" allowfullscreen="" id="yt-video-player" class="yt" title="YouTube video player" height="327" width="536" src="https://www.youtube.com/embed/nsWyP0LBikI?wmode=transparent&amp;rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fe3-2012.herokuapp.com"></iframe>
		    <span class="video-title">das videoslogen!</span>
		  </div>
		</div>

		<div class="beta">
			<div id="yt-video-list" class="media-list yt" style="display: block; ">
				<a class="thumb list-0" data-yt-id="nsWyP0LBikI" href="" title="Halo 4 Official Trailer: E3 2012">
			  	<img alt="Halo 4 Official Trailer: E3 2012" src="https://img.youtube.com/vi/nsWyP0LBikI/default.jpg" width="50" height="28">
			    <span>Halo 4 Official Trailer: E3 2012</span>
			  </a>
			  <a class="thumb list-1" data-yt-id="QWWzhpjS62I" href="" title="E3 2012: Halo 4 Gameplay">
			      <img alt="E3 2012: Halo 4 Gameplay" src="https://img.youtube.com/vi/QWWzhpjS62I/default.jpg" width="50" height="28">
			      <span>E3 2012: Halo 4 Gameplay</span>
			  </a>
			  <a class="thumb list-2" data-yt-id="vBwB5JBMILA" href="" title="E3 2012: Gears Of War: Judgment">
			      <img alt="E3 2012: Gears Of War: Judgment" src="https://img.youtube.com/vi/vBwB5JBMILA/default.jpg" width="50" height="28">
			      <span>E3 2012: Gears Of War: Judgment</span>
			  </a>
			</div>
		</div>

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