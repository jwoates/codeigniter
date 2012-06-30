<header class="global-header">

</header>
<div class="gate-keeper"> 
<section class="age-gate offset-by-two">
    <h1>Enter your date of birth:</h1>

<?php
  if(isset($message) && $message != null){
    echo $message;
  }else{
    echo form_open('agegate/authenticate');
  
  $day = array(
    '0'   => ' Day ',
    '1'   => '1',
    '2'   => '2',
    '3'   => '3',
    '4'   => '4',
    '5'   => '5',
    '6'   => '6',
    '7'   => '7',
    '8'   => '8',
    '9'   => '9',
    '10'  => '10',
    '11'  => '11',
    '12'  => '12',
    '13'  => '13',
    '14'  => '14',
    '15'  => '15',
    '16'  => '16',
    '17'  => '17',
    '18'  => '18',
    '19'  => '19',
    '20'  => '20',
    '21'  => '21',
    '22'  => '22',
    '23'  => '23',
    '24'  => '24',
    '25'  => '25',
    '26'  => '26',
    '27'  => '27',
    '28'  => '28',
    '30'  => '30',
    '31'  => '31'
  );
  echo form_dropdown('day', $day);


  $month = array(
    '0'   => ' Month ',
    '1'   => 'January',
    '2'   => 'February',
    '3'   => 'March',
    '4'   => 'April',
    '5'   => 'May',
    '6'   => 'June',
    '7'   => 'July',
    '8'   => 'August',
    '9'   => 'September',
    '10'  => 'October',
    '11'  => 'November',
    '12'  => 'December'
  );
  echo form_dropdown('month', $month);

  function buildYearDropdown($name='',$value='')
  {
    $years = date('y');
    while ( $years <= '31' + date('y')){
        $year['20'.$years] ='20' .$years;$years++;
    }
    echo form_dropdown($name, $year, $value);
  }




        $year = array(
          'name'        => 'year',
          'id'          => 'year',
          'placeholder' => 'Year',
          'maxlength'   => '4',
          'type'        => 'number'
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
</div>