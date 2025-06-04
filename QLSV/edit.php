<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "qlsv";

    $conn = new mysqli($servername,$username,$password,$database);

    if ($conn->connect_error){
        die("Ket noi that bai");
    }

    $Id = isset($_GET['Id']) ? intval($_GET['Id']) : 0;
    $query = "SELECT * FROM user_info WHERE Id = $Id";
    $result = $conn->query($query);
    $hocsinh = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $gioitinh = $_POST['gioitinh'];
        $khoahoc = $_POST['khoahoc'];

        $query = "UPDATE user_info SET hovaten='$hoten',email='$email',sdt='$sdt',ngaysinh='$ngaysinh',diachi='$diachi',gioitinh='$gioitinh',khoahoc='$khoahoc' WHERE Id='$Id'";

        if ($conn->query($query)===TRUE){
            echo "<script>alert('Cap nhat thanh cong'); window.location.href='student_list.php';</script>";
        } else {
            echo "<script>alert('Cap nhat that bai'); </script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <a href="student_list.php">Tro ve</a>
        <input type="hidden" name="Id" value="<?php echo $hocsinh['Id'] ?>">
        <table>
                <tr>
                    <td><label for="">Ho va ten : </label></td>
                    <td><input type="text" name="hoten" value="<?php echo $hocsinh['hovaten']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Email : </label></td>
                    <td><input type="text" name="email" value="<?php echo $hocsinh['email']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Sdt : </label></td>
                    <td><input type="text" name="sdt" value="<?php echo $hocsinh['sdt']; ?>" ></td>
                </tr>
                <tr>
                    <td><label for="">Ngay sinh : </label></td>
                    <td><input type="text" name="ngaysinh" value="<?php echo $hocsinh['ngaysinh']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Dia chi : </label></td>
                    <td><input type="text" name="diachi" value="<?php echo $hocsinh['diachi']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Gioi tinh : </label></td>
                    <td><input type="text" name="gioitinh" value="<?php echo $hocsinh['gioitinh']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Khoa hoc</label></td>
                    <td>
                        <select name="khoahoc" id="khoahoc">
                            <option value="Phat trien Web">Phat trien Web</option>
                            <option value="Khoa hoc du lieu">Khoa hoc du lieu</option>
                            <option value="Phat trien ung dung di dong">Phat trien ung dung di dong</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Cap nhat"></td>
                </tr>
    </form>
</body>
</html>