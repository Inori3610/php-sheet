<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "qlsv";

    $conn = new mysqli($servername,$username,$password,$database);

    if ($conn->connect_error){
        die("Ket noi that bai");
    }

    $query = "SELECT * FROM user_info";

    $result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Tro ve</a>
    <table border="2px" cellpadding="5px">
        <tr>
            <th>Id</th>
            <th>Ho va ten</th>
            <th>Email</th>
            <th>SDT</th>
            <th>Ngay sinh</th>
            <th>Dia chi</th>
            <th>Gioi tinh</th>
            <th>Khoa hoc</th>
            <th>Hanh dong</th>
        </tr>
            <?php if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['hovaten']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['sdt']; ?></td>
                        <td><?php echo $row['ngaysinh']; ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['gioitinh']; ?></td>
                        <td><?php echo $row['khoahoc']; ?></td>
                        <td>
                            <a href="edit.php?Id=<?php echo $row['Id'] ?>">Xua</a> | 
                            <a href="delete.php?Id=<?php echo $row['Id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xoa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="9">Khong co hoc sinh nao</td></tr>
            <?php endif ?>
    </table>
    <a href="delete_all_if.php">Xoa het tk email loi</a>
</body>
</html>