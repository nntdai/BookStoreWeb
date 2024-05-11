<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Danh sach hoc sinh</h2>

    <?php
        for($i = 1; $i <= sizeof($studentList); $i++) {
            echo "<p>$i. <a href='?stid={$studentList[$i]->id}'>{$studentList[$i]->name}</a></p>";
        }
    ?>

    <br>
    <p><a href="index.php">Home page</a></p>
</body>
</html>