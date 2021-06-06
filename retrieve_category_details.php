<?php
$servername = "localhost";
$username = "panic";
$password = "newton";
$dbname = "ergasia_iouliou";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$post = json_decode($_POST['json']);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  $sql = "SELECT * FROM books where category = '".$post->category."' ";

  $result = $conn->query($sql) or die(mysqli_error($conn));

	$data = array();

	while ( $row = $result->fetch_assoc() )
	{
		$data[] = $row;
	}

	echo json_encode($data);

$conn->close();
?>