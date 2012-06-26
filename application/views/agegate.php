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
        $data = array(
          'name'        => 'age',
          'id'          => 'age',
          'value'       => 'enter age',
          'maxlength'   => '3',
          'size'        => '10'
        );
      echo form_input($data);
      echo form_submit('submit', 'Enter');
      echo form_close();
    }
  ?>
</body>

</html>