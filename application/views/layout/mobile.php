<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDCC App</title>

  <meta property="og:title" content="San Diego Comicon Hub"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="https://apps.facebook.com/elc_ent_expo/us"/>
  <meta property="og:image" content="https://c193490.ssl.cf1.rackcdn.com/E3-2012/share-image.png"/>
  <meta property="og:description" content="bla bla" />
  
  <link href="https://font-box.heroku.com/segoe.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet"  href="/resources/css/jquery.mobile-1.1.0.css" />  
  <link rel="stylesheet"  href="/resources/css/jqm-docs.css" />  
  <link rel="stylesheet"  href="/resources/css/mobile.css?<?php echo rand(); ?>" />  

  <script type="text/javascript" src="//code.jquery.com/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>

  
</head>
<body onload="resize();">
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


<div data-role="page" class="type-interior">

  <div data-role="header" data-theme="f" data-position="fixed" data-id="foo">
    <img src="/resources/images/header_m.jpg" alt "XBOX ComicCon" />
  </div>
  
  <div class="gate-keeper"> 
    <?php
      echo $yield;
    ?> 
  </div>





</div>

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

    });
      
  </script>
<script>
  function resize() {
    FB.Canvas.setAutoResize();
  }
</script>
<script src="//www.youtube.com/player_api" type="text/javascript" charset="utf-8" async="" defer=""></script>
  <script>
    function resize() {
      FB.Canvas.setAutoResize();
    }
  </script>
</body>
</html>