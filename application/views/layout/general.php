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

  <link href="https://font-box.heroku.com/segoe.css" rel="stylesheet" type="text/css" media="screen" />
   <link href="/resources/css/jquery.jscrollpane.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" media="screen" />
  <link href="/resources/css/init.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" media="screen" />
  <link href="/resources/js/nivo-slider.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" media="screen" />
 
  <script type="text/javascript" src="/resources/js/modernizr.js"></script> 
  
</head>
  <body onload="resize();" >
  <div id="fb-root"></div>
  <script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script>
  <script>
    FB.init({
      appId: '291750807589264', // tell the facebook javascript SDK who's using it
      xfbml: true, //this line is necessary for rendering facebook social plugins
      status     : true,
      cookie     : true,
      oauth      : true
    }); 
  </script>


<div id="container" class="container">




<?php
  echo $yield;
?> 



<footer>
  <div class="container">
    <section class="columns four" style="margin-left:0px !important;">
      <p class="footer">The content contained in this app is ©2012 Microsoft Corporation. All rights reserved. You hereby release Microsoft from any and all liability, of any and every nature, arising out of any use of the app. See <a href="#">Terms of Use</a> and <a href="#">Privacy &amp; Cookies</a>.</p>
    </section>
    <section class="columns two">
      <img src="/resources/images/xbox_logo.png" alt="XBOX" style="margin-left:80px;" />
    </section>
  </div>
</footer>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//www.youtube.com/player_api" type="text/javascript" charset="utf-8" async="" defer=""></script>

<script type="text/javascript">
    $(document).ready(function() {
    //wait for share button click
        $('#shareBtn').click(function(){
          FB.ui({
            method: 'feed', //the location we are posting to, in this case the users feed
            name: 'Xbox @ San Diego Comic-Con ',
            link: 'http://apps.facebook.com/rh-jackson/',
            picture: 'http://roundhouseagency.com/img/rh-logo.jpg',
            caption: 'caption',
            description: 'Your exclusive pass to San Diego Comic-Con. Stay in the know with videos, photos, live tweets and event access all from Xbox.'
          },
          function(response) { //the callback
            if (response && response.post_id) {
              //someone for sure just posted our content
            } else {
                //someone clicked the cancel button :(
            }
          });
        });

        $('#slider').nivoSlider({
          controlNav: false,
          directionNavHide: false
        });

        $('#twitterList').jScrollPane();
        $('#twitterList p').load(function(){
          $('#twitterList').data('jsp').reinitialise();
        });

        $('#videolist').jScrollPane();
        $('#videolist img').load(function(){
          $('#videolist').data('jsp').reinitialise();
        });
        

      });
        
    </script>
  <script>
    function resize() {
      FB.Canvas.setAutoResize();
    }
  </script>
  <script type="text/javascript" src="/resources/js/application.js?<?php echo rand(); ?>"></script> 
  <script type="text/javascript" src="/resources/js/jquery.nivo.slider.pack.js?<?php echo rand(); ?>"></script> 
  <script type="text/javascript" src="/resources/js/jquery.jscrollpane.min.js"></script> 
  <script type="text/javascript" src="/resources/js/jquery.mousewheel.js"></script> 

</body>
</html>