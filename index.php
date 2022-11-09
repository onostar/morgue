<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="morgue, mortuary, dead bodies">
    <meta name="description" content="An application developed for the management of deadbodies placed in the morgue from a particular date to another">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morgue management | Login</title>
    <link rel="icon" type="image/png" size="32x32" href="images/logo.png">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <main id="reg_body">
    <section class="reg_log">
            
            <div class="login_page">
                <h1>
                    <a href="index.php">
                        <img src="images/logo.png" alt="logo">
                    </a>
                </h1>
                
                <h2>Welcome User!</h2>
                <p>Sign in to continue</p>
                <?php
                    if(isset($_SESSION['success'])){
                        echo "<p class='success succeed'>" . $_SESSION['success']. "</p>
                        <script>
                            setTimeout(function(){
                                $('.succeed').hide();
                            }, 5000);
                        </script>
                        ";
                        unset($_SESSION['success']);
                    }
                ?>
                
                <?php
                    if(isset($_SESSION['error'])){
                        echo "<p class='error succeed'>" . $_SESSION['error']. "</p>
                        <script>
                            setTimeout(function(){
                                $('.succeed').hide();
                            }, 5000)
                        </script>";
                        unset($_SESSION['error']);
                    }
                ?>
                <form action="controller/login.php" method="POST">
                    <div class="data">
                        <label for="username">Enter username</label>
                        <input type="text" name="username" id="username" placeholder="username" required value="<?php if(isset($_SESSION['email'])){
                            echo $_SESSION['email'];
                            unset($_SESSION['email']);
                        }?>">
                        
                    </div>
                    <div class="data">
                        <div class="pass">
                            <label for="password">Password</label>
                            <a href="views/forgot_password.php" title="Recover your password">Forgot password?</a>
                        </div>
                        <input type="password" name="password" id="password" class="password" placeholder="*******" required><br>
                        <div class="show_password">
                            <a href="javascript:void(0)" onclick="togglePassword()"><span class='icon'><i class="fas fa-eye"></i></span> <span class='icon_txt'>Show password</span></a>
                        </div>
                        
                    </div>
                    <div class="data">
                        <button type="submit" id="submit_login" name="submit_login">Sign in <i class="fas fa-sign-in-alt"></i></button>

                    </div>
                    
                </form>
                
                <div id="foot">
                    <p >&copy;<?php echo Date("Y");?> Morgue. All Rights Reserved.</p>

                </div>

            </div>
            <div class="adds">
                <img src="images/bus.jpg" alt="morgue login banner">
            </div>
        </section>
    </main>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</body>
</html>