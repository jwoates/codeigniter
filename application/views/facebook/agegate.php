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
        $day = array(
          'name'        => 'day',
          'id'          => 'day',
          'value'       => 'DD',
          'maxlength'   => '2',
          'size'        => '10'
        );
      echo form_input($day);

        $month = array(
          'name'        => 'month',
          'id'          => 'month',
          'value'       => 'MM',
          'maxlength'   => '2',
          'size'        => '10'
        );
      echo form_input($month);

        $year = array(
          'name'        => 'year',
          'id'          => 'year',
          'value'       => 'YYYY',
          'maxlength'   => '4',
          'size'        => '10'
        );
      echo form_input($year);      

      echo form_submit('submit', 'Enter');
      echo form_close();
    }
  ?>
</body>

</html>