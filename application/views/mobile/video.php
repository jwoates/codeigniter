    <!-- video player -->
    <div class="alpha">
    <h3>Video Playlist</h3>
      <div id="video-wrap" class="yt">
        <iframe frameborder="0" allowfullscreen="" id="yt-video-player" class="yt" title="YouTube video player" height="327" width="536" src="https://www.youtube.com/embed/nsWyP0LBikI?wmode=transparent&amp;rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fe3-2012.herokuapp.com"></iframe>
        <span class="video-title">das videoslogen!</span>
      </div>
    </div>

    <!-- video list -->
    <div class="beta">
      <div id="yt-video-list" class="media-list yt" style="display: block; ">
      <?php
        foreach ($yt_playlist as $key => $value) {
          echo '<a style="display:block;" href="#" data-yt-id="' . $value['id'] .'" ><img src="//img.youtube.com/vi/' . $value['id'] . '/default.jpg" /><span>' . $value['title'] . '</span></a>';
        }
      ?>
      </div>
    </div>