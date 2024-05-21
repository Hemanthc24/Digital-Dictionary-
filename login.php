<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="log.css">
    <link rel="icon" type="image/x-icon" href="icons8-books-24.png">
</head>
<body>
    
 <header>
    <marquee class="logo" direction="right">Dictonary App</marquee>
    <nav class="navigation">
        <a href="login.php">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
        <a href="services.html">Services</a>
    </nav>
 </header>
 <div class="content">
        <h1 class="you">Your Dictonary<br></h1>
        <p class="par">Our dictionary is a treasure trove of words.<br> Our dictionary is a window into the world of language,<br> Our dictionary is a tool for learning and discovery,<br>Our dictionary is a friend to the writer and the reader,<br>Our dictionary is a source of knowledge and inspiration.</p>
    </div>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index1.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <span class="icon"><ion-icon name="mail-unread"></ion-icon></span>
            <input type="email" name="email" required>
            <label>Email</label>
        </div>
        <div class="form-group">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required>
            <label>Password</label>
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-dark">
        </div>
      </form>
      <div><p class="regi">Not registered yet: <a href="registration.php">Register Here</a></p></div>
    </div>
    <script str="cs.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
