<?php 
    require("database.php");
    $id_sach = $_POST["id"];
    $query = "DELETE FROM chitietgiohang WHERE idSach = ". $id_sach;
    $con->query($query);
    $con->close();
?>