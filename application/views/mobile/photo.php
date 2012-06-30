<div data-role="header" data-theme="f" data-position="fixed" data-id="foo">
  <img src="/resources/images/header_m.jpg" alt "XBOX ComicCon" />
  <a href="#share" id="shareBtn" data-role="none">share on wall</a>
  <a href="#" id="winBtn" data-role="none">ENTER TO WIN!</a>
</div>


<section class="photo-section">

  <header>

    <aside>
      <span class="icon"></span>
      <h2>COMIC-CON PHOTO GALLERY</h2>
    </aside>
    
    <aside class="callout">
      <span><a href="http://www.facebook.com/media/set/?set=a.10150575545216023.434660.16547831022&type=3" target="_blank">VIEW FULL GALLERY</a><div class="arrow-up"></div></span>
   </aside>

  </header>

<div class="slider-wrapper theme-default">
 <div id="slider" class="nivoSlider">
  <?php
    $photos =  $fb_photos;
    foreach ($photos->data as $key=>$value) {
      echo '<img src="' . $value->source . '" />';
    }
  ?>
  </div>
</div>



<div data-role="footer" data-id="foo1" data-position="fixed" class="footer">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-prefetch="true">TWITTER</a></li>
      <li><a href="/mobile/video" data-prefetch="true">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-prefetch="true" class="ui-btn-active ui-state-persist">PHOTOS</a></li>
      <li><a href="/mobile/event" data-prefetch="true">XBOX EVENTS</a></li>
    </ul>

    <p class="copyright">The content contained in this app is ©2012 Microsoft Corporation. All rights reserved. See Terms of Use and Privacy &amp; Cookies.</p>
  </div><!-- /navbar -->
</div><!-- /footer -->


</section>