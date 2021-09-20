<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $name_dtb = "westsidesneaker";

    $connect = new mysqli($servername, $username, $pass, $name_dtb);

    if($connect){
        mysqli_query($connect, "SET NAME 'UTF8'");
        echo "Ket noi thanh cong";
    } else {
        echo "Ket noi that bai";
    }
?>