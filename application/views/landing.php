<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SDCC App</title>
<meta property="og:title" content="San Diego Comicon Hub"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="https://apps.facebook.com/elc_ent_expo/us"/>
  <meta property="og:image" content="https://c193490.ssl.cf1.rackcdn.com/E3-2012/share-image.png"/>
  <meta property="og:description" content="bla bla" />

  <link href="/resources/css/application.css" rel="stylesheet" type="text/css" media="screen" />
  
</head>
  <body onload="resize();" >
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '151259104968742',
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
    <a href="#" name="fb_share" id="share_message" class="share_btn">SHARE</a>
    <script src="https://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

    <script type="text/javascript">
      window.addEvent('domready', function(){
        console.log($("share_message"));
        $("share_message").addEvent("click",function(e){
            console.log('clicked');
            var obj = {
              method: 'feed',
              link:         "http://http://apps.facebook.com/rh-jackson/",
              picture:      "http://sphotos.xx.fbcdn.net/hphotos-prn1/s720x720/534126_10151004587556023_1703964510_n.jpg",
              name:         'SDCC',
              caption:      'caption',
              description:  'description'
            };
            function callback(response){}
            FB.ui(obj, callback);
          return false;
        });

      });
    </script>

    
    <div class="slideshow" style="border:1px solid #ccc; padding:10px;"> 
    <h3>image gallery</h3>
      <?php
        $photos =  $fb_photos;
        foreach ($photos->data as $key=>$value) {
          //print("<pre>".print_r($value->source,true)."</pre>");
          echo '<img height="50" width="50" src="' . $value->source . '" />';
        }
      ?>
    </div>



    <!-- video player -->
    <div class="alpha">
    <h3>Video Playlist</h3>
      <div id="video-wrap" class="yt">
        <iframe frameborder="0" allowfullscreen="" id="yt-video-player" class="yt" title="YouTube video player" height="327" width="536" src="https://www.youtube.com/embed/nsWyP0LBikI?wmode=transparent&amp;rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fe3-2012.herokuapp.com"></iframe>
        <span class="video-title">das videoslogen!</span>
      </div>
    </div>

    <!-- video list -->
    <div class="beta">
      <div id="yt-video-list" class="media-list yt" style="display: block; ">
      <?php
        foreach ($yt_playlist as $key => $value) {
          echo '<a style="display:block;" href="#" data-yt-id="' . $value['id'] .'" ><img src="//img.youtube.com/vi/' . $value['id'] . '/default.jpg" /><span>' . $value['title'] . '</span></a>';
        }
      ?>
      </div>
    </div>
    
    <div class="gamma">
    <h3>Twitter Approved Feed</h3>
        <?php
        foreach ($twitter_approved_feed->entry as $entry) {
          $str = $entry->title;
          preg_match('/(http:\/\/[^\s]+)/', $str, $text);
          if($text){
            $hypertext = "<a href=\"". $text[0] . "\">" . $text[0] . "</a>";
            $str = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $str);
          }
          $name = preg_replace('/\(.*?\)/', '', $entry->author->name);

          echo '<div class="tweet">
            <img alt="' . $entry->author->name . '" src="' . $entry->link[1]['href'] . '" />
            <p>' . $str . '<span> : ' . $name . '</span></p>
          </div>';
        }
        ?>

    </div>

    <div class="clear">&nbsp;</div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

	</div>

<script src="//www.youtube.com/player_api" type="text/javascript" charset="utf-8" async="" defer=""></script>
<script type="text/javascript" src="/resources/js/application.js"></script> 
  <script>
    function resize() {
      FB.Canvas.setAutoResize();
    }
  </script>
  <script type="text/javascript" src="/resources/js/application.js"></script> 
</body>
</html>