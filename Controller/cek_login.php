<?php
include('../Config/koneksi.php');
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email-log'];
    $pass = $_POST['pass-log'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "SELECT * FROM tb_users WHERE email='$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_user'];
            $username = $row['username'];
            $userEmail = $row['email'];
            $userPass = $row['password'];
            $hak = $row['hak'];
        }
        if ($num != 0) {
            if ($userEmail == $email && $userPass == $pass) {
                if ($hak == 'admin') {
                    ?>
                    <script>alert("Anda masuk sebagai admin")</script>
                    <?php
                    header("Location:../View/index.php?username=" . urlencode($username));
                } elseif ($hak == 'registered') {
                    echo 'Selamat datang ' . $username;
                }
            } else {
                ?>
                <script>alert("Username / Password salah")</script><?php
                header('Location:../View/LoginPage.html');
            }
        } else {
            ?>
            <script>alert("User tidak ditemukan / belum terdaftar")</script><?php
            header('Location:../View/LoginPage.html');
        }
    } else {
        ?>
        <script>alert("Field jangan sampai kosong")</script><?php
        header('Location:../View/LoginPage.html');
    }
}




