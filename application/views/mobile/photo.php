<div data-role="header" data-theme="f" data-position="fixed" data-id="foo">
  <img src="/resources/images/header_m.jpg" alt "XBOX ComicCon" />
  <div class="top-links">
    <a href="#share" id="shareBtn" data-role="none">share on wall</a>
    <div id="winBtn" data-role="none">PLAY &amp; WIN! <br /><span class="textnumber">Text ENTER to 699269*</span><br /><span class="notice">*MsgRatesApply</span></div>
  </div>
</div>


<?php
if (($this->agent->platform() == 'Windows OS') || ($this->agent->browser() == 'Internet Explorer')) {
?>
<div class="nav-windows">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-role="none" data-prefetch="true" data-theme="d">TWITTER</a></li>
      <li><a href="/mobile/video"  data-role="none"data-prefetch="true" data-theme="d">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-role="none" data-prefetch="true" class="ui-btn-active ui-state-persist" data-theme="d">PHOTOS</a></li>
      <li><a href="/mobile/event" data-role="none" data-prefetch="true" data-role="none" data-theme="d">XBOX EVENTS</a></li>
    </ul>
  </div>
</div>
<?php
} else {
 
}
?>

<section class="photo-section">

  <header class="<?php if (($this->agent->platform() == "Windows OS") || ($this->agent->browser() == "Internet Explorer")) { ?>windows<?php } else {} ?>">

    <aside>
      <span class="icon"></span>
      <h2>COMIC-CON PHOTO GALLERY</h2>
    </aside>
    
<!--     <aside class="callout">
      <span><a href="http://www.facebook.com/media/set/?set=a.10150575545216023.434660.16547831022&type=3" target="_blank">VIEW FULL GALLERY</a><div class="arrow-up"></div></span>
   </aside> -->

  </header>

<div class="slider-wrapper theme-default">
  <div class="comingsoon"><h2>Photos coming soon!<br />Check back here for SDCC 2012 as they become available.</h2></div>
<!--  <div id="slider" class="nivoSlider">
  <?php
    $photos =  $fb_photos;
    foreach ($photos->data as $key=>$value) {
      echo '<img src="' . $value->source . '" />';
    }
  ?>
  </div> -->
</div>

</section>


<?php
if (($this->agent->platform() == 'Windows OS') || ($this->agent->browser() == 'Internet Explorer')) {
?>

<p class="copyright-win" style="margin-top:310px;">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="#" data-role="none" class="privacy">Privacy &amp; Cookies</a>.</p>
<?php
} else {
?>
<div data-role="footer" data-id="foo1" data-position="fixed" class="footer">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-prefetch="true">TWITTER</a></li>
      <li><a href="/mobile/video" data-prefetch="true">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-prefetch="true" class="ui-btn-active ui-state-persist">PHOTOS</a></li>
      <li><a href="/mobile/event" data-prefetch="true">XBOX EVENTS</a></li>
    </ul>
  </div><!-- /navbar -->
  <p class="copyright-nav">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="http://privacy.microsoft.com/en-us/default.mspx" data-role="none" class="privacy" target="_blank">Privacy &amp; Cookies</a>.</p>
</div><!-- /footer -->
<?php
}
?>