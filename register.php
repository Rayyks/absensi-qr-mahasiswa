<html>

<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('koneksi.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($db_koneksi, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($db_koneksi, $password);
        $level = stripslashes($_REQUEST['level']);
        $level = mysqli_real_escape_string($db_koneksi, $level);
        $nama = stripslashes($_REQUEST['nama']);
        $nama = mysqli_real_escape_string($db_koneksi, $nama);
        $query = "INSERT into `user` (nama, username, password, level) 
		VALUES ('$nama', '$username', '$password', '$level')";
        $result = mysqli_query($db_koneksi, $query);
        if ($result) {
            echo "<div class='form'>
<h3>Registrasi Berhasil.</h3>
<br/>Klik disini untuk <a href='index1.php'>Login</a></div>";
        }
    } else {
    ?>
        <table align="center">
            <tr>
                <th align="center" colspan="2">Registrasi</th>
            </tr>
            <form name="registration" action="" method="post">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="nama" placeholder="Nama" required /></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Username" required /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Password" required /></td>
                </tr>

                <tr>
                    <td bgcolor="#ffc0cb"><strong>Level</strong></td>
                    <td bgcolor="#ffc0cb">
                        <select name="level">
                            <option value="dosen">dosen
                            <option value="mahasiswa">mahasiswa
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Register" /></td>
                </tr>
            </form>
        <?php } ?>
</body>

</html>