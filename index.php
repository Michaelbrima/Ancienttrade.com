<?php

$title = $_POST["title"];
$description = $_POST["description"];
$price = $_POST["price"];
//$price = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT); //checks to verify whether a value is filled or not (null)
$image = $_POST["image"];


//print_r($_POST); // prints out form data to php file on browser

//var_dump($title, $description, $price, $image); //to see results in array form

$host = "localhost";
$dbname = "at_db";
$username = "tester99";
$password = "tester99";

$conn = mysqli_connect(hostname: $host, 
				username: $username, 
				password: $password, 
				database: $dbname);
				
if (mysqli_connect_errno()){ //'mysqli_connect_errno' checks to see if there
// is an error with connecting to the mysql database (if no error, it 
//returns 0)
	die("Connection error " . mysqli_connect_error());// 'mysqli_connect_error
// gives message of what the error of the attempt to connect to the mysql database was	
}

//else:

//echo "Connection successful"; //Writes out "Connection successful to php file in browser.


$sql = "INSERT INTO hats (Title, Description, Price, Image)
	VALUES (?, ?, ?, ?)"; //we shouldnt put dollar sign values here and use 
//	a prepared statement instead in order to prevent sql injection (or an 
//  attacker inserting sql code by inserting single quote characters in the form data
// Connecting values to the placeholders in the 'sql' string is known as 
// binding

$stmt =mysqli_stmt_init($conn); //we pass the connection into 
//'mysqli_stmt_init' as an arguement in order to create a prepared statement
// object

//mysqli_stmt_prepare($stmt, $sql) 

if ( ! mysqli_stmt_prepare($stmt, $sql)) { //returns a boolean success value that basicallystates whether the information entered into the form was saved successfully
	die(mysqli_error($conn));
}


mysqli_stmt_bind_param($stmt, "sssb",
						$title,
						$description,
						$price,
						$image);
						
mysqli_stmt_execute($stmt);

echo "The record has been saved.";


?>