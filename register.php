<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

// Displays Turkish letters
mysqli_select_db($mysqli, DATABASE);
mysqli_query($mysqli, "SET NAMES UTF8");

sec_session_start();

$sqlUser = "SELECT * FROM members";
$result = $mysqli->query($sqlUser);
if(isset($_GET['id'])){
  if($result->num_rows > 1){
    $idUser = $_GET['id'];
    $sqlDelete = "DELETE FROM members WHERE id='$idUser'";

    if(mysqli_query($mysqli, $sqlDelete)){
      header("Location: register.php");
    }
    else{
      echo "Error: " . $sqlUser . "<br>" . mysqli_error($mysqli);
    }
  }
  else {
    header("Location: register.php");
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Settings</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/library.css">
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
        <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <div class="container">

                <!-- Static navbar -->
                  <nav class="navbar navbar-default">
                    <div class="container-fluid">
                      <div class="navbar-header col-md-5">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <h4>Settings</h4>
                      </div>

                      <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right navBar">
                          <li><a href="home.php"><img class="button-image" src="images/home.png"> Home</a></li>
                          <li><a href="new.php"><img class="button-image" src="images/add.png"> New</a></li>
                          <li class="active"><a href="register.php"><img class="button-image" src="images/register.png"> Settings</a></li>
                          <li><a href="downloadExcel.php"><img class="button-image" src="images/download.png"> Download</a></li>
                          <li><a href="includes/logout.php"><img class="button-image" src="images/logout.png"> Logout</a></li>
                        </ul>
                      </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                  </nav>

                <?php
                if (!empty($error_msg)) {
                    echo $error_msg;
                }
                ?>

                <h1 class="text-center">Settings</h1>

                <form action="sets.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <label for="newLang">Add new Language: </label>
                      <input type="text" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4" name="newLang" id="newLang" placeholder="English">

                      <button name='newLangButton' id='newLangButton' type='submit' class='btn btn-primary btn-new-settings-gr col-xs-4 col-sm-4 col-md-2 col-lg-2'>Add</button>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <label for="lang">Delete Languages</label>
                      <select type="text" name="lang" id="lang" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4">
                        <?php 
                          $sqlLang = "SELECT * FROM language";
                          $result = $mysqli->query($sqlLang);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option>" . $row['language'] . "</option>";
                            }
                          }else{echo "<option selected>English</option>";}
                        ?>
                      </select>

                      <button name='delLangButton' id='delLangButton' type='submit' class='btn btn-danger btn-new-settings-re col-xs-4 col-sm-4 col-md-2 col-lg-2'>Delete</button>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <label for="newCat">Add new Category</label>
                      <input type="text" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4" name="newCat" id="newCat" placeholder="Book">

                      <button name='newCatButton' id='newCatButton' type='submit' class='btn btn-primary btn-new-settings-gr col-xs-4 col-sm-4 col-md-2 col-lg-2'>Add</button>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <label for="cat">Delete Categories</label>
                      <select type="text" name="cat" id="cat" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4">
                        <?php 
                          $sqlLang = "SELECT * FROM category";
                          $result = $mysqli->query($sqlLang);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option>" . $row['category'] . "</option>";
                            }
                          }else{echo "<option selected>Book</option>";}
                        ?>
                      </select>

                      <button name='delCatButton' id='delCatButton' type='submit' class='btn btn-danger btn-new-settings-re col-xs-4 col-sm-4 col-md-2 col-lg-2'>Delete</button>
                    </div>
                  </div>
                </form>

                <hr>

                <h1 class="text-center">Edit Users</h1>
                <!-- Table -->
                <form action="register.php" method="POST">
                <table id="userTable" class="table table-striped table-light table-hover table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th class="text-left table-title col-xs-9 col-sm-9 col-md-9 col-lg-9" data-field="user">Username</th>
                      <th class="text-left table-title col-xs-3 col-sm-3 col-md-3 col-lg-3" data-field="deleteUser">Delete</th>
                    </tr>
                  </thead>
                  <tbody class="search-box" id="tableRow" name="tableRow">
                    <?php
                      $sqlUser = "SELECT * FROM members";
                      $result = $mysqli->query($sqlUser);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "<tr class='table-row'><td>".$row["username"]."</td> <td class='btn-danger text-center'><a href='register.php?id=".$row["id"]."'>DELETE</a></td> </tr>";
                        }
                      }
                    ?>
                  </tbody>
                </table>
                </form>

                <hr>

                <h1 class="text-center">Create New User</h1>

                <p class="text-center">Usernames can only contain numbers, uppercase/lowercase letters, and underscores. </br> E-mail addresses must have a valid format. </br> Passwords must be at least six characters long. </br> Passwords must be included - at least one capital letter | at least one lower case letter | at least one digit</p>
                
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">

                        <div class="form-group col-md-12">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Ron_Weasley">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="r.weasley@hogwarts.com">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Lumos1">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="confirmpwd">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpwd" id="confirmpwd" placeholder="Lumos1">
                        </div>

                        <input class="btn btn-primary col-md-12 center-block btn-new-submit"
                                type="button" 
                               value="Register" 
                               onclick="return regformhash(this.form,
                                               this.form.username,
                                               this.form.email,
                                               this.form.password,
                                               this.form.confirmpwd);" /> 

                </form>

            </div>

        <?php else : ?>
            <?php header('Location: index.php'); ?>

        <?php endif; ?>
    </body>
</html>