<?php
include_once 'psl-config.php'; 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

$table_name = TABLE;

$id_no = ID;
$isbn_no = ISBN;
$name = NAME;
$author = AUTHOR;
$publisher = PUBLISHER;
$print_date = PRINT_DATE;
$date_received = DATE_RECEIVED;
$volume = VOLUME;
$language = LANGUAGE;
$category = CATEGORY;
$read = READ;
$lend = LEND;
$lend_to = LEND_TO;

// Displays Turkish letters
mysqli_select_db($mysqli, DATABASE);
mysqli_query($mysqli, "SET NAMES UTF8");