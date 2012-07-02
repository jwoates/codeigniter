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
      
<?php
foreach ($twitter_approved_feed->entry as $entry) {
  $str = $entry->title;
  preg_match('/(http:\/\/[^\s]+)/', $str, $text);
  if($text){
    $hypertext = "<a href=\"". $text[0] . "\">" . $text[0] . "</a>";
    $str = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $str);
  }
  $name = preg_replace('/\(.*?\)/', '', $entry->author->name);

  echo '<li><img alt="' 
          . $entry->author->name . '" src="' . $entry->link[1]['href'] . '" class="avatar" width="48" height="48" /><p class="name">' . $name . '</p><p>' . linkify_twitter_status($str) . '</p>
        </li>';
}
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
    ' <a href="http://twitter.com/\2" target="_blank" data-role="none">@\2</a>',
    $status_text
  );
 
  // linkify tags
  $status_text = preg_replace(
    '/(^|\s)#(\w+)/',
    ' <a href="http://search.twitter.com/search?q=%23\2" target="_blank" data-role="none">#\2</a>',
    $status_text
  );
 
  return $status_text;
}
?>
</ul>  


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



