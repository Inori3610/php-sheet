<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "qlsv";

    $conn = new mysqli($servername,$username,$password,$db_name);

    if ($conn->connect_error){
        die("Ket noi that bai");
    }

    $query = "SELECT Id,email FROM user_info";

    $result = $conn->query($query);
    
    $count = 0;
    if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
            $email=$row['email'];
            if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){
                $query_del = "DELETE FROM user_info WHERE Id = {$row['Id']}";
                $conn->query($query_del);
                $count += 1;
            }                   
        endwhile;
    endif;
    echo "<script>alert('Da xoa $count tk');window.location.href='student_list.php';</script>";

?>