<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Chi tiet hoc sinh</h2>

    <?php
        echo "<p><b>{$account->username}</b></p>";
        echo "<p> Email: {$account->email}, Vai tro: {$account->role}, Trang thai: {$account->status} </p><br>";
    ?>

    <p><a href="javascript:history.back()">Back</a></p>
</body>
</html>