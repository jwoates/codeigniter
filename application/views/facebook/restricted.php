<header class="global-header">

</header>

<div class="gate-keeper"> 
<section class="age-gate">
    <h1 class="ager">Restricted</h1>
    <p style="color:#fff;">You do not meet the age requirements for this application.</p>
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
