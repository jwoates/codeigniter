<div data-role="header" data-theme="f" data-position="fixed" data-id="foo">
  <img src="/resources/images/header_m.jpg" alt "XBOX ComicCon" />
  <a href="#share" id="shareBtn" data-role="none">share on wall</a>
  <a href="#" id="winBtn" data-role="none">ENTER TO WIN!</a>
</div>




<section class="twitter-section">

  <header>

    <aside>
      <span class="icon"></span>
      <h2>COMIC-CON TWITTER FEED</h2>
    </aside>

    <aside class="callout">
      <span>#xboxsdcc  #hashtag2</span>
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
          . $entry->author->name . '" src="' . $entry->link[1]['href'] . '" /><p class="name">' . $name . '</p><p>' . linkify_twitter_status($str) . '</p>
        </li>';
}
?>
<?php
function linkify_twitter_status($status_text)
{
  // linkify URLs
  $status_text = preg_replace(
    '/(https?:\/\/\S+)/',
    '<a href="\1" target="_blank">\1</a>;',
    $status_text
  );
 
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
</ul>  


  <!--     <li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="d" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-d">
        <div class="ui-btn-inner ui-li">
          <div class="ui-btn-text">
            <a href="#" class="ui-link-inherit">
              <p class="ui-li-aside ui-li-desc"><strong>6:24</strong>PM</p>
              <h3 class="ui-li-heading">Stephen Weber</h3>
              <p class="ui-li-desc"><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p>
              <p class="ui-li-desc">Hey Stephen, if you're available at 10am tomorrow, we've got a meeting with the jQuery team.</p>
            </a>
          </div>
          <span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span>
        </div>
      </li> -->


    
    


</section>


<div data-role="footer" data-id="foo1" data-position="fixed" class="footer">
  <div data-role="navbar">
    <ul>
      <li><a href="/mobile/twitter" data-prefetch="true" class="ui-btn-active ui-state-persist">TWITTER</a></li>
      <li><a href="/mobile/video" data-prefetch="true">VIDEOS</a></li>
      <li><a href="/mobile/photo" data-prefetch="true">PHOTOS</a></li>
      <li><a href="/mobile/event" data-prefetch="true" data-transition="slideup" class="events-link">XBOX EVENTS</a></li>
    </ul>

    <p class="copyright">The content contained in this app is ©2012 Microsoft Corporation. All rights reserved. See Terms of Use and Privacy &amp; Cookies.</p>
  </div><!-- /navbar -->
</div><!-- /footer -->