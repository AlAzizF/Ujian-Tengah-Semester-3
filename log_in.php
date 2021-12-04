<?php
    session_start();
    include "koneksi.php";
?>

<html>
<head>
<title>Masuk dulu lahh</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-image: url(bg1.jpg);
}
body,td,th {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #FFF;
	font-size: 24px;
}
</style>
</head>
<body> 
<div align="center"><br/>
  <br/>
  <br/>
  <br/>
  Selamat Datang di Portal Cuti Perusahaan PT. Mencari Cinta Sejati<br/>
  <br/>
</div>
<form method="post" align="center">
         
  <label> Nama Pengguna </label><input type="text" name="user" placeholder="masukan username"><br><br>        
        <label> Kata Sandi </label><input type="password" name="pass" placeholder="hati - hati passwordnya"> <br><br>
        <label>Jabatan:</label>
            <select name="jabatan">
                <option value="HRD">HRD</option>
                <option value="produksi">Produksi</option>
                <option value="marketing">Marketing</option>
            </select>
            <br><br>
        <input type="submit" name="login" value="login"/><br>
</form>
<?php
    if (isset($_POST['login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $data_user = mysqli_query ($koneksi,"SELECT * FROM log_in WHERE username='$user' AND password=md5('$pass')");
        $r = mysqli_fetch_array($data_user);
        $username=$r['username'];
        $password=$r['password'];
        $jabatan=$r['jabatan'];

        if ($user==$username && $pass=$password){
            $_SESSION['jabatan']=$jabatan;
            header ("location:cuti.php");
            exit;
        }
        else{
            echo "Yeee lu salah masukin data";
        }
    }
?>
</body>
</html>


