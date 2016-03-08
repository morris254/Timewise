<?php
// This file provides the information for accessing the database.and connecting
//to MySQL. It also sets the language coding to utf-8

// First we define the constants:
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'timewise');

// Next we assign the database connection to a variable that we will call $dbcon:
$dbcon = @mysqli_connect (localhost, root, root, timewise)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error () );
// Finally, we set the language encoding.as utf-8
mysqli_set_charset($dbcon, 'utf8');