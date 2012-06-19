<html>
<head>
    <title>Facebook Sweetness</title>
</head>
<body>
    <h1>Facebook stuff</h1>

    <?php if (@$user_profile): ?>
        <pre>
            <?php echo print_r($user_profile, TRUE) ?>
        </pre>
        <a target="_parent" href="<?php echo $logout_url ?>">Logout of this thing</a>
    <?php else: ?>
        <h2>Welcome to this facebook thing, please login below</h2>
        <a target="_parent" href="<?php echo $login_url ?>">Login to this thing</a>
    <?php endif; ?>

</body>

</html>