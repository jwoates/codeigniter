<div data-role="header" data-theme="f" data-position="fixed" data-id="foo">
  <img src="/resources/images/header_m.jpg" alt "XBOX ComicCon" />
  <a href="#share" id="shareBtn" data-role="none">share on wall</a>
  <a href="#" id="winBtn" data-role="none">ENTER TO WIN!</a>
</div>



<section class="video-section">
    <header>
    <aside>
      <span class="icon"></span>
      <h2>COMIC-CON VIDEOS</h2>
    </aside>
    
  </header>


  <ul data-role="listview" class="videolist">
    <?php
      foreach ($yt_playlist as $key => $value) {
        echo '<li data-icon="arrow-r"><a href="http://youtu.be/'. $value['id'] .'" data-yt-id="' . $value['id'] .'" ><img src="//img.youtube.com/vi/' . $value['id'] . '/default.jpg" width="62" /><span>' . $value['title'] . '</span></a></li>';
      }
    ?>
  </ul> 

</section>

<div data-role="footer" data-id="foo1" data-position="fixed" class="footer">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-prefetch="true">TWITTER</a></li>
      <li><a href="/mobile/video" data-prefetch="true" class="ui-btn-active ui-state-persist">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-prefetch="true">PHOTOS</a></li>
      <li><a href="/mobile/event" data-prefetch="true" data-transition="slideup" class="events-link">XBOX EVENTS</a></li>
    </ul>

    <p class="copyright">The content contained in this app is ©2012 Microsoft Corporation. All rights reserved. See Terms of Use and Privacy &amp; Cookies.</p>
  </div><!-- /navbar -->
</div><!-- /footer -->