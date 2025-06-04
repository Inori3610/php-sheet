<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "qlsv";

    $conn = new mysqli($servername,$username,$password,$db_name);

    if ($conn->connect_error){
        die("Ket noi that bai");
    }

    $Id = isset($_GET['Id']) ? intval($_GET['Id']) : 0;

    $query = "DELETE FROM user_info WHERE Id = $Id";

    if ($conn->query($query)===TRUE){
        echo "<script>alert('Xoa thanh cong'); window.location.href='student_list.php';</script>";
    } else {
        echo "<script>alert('Xoa that bai');</script>";
    }


?>