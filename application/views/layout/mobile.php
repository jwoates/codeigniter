<?php $pageName = ''; ?>
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
  
  <meta name="MobileOptimzied" content="width" />
  <meta http-equiv="cleartype" content="on" />

  <link href="https://font-box.heroku.com/segoe.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet"  href="/resources/css/jquery.mobile-1.1.0.css" />  
  <link rel="stylesheet"  href="/resources/css/jqm-docs.css" />  
  <link rel="stylesheet"  href="/resources/css/jquery.mobile.fixedToolbar.polyfill.css" />  
  <link rel="stylesheet"  href="/resources/css/mobile.css?<?php echo rand(); ?>" /> 
  <link href="/resources/js/nivo-slider.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" media="screen" />

 
  <script type="text/javascript" src="//code.jquery.com/jquery-1.7.1.min.js"></script>
  
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
 <div id="terms" style="display:none;">
  <div class="close simplemodal-close">x</div>
  <p>Microsoft grants you a limited license to use the content in this application solely for your personal, non-commercial use. Use of this application is subject to the Xbox LIVE Terms of Use, available at: <a href="http://www.xbox.com/en-US/Legal/livetou" target="_blank" data-role="none">http://www.xbox.com/en-US/Legal/livetou</a>
IN NO EVENT SHALL MICROSOFT BE LIABLE FOR ANY DAMAGES WHATEVER ASSOCIATED WITH USE OF THE APPLICATION, INCLUDING WITHOUT LIMITATION ANY DAMAGE TO OR DISRUPTION OF COMPUTER OR SOFTWARE PROGRAMS, OR ANY LOSS OF USER’S DATA. IN NO EVENT SHALL MICROSOFT BE LIABLE FOR ANY SPECIAL, INDIRECT OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF SOFTWARE, PROVISION OF OR FAILURE TO PROVIDE PROGRAM SERVICES, OR INFORMATION AVAILABLE FROM THE PROGRAM.</p>
</div>
  <?php
    echo $yield;
  ?> 
</div>

<div data-role="footer" data-id="foo1" data-position="fixed" class="footer">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-prefetch="true" class="ui-btn-active ui-state-persist">TWITTER</a></li>
      <li><a href="/mobile/video" data-prefetch="true">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-prefetch="true">PHOTOS</a></li>
      <li><a href="/mobile/event" data-prefetch="true" data-transition="slideup" class="events-link">XBOX EVENTS</a></li>
    </ul>
  </div><!-- /navbar -->
  <p class="copyright-nav">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="#" data-role="none" class="privacy">Privacy &amp; Cookies</a>.</p>
</div><!-- /footer -->

<script type="text/javascript" src="/resources/js/jquery.nivo.slider.pack.js?<?php echo rand(); ?>"></script> 
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
        directionNavHide: false,
        effect: 'fade'
      });  

      $.mobile.ajaxEnabled = false;

    });
      
  </script>

<script type="text/javascript" src="//code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
<script type="text/javascript" src="/resources/js/jquery.mobile.fixedToolbar.polyfill.js"></script>
<script type="text/javascript" src="/resources/js/jquery.simplemodal-1.4.2.js"></script>
<script src="//www.youtube.com/player_api" type="text/javascript" charset="utf-8" async="" defer=""></script>
<script type="text/javascript" src="/resources/js/mobile.js?<?php echo rand(); ?>"></script> 
<script>
    function resize() {
      FB.Canvas.setAutoResize();
    }
  </script>

  <div class="clear"></div>
</body>
</html>