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