<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

// Displays Turkish letters
mysqli_select_db($mysqli, DATABASE);
mysqli_query($mysqli, "SET NAMES UTF8");

sec_session_start();
include 'languages/langConfig.php';

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
                        <h4><?php echo $lang['register_title'] ?></h4>
                      </div>

                      <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right navBar">
                          <li><a href="home.php"><img class="button-image" src="images/home.png"> <?php echo $lang['nav_home'] ?></a></li>
                          <li><a href="new.php"><img class="button-image" src="images/add.png"> <?php echo $lang['nav_new'] ?></a></li>
                          <li class="active"><a href="register.php"><img class="button-image" src="images/register.png"> <?php echo $lang['nav_settings'] ?></a></li>
                          <li><a href="downloadExcel.php"><img class="button-image" src="images/download.png"> <?php echo $lang['nav_download'] ?></a></li>
                          <li><a href="includes/logout.php"><img class="button-image" src="images/logout.png"> <?php echo $lang['nav_logout'] ?></a></li>
                        </ul>
                      </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                  </nav>

                <?php
                if (!empty($error_msg)) {
                    echo $error_msg;
                }
                ?>

                <div style="background-color: #f8f8f8; padding: 10px; margin: 5px;">
                  <h4 class="text-center"><?php echo $lang['register_lang'] ?></h4>
                  <div class="text-center">
                    <p>
                      <a href="<?php echo $link_register_en ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang1'] ?></a> | 
                      <a href="<?php echo $link_register_tr ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang2'] ?></a> | 
                      <a href="<?php echo $link_register_de ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang3'] ?></a>
                    </p>
                  </div>
                </div>

                <div class="form-row">
                  <form action="sets.php" method="POST">
                    
                      <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                        <label for="newLang"><?php echo $lang['register_settings_newLang'] ?></label>
                        <input type="text" class="form-control col-xs-8 col-sm-8 col-md-3 col-lg-3" name="newLang" id="newLang" placeholder="<?php echo $lang['register_settings_ph1'] ?>">

                        <button name='newLangButton' id='newLangButton' type='submit' class='btn btn-primary btn-new-settings-gr col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Add'] ?></button>
                      </div>

                      <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                        <label for="lang"><?php echo $lang['register_settings_delLang'] ?></label>
                        <select type="text" name="lang" id="lang" class="form-control col-xs-8 col-sm-8 col-md-3 col-lg-3">
                          <?php 
                            $sqlLang = "SELECT * FROM language";
                            $result = $mysqli->query($sqlLang);
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                echo "<option>" . $row['language'] . "</option>";
                              }
                            }else{echo "<option selected>".$lang['register_settings_ph2']."</option>";}
                          ?>
                        </select>

                        <button name='delLangButton' id='delLangButton' type='submit' class='btn btn-danger btn-new-settings-re col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Delete'] ?></button>
                      </div>

                      <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                        <label for="newCat"><?php echo $lang['register_settings_newCat'] ?></label>
                        <input type="text" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4" name="newCat" id="newCat" placeholder="<?php echo $lang['register_settings_ph3'] ?>">

                        <button name='newCatButton' id='newCatButton' type='submit' class='btn btn-primary btn-new-settings-gr col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Add'] ?></button>
                      </div>

                      <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                        <label for="cat"><?php echo $lang['register_settings_delCat'] ?></label>
                        <select type="text" name="cat" id="cat" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4">
                          <?php 
                            $sqlLang = "SELECT * FROM category";
                            $result = $mysqli->query($sqlLang);
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                echo "<option>" . $row['category'] . "</option>";
                              }
                            }else{echo "<option selected>".$lang['register_settings_ph4']."</option>";}
                          ?>
                        </select>

                        <button name='delCatButton' id='delCatButton' type='submit' class='btn btn-danger btn-new-settings-re col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Delete'] ?></button>
                      </div>

                  </form>
                </div>


                <div  class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px;">
                  <!-- Table -->
                  <form action="register.php" method="POST">
                    <h1 class="text-center"><?php echo $lang['register_edit'] ?></h1>
                    <table id="userTable" class="table table-striped table-light table-hover table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th class="text-left table-title col-xs-9 col-sm-9 col-md-9 col-lg-9" data-field="user"><?php echo $lang['register_edit_Username'] ?></th>
                          <th class="text-left table-title col-xs-3 col-sm-3 col-md-3 col-lg-3" data-field="deleteUser"><?php echo $lang['register_edit_Delete'] ?></th>
                        </tr>
                      </thead>
                      <tbody class="search-box" id="tableRow" name="tableRow">
                        <?php
                          $sqlUser = "SELECT * FROM members";
                          $result = $mysqli->query($sqlUser);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<tr class='table-row'><td>".$row["username"]."</td> <td class='btn-danger text-center'><a href='register.php?id=".$row["id"]."'>".$lang['register_edit_Delete']."</a></td> </tr>";
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </form>
                </div>


                <div  class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px;">
                  <h1 class="text-center"><?php echo $lang['register_create'] ?></h1>
                  <p class="text-center"><?php echo $lang['register_create_p1'] ?></br><?php echo $lang['register_create_p2'] ?></br><?php echo $lang['register_create_p3'] ?></br><?php echo $lang['register_create_p4'] ?></p>
                  <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">

                          <div class="form-group col-md-12">
                              <label for="username"><?php echo $lang['register_create_Username'] ?></label>
                              <input type="text" class="form-control" name="username" id="username" placeholder="Ron_Weasley">
                          </div>

                          <div class="form-group col-md-12">
                              <label for="email"><?php echo $lang['register_create_Email'] ?></label>
                              <input type="text" class="form-control" name="email" id="email" placeholder="r.weasley@hogwarts.com">
                          </div>

                          <div class="form-group col-md-12">
                              <label for="password"><?php echo $lang['register_create_Password'] ?></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Lumos1">
                          </div>

                          <div class="form-group col-md-12">
                              <label for="confirmpwd"><?php echo $lang['register_create_Confirm'] ?></label>
                              <input type="password" class="form-control" name="confirmpwd" id="confirmpwd" placeholder="Lumos1">
                          </div>

                          <input class="btn btn-primary col-md-12 center-block btn-new-submit"
                                  type="button" 
                                 value="<?php echo $lang['register_create_Register'] ?>" 
                                 onclick="return regformhash(this.form,
                                                 this.form.username,
                                                 this.form.email,
                                                 this.form.password,
                                                 this.form.confirmpwd);" /> 

                  </form>
                </div>

            </div>

        <?php else : ?>
            <?php header('Location: index.php'); ?>

        <?php endif; ?>
    </body>
</html>