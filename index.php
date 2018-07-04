<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/library.css">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 

        <form action="includes/process_login.php" method="post" name="login_form" class="form-signin">
          <h1 class="h3 mb-3 font-weight-normal">My Library</h1>
          <label for="email" class="sr-only">Email</label>
          <input type="text" id="email" name="email" required autocomplete="off" class="form-control" placeholder="Email" required autofocus>
          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" name="password" required autocomplete="off" class="form-control" placeholder="Password" required>
          <input class="btn btn-lg btn-primary btn-block" type="button" name="login" onclick="formhash(this.form, this.form.password);" value="Login"></input>
          
          <p></p>
          <p class="mt-5 mb-3 text-muted">Dont forget to <a href="includes/logout.php">log out</a>. </br> You are 'logged <?php echo $logged ?>'</p>
          <p class="mt-5 mb-3 text-muted">Crimson Peak - 2018</p>
        </form>

    </body>
</html>