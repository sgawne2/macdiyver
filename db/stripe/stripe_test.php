<?php
require_once('init.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    if($user['is_premium']) {
        echo "You are Premium <a href='secret.php'>Click for Secret Club</a>";
    } else {
        echo "You are not premium <a href='premium.php'>Pay me</a>";
    }
?>

</body>
</html>