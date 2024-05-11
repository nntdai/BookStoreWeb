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
        echo "<p><b>{$student->name}</b></p>";
        echo "<p> Age: {$student->age}, School: {$student->university} </p><br>";
    ?>

    <p><a href="javascript:history.back()">Back</a></p>
</body>
</html>