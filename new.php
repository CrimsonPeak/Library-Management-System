<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Library</title>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/library.css">
          <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
          <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
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
                    <h4>Add New Book</h4>
                  </div>

                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right navBar">
                      <li><a href="home.php"><img class="button-image" src="images/home.png"> Home</a></li>
                      <li class="active"><a href="new.php"><img class="button-image" src="images/add.png"> New</a></li>
                      <li><a href="register.php"><img class="button-image" src="images/register.png"> Settings</a></li>
                      <li><a href="downloadExcel.php"><img class="button-image" src="images/download.png"> Download</a></li>
                      <li><a href="includes/logout.php"><img class="button-image" src="images/logout.png"> Logout</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
              </nav>

              <form action="new-php.php" method="post">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="isbn">ISBN</label>
                    <input type="number" class="form-control" name="isbn" id="isbn" placeholder="9781408855928">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Harry Potter and the Goblet of Fire">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="author">Author</label>
                  <input type="text" class="form-control" name="author" id="author" placeholder="Joanne K. Rowling">
                </div>
                <div class="form-group col-md-6">
                  <label for="publisher">Publisher</label>
                  <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Bloomsbury">
                </div>
                <div class="form-group col-md-3">
                  <label for="print_date">Print Date</label>
                  <input type="text" class="form-control date-own" name="print_date" id="print_date" placeholder="2014">
                  
                  <script type="text/javascript">
                      $('.date-own').datepicker({
                         minViewMode: 2,
                         format: 'yyyy'
                       });
                  </script>
                </div>
                <div class="form-group col-md-3">
                  <label for="date_received">Date Received</label>
                  <input type="text" class="form-control date-own2" name="date_received" id="date_received" placeholder="13.05.2017">

                  <script type="text/javascript">
                      $('.date-own2').datepicker({
                         format: 'dd.mm.yyyy'
                       });
                  </script>
                </div>
                <div class="form-group col-md-3">
                  <label for="volume">Volume</label>
                  <input type="text" class="form-control" name="volume" id="volume" placeholder="4/7">
                </div>
                <div class="form-group col-md-3">
                  <label for="language">Language</label>
                  <select type="text" name="language" id="language" class="form-control">
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
                </div>
                <div class="form-group col-md-3">
                  <label for="category">Category</label>
                  <select type="text" name="category" id="category" class="form-control">
                    <?php 
                      $sqlCat = "SELECT * FROM category";
                      $result = $mysqli->query($sqlCat);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "<option>" . $row['category'] . "</option>";
                        }
                      }else{echo "<option selected>Book</option>";}
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="read">Read</label>
                  <select type="text" name="read" id="read" class="form-control">
                    <option selected>No</option>
                    <option>Yes</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="lend">Lend</label>
                  <select type="text" name="lend" id="lend" class="form-control">
                    <option selected>No</option>
                    <option>Yes</option>
                  </select>
                </div>
                <div class="form-group col-md-9">
                  <label for="lend_to">Lend To</label>
                  <input type="text" class="form-control" name="lend_to" id="lend_to" placeholder="Hermine Granger">
                </div>

                <button type="submit" class="btn btn-primary col-md-12 center-block btn-new-submit">Add</button>
              </form>
            </div>

        <?php else : ?>
            <?php header('Location: index.php'); ?>

        <?php endif; ?>
    </body>
</html>