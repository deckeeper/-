<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src='scripts.js' defer></script>
</head>
<body>
    <h1>e-Library Books List</h1>

    <div class="grid-container">
        <div class="item1">
            <h2>Categories</h2><br>
            <div class="progress">
                <!-- dynamically created the progress bars in case more categories needed to be added in the feauture -->
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
                    //find every category that is inserted in the database
                    $sql = 'SELECT category from books group by category';
                    $result = $conn->query($sql) or die(mysqli_error($conn));
                    while ( $row = $result->fetch_assoc() )
                    {
                        //for every category make a progress bar in the dom
                        $count = "SELECT count(*) as total from books where category = '".$row['category']."'";
                        $result_count = $conn->query($count) or die(mysqli_error($conn));
                        $row_count = $result_count->fetch_assoc();
                        echo '<progress max="100" value="'.$row_count['total'].'" data-label="'.$row['category']. ' ' . $row_count['total'] . '"></progress><br><br>';
                    }
                ?>
            </div>
            
            
        </div>
        <div class="item2">
            <br>
            <div class="data">
                Details for the Category : 
                <select name="category" id="category">
                    <option value="Mystery">Mystery</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasy">Fantasy</option>
                </select> <br><br>
            </div>
            
            <div class="data">
                <strong>Total :</strong> <span id="total"></span><br><br>
                <strong>Titles of the Books :</strong> <span id="titles"></span><br><br>
                <strong>Book's Author :</strong> <span id="authors"></span><br><br>
            </div>
            
        </div>
      </div>
</body>
</html>