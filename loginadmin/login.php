<?php
ob_start();
session_start();
require_once "../dbcontroller.php";
$db = new dbcontroller;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
        .container{
            box-shadow: 3px 6px 17px black;
        }
        button {
          width: 10em;
          position: relative;
          height: 3.5em;
          border: 3px ridge #149CEA;
          outline: none;
          background-color: transparent;
          color: white;
          margin-top: 20px;
          margin-bottom: 40px;
          cursor: pointer;
          transition: 1s;
          border-radius: 0.3em;
          font-size: 16px;
          font-weight: bold;
        }

        button::after {
          content: "";
          position: absolute;
          top: -10px;
          left: 3%;
          width: 95%;
          height: 40%;
          background-color: #1b4d89;
          transition: 0.5s;
          transform-origin: center;
        }

        button::before {
          content: "";
          transform-origin: center;
          position: absolute;
          top: 80%;
          left: 3%;
          width: 95%;
          height: 40%;
          background-color: #1b4d89;
          transition: 0.5s;
        }

        button:hover::before, button:hover::after {
          transform: scale(0)
        }

        button:hover {
          box-shadow: inset 0px 0px 25px #1479EA;
        }
        .input-group {
     position: relative;
    }

    .input {
     border: solid 1.5px #9e9e9e;
     border-radius: 1rem;
     background: none;
     padding: 1rem;
     font-size: 1rem;
     color: white;
     transition: border 150ms cubic-bezier(0.4,0,0.2,1);
    }

    .user-label {
     position: absolute;
     left: 15px;
     color: #9e9e9e;
     font-size: 14px;
     pointer-events: none;
     background-color: #1b4d89;
     transform: translateY(1.0rem);
     margin-left: 60px;
     background-color: ;
     transition: 150ms cubic-bezier(0.4,0,0.2,1);
    }

    .input:focus, input:valid {
     outline: none;
     border: 1.5px solid #1a73e8;
    }

    .input:focus ~ label, input:valid ~ label {
     transform: translateY(-40%) scale(0.8);
     padding: 0 .2em;
     color: #2196f3;
    }
    .input-hidden {
      position: absolute;
      left: -9999px;
    }

    .brand-title {
      margin-top: 10px;
      font-weight: 900;
      font-size: 1.8rem;
      font-family: 'Baloo Tamma 2', sans-serif;
      font-size: 75px;
      background: -webkit-linear-gradient(red, yellow); -webkit-background-clip: 
      text;-webkit-text-fill-color: transparent;
      letter-spacing: 1px;
      margin-bottom: 20px;
    }
    </style>
</head>

<body style="background-image: url('bg3.jpg'); background-size: cover;">
    <div class="container" style="background-color: #1b4d89; background-size: cover;width: 400px;  margin: 25px 70px; border-radius: 30px; margin-left: auto; margin-right: auto;">
        <div style="padding: 5px;">
            <center><a href="../index.php"><img src="../loginadmin/logo1.png"></a></center>

            <div>
                <center><h1 style="color:white; font-family: 'Oleo Script', cursive;">Admin Panel</h1></center>
            </div>
            <br>
            <center>
            <div class="inputs">

              <form action="" method="post" autocomplete="off">
                <div class="input-group" style="margin-left: ;">
                    <input required="" type="text" name="username" id="Username" autocomplete="off" class="input" style="width: 235px;">
                  <label class="user-label" >Username</label>
                </div>
                <br>
                <div class="input-group" style="margin-left: ;">
                  <input required="" type="password" name="password" id="password" autocomplete="off" class="input" style="width: 235px;">
                  <label class="user-label" >Password</label>
                </div>
                <button type="submit" name="login">Sign in <i class="fa-solid fa-play"></i></button>
              </form>
              <div style="margin-left: 120px; display: flex;">
                    <p style="font-size: 13px; color: white;">Don't have an account
                    <a href="registrasi.php" style="color: greenyellow;">Sign Up</a></p>     
              </div>
            </div>
          </center>
        </div>
      </div>
</body>

</html>

<?php

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM t_admin WHERE f_username='$user' AND f_password='$password' AND f_level='Admin'";
    $count = $db->rowCOUNT($sql);

    if ($count == 0) {
        echo "<center><h3>Username Atau Password Salah</h3></center>";
    } else {
        $sql = "SELECT * FROM t_admin WHERE f_username='$user' AND f_password='$password'";
        $row = $db->getITEM($sql);

        $_SESSION['admin'] = $row['f_username'];
        $_SESSION['level'] = $row['f_level'];
        $_SESSION['id'] = $row['f_id'];

        header("location:index.php");
    }
}
?>