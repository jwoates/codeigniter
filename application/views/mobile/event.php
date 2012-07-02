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
      <li><a href="/mobile/photo" data-role="none" data-prefetch="true" data-theme="d">PHOTOS</a></li>
      <li><a href="/mobile/event" data-role="none" data-prefetch="true" data-role="none" class="ui-btn-active ui-state-persist" data-theme="d">XBOX EVENTS</a></li>
    </ul>
  </div>
</div>
<?php
} else {
 
}
?>

<section class="events-section">
    <header class="<?php if (($this->agent->platform() == "Windows OS") || ($this->agent->browser() == "Internet Explorer")) { ?>windows<?php } else {} ?>">
    <aside>
      <span class="icon"></span>
      <h2>COMIC-CON XBOX EVENTS</h2>
    </aside>
    
  </header>

  <ul>
    <li>The Fiction of Halo 4 – <span>Thursday, 7/12/12, 4:45pm - 5:45pm, Room 6BCF</span>
    <li>Gears of War: Past, Present &amp; Future – <span>Friday, 7/13/12, 2:00p.m. - 3:00p.m., Room: 6BCF</span>
    <li>Halo 4: A New Campaign and Halo Infinity Multiplayer – <span>Saturday, 7/14/12, 3:15pm - 4:15pm, Room 6DE</span>
  </ul>
  <div class="callout">
    <a href="#" target="_blank"><img src="/resources/images/major_nelson_m.jpg" alt="Major Nelson" /></a>
    <a href="#" target="_blank"><img src="/resources/images/more_events_m.jpg" alt="More Events" /></a>
  </div>

</section>


<?php
if (($this->agent->platform() == 'Windows OS') || ($this->agent->browser() == 'Internet Explorer')) {
?>
<p class="copyright-win">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="#" data-role="none" class="privacy">Privacy &amp; Cookies</a>.</p>
<?php
} else {
?>
<div data-role="footer" data-id="foo1" data-position="fixed" class="footer">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-prefetch="true">TWITTER</a></li>
      <li><a href="/mobile/video" data-prefetch="true">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-prefetch="true">PHOTOS</a></li>
      <li><a href="/mobile/event" data-prefetch="true" class="ui-btn-active ui-state-persist">XBOX EVENTS</a></li>
    </ul>
  </div><!-- /navbar -->
  <p class="copyright-nav">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="#" data-role="none" class="privacy">Privacy &amp; Cookies</a>.</p>
</div><!-- /footer -->
<?php
}
?>