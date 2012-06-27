   
    <div class="gamma">
    <h3>Twitter Approved Feed</h3>
        <?php
        foreach ($twitter_approved_feed->entry as $entry) {
          $str = $entry->title;
          preg_match('/(http:\/\/[^\s]+)/', $str, $text);
          if($text){
            $hypertext = "<a href=\"". $text[0] . "\">" . $text[0] . "</a>";
            $str = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $str);
          }
          $name = preg_replace('/\(.*?\)/', '', $entry->author->name);

          echo '<div class="tweet">
            <img alt="' . $entry->author->name . '" src="' . $entry->link[1]['href'] . '" />
            <p>' . $str . '<span> : ' . $name . '</span></p>
          </div>';
        }
        ?>

    </div>