<?php
$servername = "localhost";
$username = "panic";
$password = "newton";
$dbname = "ergasia_iouliou";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//escape special characters so that data can get inserted in the db
$title = mysqli_real_escape_string($conn,$_POST['title']);
$author = mysqli_real_escape_string($conn,$_POST['author']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$category = mysqli_real_escape_string($conn,$_POST['category']);

//insert query
$sql = "INSERT INTO books (title, author, `description`,category)
VALUES ('".$title. "', '".$author. "', '".$description. "','".$category. "')";

if ($conn->query($sql) === TRUE) {
  echo "<center><h4>New record created successfully</h4></center>";
  echo "<center><a href='index.html'>Return to Main Page</a></center>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>