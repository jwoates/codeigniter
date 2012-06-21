Time: <?php echo $this->benchmark->elapsed_time(); ?>
<br />
Mem: <?php echo $this->benchmark->memory_usage(); ?>

<hr />
<?php
/*
*/
foreach ($playlist as $key => $value) {
  echo "title" . $value['title'];
  echo " | id" . $value['id'];
  echo "<br />";
}
?>