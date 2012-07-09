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
      <li><a href="/mobile/twitter" data-role="none" data-prefetch="true" class="ui-btn-active ui-state-persist" data-theme="d">TWITTER</a></li>
      <li><a href="/mobile/video"  data-role="none"data-prefetch="true" data-theme="d">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-role="none" data-prefetch="true" data-theme="d">PHOTOS</a></li>
      <li><a href="/mobile/event" data-role="none" data-prefetch="true" data-theme="d" data-role="none" class="events-link">XBOX EVENTS</a></li>
    </ul>
  </div>
</div>
<?php
} else {
 
}
?>


<section class="twitter-section">
  <header class="<?php if (($this->agent->platform() == "Windows OS") || ($this->agent->browser() == "Internet Explorer")) { ?>windows<?php } else {} ?>">
    <aside>
      <span class="icon"></span>
      <h2>COMIC-CON TWITTER FEED</h2>
      <span><a href="https://twitter.com/#!/search/%23XboxSDCC%20OR%20%23NerdHQ" target="_blank" data-role="none">#XboxSDCC</a> <a href="https://twitter.com/#!/search/%23XboxSDCC%20OR%20%23NerdHQ" target="_blank" data-role="none">#NerdHQ</a> <a href="https://twitter.com/#!/thenerdmachine/" target="_blank" data-role="none">@thenerdmachine</a></span>
   </aside>
  </header>

<ul data-role="listview">
  <div id="twitterLoader">
      
  </div>    

</ul>  


</section>

<?php
if (($this->agent->platform() == 'Windows OS') || ($this->agent->browser() == 'Internet Explorer')) {
?>
<p class="copyright-win">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="http://privacy.microsoft.com/en-us/default.mspx" data-role="none" class="privacy">Privacy &amp; Cookies</a>.</p>
<?php
} else {
?>
<div data-role="footer" data-id="foo1" data-position="fixed" class="footer">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-prefetch="true" class="ui-btn-active ui-state-persist">TWITTER</a></li>
      <li><a href="/mobile/video" data-prefetch="true">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-prefetch="true">PHOTOS</a></li>
      <li><a href="/mobile/event" data-prefetch="true">XBOX EVENTS</a></li>
    </ul>
  </div><!-- /navbar -->
  <p class="copyright-nav">The content contained in this app is &copy; 2012 Microsoft Corporation. <br />All rights reserved. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="http://privacy.microsoft.com/en-us/default.mspx" data-role="none" class="privacy" target="_blank">Privacy &amp; Cookies</a>.</p>
</div><!-- /footer -->
<?php
}
?>



