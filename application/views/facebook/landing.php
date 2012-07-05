<header class="global-header">
  <a href="#share" id="shareBtn">share on wall</a>
</header>


<section class="main-page">


  <section class="video-section">
    <header>
      <span class="icon"></span>
      <h2>COMIC-CON VIDEOS</h2>
    </header>


    <!-- video player -->
    <div class="alpha">
      <div id="video-wrap" class="yt">
        <iframe frameborder="0" allowfullscreen="" id="yt-video-player" class="yt" title="YouTube video player" height="308" width="533" src="https://www.youtube.com/embed/_oICDuufQxs?wmode=transparent&amp;rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fe3-2012.herokuapp.com"></iframe>
        <!-- <span class="video-title">das videoslogen!</span> -->
      </div>
    </div>

    <!-- video list -->
    <div id="videolist">
      <?php
        foreach ($yt_playlist as $key => $value) {
          echo '<a href="#" data-yt-id="' . $value['id'] .'" ><img src="//img.youtube.com/vi/' . $value['id'] . '/default.jpg" width="62" /><span>' . $value['title'] . '</span></a>';
        }
      ?>
    </div>
  </section> 



  <section class="twitter-section">
    <header>
      <span class="icon"></span>
      <h2>COMIC-CON TWITTER FEED <br /><span><a href="https://twitter.com/#!/search/%23XboxSDCC%20OR%20%23NerdHQ" target="_blank">#XboxSDCC</a> <a href="https://twitter.com/#!/search/%23XboxSDCC%20OR%20%23NerdHQ" target="_blank">#NerdHQ</a> <a href="https://twitter.com/#!/thenerdmachine/" target="_blank">@thenerdmachine</a></span></h2>
    </header>

    <div id="twitterList">
        <?php
        $i = 0;
        foreach ($twitter_approved_feed->entry as $entry) {
          if($i >= 30) return false;
          $str = $entry->title;
          preg_match('/(http:\/\/[^\s]+)/', $str, $text);
          if($text){
            $hypertext = "<a href=\"". $text[0] . "\">" . $text[0] . "</a>";
            $str = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $str);
          }
          $name = preg_replace('/\(.*?\)/', '', $entry->author->name);

          echo '<div class="tweet">
                  <img alt="' 
                  . $entry->author->name . '" src="' . $entry->link[1]['href'] . '" width="48" height="48" /><p class="name">' . $name . '</p><p>' . linkify_twitter_status($str) . '</p><div class="clear"></div>
                </div>';
        }

        $i++;
        ?>

        <?php
        function linkify_twitter_status($status_text)
        {
          // linkify URLs
          // $status_text = preg_replace(
          //   '/(https?:\/\/\S+)/',
          //   '<a href="\1" target="_blank">\1</a>;',
          //   $status_text
          // );
         
          // linkify twitter users
          $status_text = preg_replace(
            '/(^|\s)@(\w+)/',
            ' <a href="http://twitter.com/\2" target="_blank">@\2</a>',
            $status_text
          );
         
          // linkify tags
          $status_text = preg_replace(
            '/(^|\s)#(\w+)/',
            ' <a href="http://search.twitter.com/search?q=%23\2" target="_blank">#\2</a>',
            $status_text
          );
         
          return $status_text;
        }
        ?>
  </div>


  </section>

  <section class="xbox-events-section">
    <header>
      <span class="icon"></span>
      <h2>XBOX EVENTS</h2>
    </header>

    <ul>
      <li>The Fiction of Halo 4 – <span>Thursday, 7/12/12, 4:45pm - 5:45pm, Room 6BCF</span></li>
      <li>Gears of War: Past, Present &amp; Future – <span>Friday, 7/13/12, 2:00p.m. - 3:00p.m., Room: 6BCF</span></li>
      <li>Halo 4: A New Campaign and Halo Infinity Multiplayer – <span>Saturday, 7/14/12, 3:15pm - 4:15pm, Room 6DE</span></li>
    </ul>
    <div class="callout">
      <h3>VISIT MAJOR NELSON + NERD HQ FOR MORE EVENT DETAILS</h3>
      <a href="http://majornelson.com/2012/06/28/xbox-360-comic-con-2012-schedule/" target="_blank"><img src="/resources/images/major-nelson.jpg" alt="Major Nelson" /></a>
      <a href="http://www.thenerdmachine.com/nerd-hq/" target="_blank"><img src="/resources/images/more-events.jpg" alt="More Events" /></a>
    </div>

  </section>

  <div class="clear"></div>

  <section class="photo-section">
    <header>
      <span class="icon"></span>
      <h2>COMIC-CON PHOTO GALLERY</h2>
<!--       <a href="http://www.facebook.com/media/set/?set=a.10150575545216023.434660.16547831022&type=3" target="_blank">VIEW full gallery <span></span></a>
 -->      <div class="clear"></div>
    </header>

  
  <div class="slider-wrapper theme-default">
      <div class="comingsoon"><h2>Photos coming soon!<br />Check back here for SDCC 2012 as they become available.</h2></div>

   <!-- <div id="slider" class="nivoSlider">
    <?php
      $photos =  $fb_photos;
      foreach ($photos->data as $key=>$value) {
        //print("<pre>".print_r($value->source,true)."</pre>");
        echo '<img src="' . $value->source . '" />';
      }
    ?>
    </div> -->
  </div>

  </section>

    
    

 


</section>