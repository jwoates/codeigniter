<?php $pageName = ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDCC App</title>

  <meta property="og:title" content="Xbox @ San Diego Comic-Con"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="<?php echo $this->config->item('facebook_app_url')?>"/>
  <meta property="og:image" content="https://sdcc.azurewebsites.net/resources/images/sdcc-logo.gif"/>
  <meta property="og:description" content="Your exclusive pass to San Diego Comic-Con. Stay in the know with videos, photos, live tweets and event access all from Xbox." />
  
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
      appId: '<?php echo $this->config->item('appId')?>', // tell the facebook javascript SDK who's using it
      xfbml: true, //this line is necessary for rendering facebook social plugins
      status     : true,
      cookie     : true,
      oauth      : true
    }); 
  </script>


<div data-role="page" class="type-interior">
 <div id="terms" style="display:none;">
  <div class="close simplemodal-close">x</div>
  <p>This app is © 2012 Microsoft Corporation. All rights reserved. 

BY DOWNLOADING OR USING THE APP, YOU ACCEPT THESE TERMS. IF YOU DO NOT ACCEPT THEM, DO NOT DOWNLOAD OR USE THE APP.

Microsoft grants you a limited, nontransferable license to use this app and the content provided in this app solely for your personal, non-commercial use, and solely for the purposes stated within this app.

You may not use the app in any manner that violates others' privacy, publicity, or other intellectual property rights, or that is fraudulent or unlawful.

You hereby release Microsoft from any and all liability, of any and every nature, arising out of any use of the app.

THE APP IS LICENSED "AS-IS" AND IN NO EVENT SHALL MICROSOFT BE LIABLE FOR ANY DAMAGES WHATSOEVER ASSOCIATED WITH USE OF THE APP, INCLUDING ANY SPECIAL, INDIRECT OR CONSEQUENTIAL DAMAGES, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF SOFTWARE, OR INFORMATION AVAILABLE FROM THE APP.</p>
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
  <p class="copyright-nav">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="http://privacy.microsoft.com/en-us/default.mspx" data-role="none" class="privacy">Privacy &amp; Cookies</a>.</p>
</div><!-- /footer -->
<script type="text/javascript">
  $(function(){
    var target = ($('#twitterLoader') != 'undefined') ? $('#twitterLoader') : false;
    if(target === false) return false;
    requestTweets(target, true);
    var seconds = 5;

    setInterval(function(){    
      requestTweets(target, false);
    }, seconds * 1000)        

});
function requestTweets(target, flag){
  $.ajax({
    url: "/landing/requestNewTweets",
    context: document.body
  }).done(function(data) { 
    populateTweets(data,target, flag);
  });
}
function populateTweets(data, target, flag){
  $.each(data, function(index, value) { 
    console.log(value);
    if ( ! document.getElementById(value.id) || document.getElementById(value.id) == null){
      var content = '<div class="tweet" id="'+value.id+'"><img alt="" src="'+value.link[1]['@attributes'].href+'" width="48" height="48" /><p class="name">'+value.author.name+'</p><p>'+Linkify(value.title)+'</p></div>'
      if(flag == true){
        $(target).append(content);
      }else{
        $(target).prepend(content);
      }
    }
  });
  $('#twitterLoader').jScrollPane();
  $('#twitterLoader > div').load(function(){
    $('#twitterLoader').data('jsp').reinitialise();
  });

}

function Linkify(text) {
    text = text.replace(/(https?:\/\/\S+)/gi, function (s) {
        return '<a href="' + s + '">' + s + '</a>';
    });

    text = text.replace(/(^|)@(\w+)/gi, function (s) {
        return '<a href="http://twitter.com/' + s + '">' + s + '</a>';
    });

    text = text.replace(/(^|)#(\w+)/gi, function (s) {
        return '<a href="http://search.twitter.com/search?q=' + s.replace(/#/,'%23') + '">' + s + '</a>';
     });
    return text;
}
</script>
<script type="text/javascript" src="/resources/js/jquery.nivo.slider.pack.js?<?php echo rand(); ?>"></script> 
<script type="text/javascript">
  $(document).ready(function() {
  //wait for share button click
      $('#shareBtn').click(function(){
        FB.ui({
          method: 'feed', //the location we are posting to, in this case the users feed
          display: 'iframe',
          name: 'Xbox @ San Diego Comic-Con',
          link: '<?php echo $this->config->item('facebook_app_url')?>',
          picture: 'https://sdcc.azurewebsites.net/resources/images/sdcc-logo.gif',
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