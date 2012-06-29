<header class="global-header">

</header>
<section class="age-gate offset-by-two">
    <h2>Enter your date of birth:</h2>

  <?php
    if(isset($message) && $message != null){
      echo $message;
    }else{
      echo form_open('agegate/authenticate');

        $day = array(
          'name'        => 'day',
          'id'          => 'day',
          'placeholder' => 'DD',
          'maxlength'   => '2',
          'data-mini'   => 'true'
        );
      echo form_input($day);
      
        $month = array(
          'name'        => 'month',
          'id'          => 'month',
          'placeholder' => 'MM',
          'maxlength'   => '2'
        );
      echo form_input($month);

        $year = array(
          'name'        => 'year',
          'id'          => 'year',
          'placeholder' => 'YYYY',
          'maxlength'   => '4'
        );
      echo form_input($year); 

      $submit  = array(
          'name'        => 'submit',
          'id'          => 'submit',
          'value'       => 'SUBMIT',
          'type'        => 'submit'
        );     

      echo form_submit($submit);
      echo form_close();
    }
  ?>
</section>