<header class="global-header">

</header>

<div class="gate-keeper"> 
<section class="age-gate">
    <h1>Enter your date of birth:</h1>

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
</section>
</div>

<?php
if($this->agent->is_mobile() == true)
{ ?>
<footer>
  <div class="container">
    <section>
      <p class="footer">The content contained in this app is ©2012 Microsoft Corporation. All rights reserved. You hereby release Microsoft from any and all liability, of any and every nature, arising out of any use of the app. See <a href="#" target="_blank" data-role="none" class="terms">Terms of Use</a> and <a href="#" target="_blank" data-role="none">Privacy &amp; Cookies</a>.</p>
    </section>
    <section>
      <img src="/resources/images/xbox_logo.png" alt="XBOX" width="118" height="35" />
    </section>
  </div>
</footer>
<?php 
}else{ 
}
?>
