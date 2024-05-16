<?php
    $con = mysqli_connect("localhost","root","1234","bookstoreweb");
    if (!$con)
    {
            die('Could not connect: ' . mysqli_error());
    }
?>