<html>
<head>
    <title>Facebook Sweetness</title>
</head>
<body>
    <div>
      <?php if(!$fb_data['me']): ?>
        Please login with your FB account: <a target="_parent" href="<?php echo $fb_data['loginUrl']; ?>">login</a>
        <!-- Or you can use XFBML -->
      <?php else: ?>
      <img src="https://graph.facebook.com/<?php echo $fb_data['uid']; ?>/picture" alt="" class="pic" />
      <p>Hi <?php echo $fb_data['me']['name']; ?>,<br />
        <a href="<?php echo site_url('landing'); ?>">You can access the top secret page</a> or <a href="<?php echo $fb_data['logoutUrl']; ?>">logout</a> </p>
      <?php endif; ?>
    </div>
</body>

</html>