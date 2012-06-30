<html>
<head>
    <title>Facebook Sweetness</title>
</head>
<body>
  <?php
    if(isset($message) && $message != null){
      echo $message;
    }else{
      echo form_open('agegate/authenticate');
      /* day */
      $day = array();
      for ($i=1; $i < 32; $i++) { 
        $day["$i"] = $i;
      }
      echo form_dropdown('day', $day);

      /* month */
      $month = array();
      for ($i=1; $i < 13; $i++) { 
        $month["$i"] = $i;
      }
      echo form_dropdown('month', $month);

      /* year */
      $year = array();
      for ($i=1950; $i < 2013; $i++) { 
        $year["$i"] = $i;
      }
      echo form_dropdown('year', $year);
      
      echo form_submit('submit', 'Enter');
      echo form_close();
    }
  ?>
</body>

</html>