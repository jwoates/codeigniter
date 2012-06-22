Time: <?php echo $this->benchmark->elapsed_time(); ?>
<br />
Mem: <?php echo $this->benchmark->memory_usage(); ?>

<hr />

<h3>Video Playlist</h3>
<?php
  foreach ($playlist as $key => $value) {
    echo '<a style="display:block;" href="#" data-id="' . $value['id'] .'" >' . $value['title'] ."</a>";
  }
?>

<hr />

