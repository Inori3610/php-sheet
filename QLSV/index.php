    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "qlsv";

        $conn = new mysqli($servername,$username,$password,$database);

        if ($conn->connect_error){
            die("Connection failed" . $conn->connect_error);
        }

        //$query = " INSERT INTO user_info (Id,hovaten,email,sdt,ngaysinh,diachi,gioitinh,khoahoc) VALUES (NULL,'$hoten','$email','$sdt','$ngaysinh','$diachi','$gioitinh','$khoahoc')";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $hoten = $_POST["hoten"];
            $email = $_POST["email"];
            $sdt = $_POST["sdt"];
            $ngaysinh = $_POST["ngaysinh"];
            $diachi = $_POST["diachi"];
            $gioitinh = $_POST["gender"];
            $khoahoc = $_POST["khoahoc"];
            header("Location : index.php");

            $query = " INSERT INTO user_info (Id,hovaten,email,sdt,ngaysinh,diachi,gioitinh,khoahoc) VALUES (NULL,'$hoten','$email','$sdt','$ngaysinh','$diachi','$gioitinh','$khoahoc')";
            if ($conn->query($query) === TRUE ){
                echo "<script>alert('Registration successful');</script>";
            } else {
                echo "<script>alert('Registration successful');</script>";
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
            <table>
                <tr>
                    <td><label for="">Ho va ten : </label></td>
                    <td><input type="text" name="hoten" placeholder="Nhap ho ten" required></td>
                </tr>
                <tr>
                    <td><label for="">Email : </label></td>
                    <td><input type="text" name="email" placeholder="Nhap email" required></td>
                </tr>
                <tr>
                    <td><label for="">Sdt : </label></td>
                    <td><input type="text" name="sdt" placeholder="Nhap Sdt" ></td>
                </tr>
                <tr>
                    <td><label for="">Ngay sinh : </label></td>
                    <td><input type="text" name="ngaysinh" placeholder="Nhap ngay sinh" required></td>
                </tr>
                <tr>
                    <td><label for="">Dia chi : </label></td>
                    <td><input type="text" name="diachi" placeholder="Nhap dia chi"></td>
                </tr>
                <tr>
                    <td><label for="">Gioi tinh : </label></td>
                    <td> <input type="radio" id="male" name="gender" value="Nam">
                            <label for="male">Nam</label><br>
                            <input type="radio" id="female" name="gender" value="Nu">
                            <label for="female">Nữ</label><br>
                            <input type="radio" id="other" name="gender" value="Khac">
                            <label for="other">Khác</label><br>
                        </td>
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
                    <td><input type="submit" value="Dang ky"></td>
                    <td><input type="reset" value="Xoa form"></td>
                </tr>
            </table>
            
        </form>
        <a href="student_list.php">Hien thi tat ca hoc sinh dang ky</a>

    </body>
    </html>