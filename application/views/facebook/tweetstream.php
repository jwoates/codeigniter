



  <section class="twitter-section">
    <header>

    <div id="twitterList">
        <?php
        $i = 0;
        foreach ($twitter_approved_feed->entry as $entry) {
          if($i >= 30) return false;
          $str = $entry->title;
          preg_match('/(http:\/\/[^\s]+)/', $str, $text);
          if($text){
            $hypertext = "<a href=\"". $text[0] . "\">" . $text[0] . "</a>";
            $str = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $str);
          }
          $name = preg_replace('/\(.*?\)/', '', $entry->author->name);

          echo '<div class="tweet">
                  <img alt="' 
                  . $entry->author->name . '" src="' . $entry->link[1]['href'] . '" width="48" height="48" /><p class="name">' . $name . '</p><p>' . linkify_twitter_status($str) . '</p><div class="clear"></div>
                </div>';
        }

        $i++;
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
  </div>