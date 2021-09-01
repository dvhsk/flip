<?php
function register()
{
    if (!empty($_GET)) {
        $fullname = $_GET['fullname'];
        $email = $_GET['email1'];
        $password = $_GET['password1'];
        // echo $fullname;
        if ($fullname == null || $email == null || $password == null) {
            $message = "Nhập đầy đủ vào bạn êi!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $connect = new mysqli("localhost", "root", "", "flipform");
            mysqli_set_charset($connect, "utf8");
            if ($connect->connect_error) {
                die();
            }

            $query = "INSERT INTO PEOPLE(FULL_NAME, EMAIL, PASSWORD) VALUES('" . $fullname . "','" . $email . "','" . $password . "')";
            mysqli_query($connect, $query);
            $connect->close();

            $message = "OK rồi nhá";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}
