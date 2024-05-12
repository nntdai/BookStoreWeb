<?php
    $con = mysqli_connect("localhost","root","","bookstoreweb");
    if (!$con)
    {
            die('Could not connect: ' . mysqli_error());
    }
?>