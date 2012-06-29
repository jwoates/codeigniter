<div class="slideshow" style="border:1px solid #ccc; padding:10px;"> 
<h3>image gallery</h3>
  <?php
    $photos =  $fb_photos;
    foreach ($photos->data as $key=>$value) {
      //print("<pre>".print_r($value->source,true)."</pre>");
      echo '<img height="50" width="50" src="' . $value->source . '" />';
    }
  ?>
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