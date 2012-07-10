<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SDCC App</title>
  <meta property="og:title" content="Xbox @ San Diego Comic-Con"/>
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="<?php echo $this->config->item('facebook_app_url')?>"/>
  <meta property="og:image" content="https://sdcc.azurewebsites.net/resources/images/sdcc-logo.gif"/>
  <meta property="og:description" content="Your exclusive pass to San Diego Comic-Con. Stay in the know with videos, photos, live tweets and event access all from Xbox." />

  <link href="https://font-box.heroku.com/segoe.css" rel="stylesheet" type="text/css" media="screen" />
   <link href="/resources/css/jquery.jscrollpane.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" media="screen" />
  <link href="/resources/css/init.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" media="screen" />
  <link href="/resources/js/nivo-slider.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" media="screen" />
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="/resources/js/modernizr.js"></script> 
  
</head>
  <body onload="resize();" >
  <div id="fb-root"></div>
  <script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script>
  <script>
    FB.init({
      appId: '<?php echo $this->config->item('appId')?>', // tell the facebook javascript SDK who's using it
      xfbml       : true, //this line is necessary for rendering facebook social plugins
      status      : true,
      cookie      : true,
      oauth       : true
    }); 
  </script>

<div id="wrapper">
  <div id="container" class="container">

    <?php
      echo $yield;
    ?> 

    <footer>
      <div class="container">
        <section class="columns four" style="margin-left:0px !important;">
          <p class="footer">The content contained in this app is ©2012 Microsoft Corporation. All rights reserved. You hereby release Microsoft from any and all liability, of any and every nature, arising out of any use of the app. See <a href="#" class="terms-main">Terms of Use</a> and <a target="_blank" href="http://privacy.microsoft.com/en-us/default.mspx">Privacy &amp; Cookies</a>.</p>
        </section>
        <section class="columns two">
          <img src="/resources/images/xbox_logo.png" alt="XBOX" style="margin-left:80px;" />
        </section>
      </div>
    </footer>

    <div class="legal-text" style="display:none;">
      <p>This app is © 2012 Microsoft Corporation.  All rights reserved. <br><br>BY DOWNLOADING OR USING THE APP, YOU ACCEPT THESE TERMS. IF YOU DO NOT ACCEPT THEM, DO NOT DOWNLOAD OR USE THE APP.<br><br>Microsoft grants you a limited, nontransferable license to use this app and the content provided in this app solely for your personal, non-commercial use, and solely for the purposes stated within this app.<br><br>You may not use the app in any manner that violates others' privacy, publicity, or other intellectual property rights, or that is fraudulent or unlawful.<br><br>You hereby release Microsoft from any and all liability, of any and every nature, arising out of any use of the app.<br><br>THE APP IS LICENSED "AS-IS" AND IN NO EVENT SHALL MICROSOFT BE LIABLE FOR ANY DAMAGES WHATSOEVER ASSOCIATED WITH USE OF THE APP, INCLUDING ANY SPECIAL, INDIRECT OR CONSEQUENTIAL DAMAGES, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF SOFTWARE, OR INFORMATION AVAILABLE FROM THE APP.<br></p>
    </div>
  <div class="clear"></div>
  </div>
</div>


<script src="//www.youtube.com/player_api" type="text/javascript" charset="utf-8" async="" defer=""></script>
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
function refreshNav() {
    var pane = $('#twitterLoader');
    var api = pane.data('jsp');
    api.reinitialise();
}
function requestTweets(target, flag){
  $.ajax({
    url: "/landing/requestNewTweets",
    cache:false,
    context: document.body
  }).done(function(data) { 
    populateTweets(data,target, flag);
    refreshNav();

  });
}

function populateTweets(data, target, flag){
  $.each(data, function(index, value) { 
    if ( ! document.getElementById(value.id) || document.getElementById(value.id) == null){
      var content = '<div class="tweet" id="'+value.id+'"><img alt="" src="'+value.link[1]['@attributes'].href+'" width="48" height="48" /><p class="name">'+value.author.name+'</p><p>'+Linkify(value.title)+'</p></div>'
      if(flag == true){
        $(target).append(content);
      }else{
        $('#twitterLoader .jspPane').prepend(content);
      }
    }
  });
  $('#twitterLoader').jScrollPane();
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


<script type="text/javascript">
    $(document).ready(function() {
    //wait for share button click
        $('#shareBtn').click(function(){
          FB.ui({
            method: 'feed', //the location we are posting to, in this case the users feed
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
          directionNavHide: false
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