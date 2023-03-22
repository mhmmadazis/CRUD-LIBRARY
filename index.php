<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        button {
          width: 10em;
          position: relative;
          height: 3.5em;
          border: 3px ridge white;
          outline: none;
          background-color: transparent;
          color: black;
          margin-top: 30px;
          margin-bottom: 40px;
          cursor: pointer;
          transition: 1s;
          border-radius: 0.3em;
          font-size: 16px;
          font-weight: bold;
        }

         

        button:hover::before, button:hover::after {
          transform: scale(0)
        }

        button:hover {
          box-shadow: inset 0px 0px 25px #1479EA;
        }
    </style>
</head>

<body style="background-image: url('image/bglogin.png'); background-size: cover;">
    <div class="container" style="background-image: url('bg_login.png'); background-size: cover;  margin: -5px 70px; border-radius: 30px;">
        <div style="padding: 5px;">
            <center><a href="index.php"><img src="logo.png"></a></center>

            <div>
                <center><h1 style="color:white; font-family: 'Oleo Script', cursive;">Welcome</h1></center>

                <center><h style="color:white; font-family: 'Rubik', sans-serif;">Choose your Account!</h></center>
            </div>
            <br>
            
            <div>
                <center>
                    <div style="display: flex; justify-content: center;">
                        <form action="loginadmin/login.php" style="margin-right: 40px;">
                            <button style="color:#149CEA ;">Admin</button>
                        </form>
                        <form action="loginadmin/loginpus.php" style="margin-right: 40px;">
                            <button style="color:#149CEA ;">Pustakawan</button>
                        </form>
                        <form action="home/login.php">
                            <button style="color:#149CEA ;">Anggota</button>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>
</html>