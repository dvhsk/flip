<?php

function login()
{
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if ($email == null || $pass == null) {
            $message = "Nhập đủ rồi mình nói chuyện tiếp...";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $connect = new mysqli("localhost", "root", "", "flipform");
            mysqli_set_charset($connect, "utf8");
            if ($connect->connect_error) {
                die();
            }

            $query = "SELECT * FROM PEOPLE WHERE EMAIL = '" . $email . "' AND PASSWORD='" . $pass . "'";
            $result = mysqli_query($connect, $query);
            $data = array();
            while ($row = mysqli_fetch_array($result, 1)) {
                $data = $row;
            }
            $connect->close();

            if ($data != null && count($data) > 0) {
                header("Location:https://dvhsk.github.io/dvhuzg");
            }
        }
    }
}
