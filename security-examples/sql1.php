<!DOCTYPE html>
<html>
<head>
	<title>SQL Injection</title>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
</head>
<body>

	 <div style="background-color:#c9c9c9;padding:15px;">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';">Main Page</button>
	</div>

	<div align="center">
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
		<p>John -> Doe</p>
		First name : <input type="text" name="firstname">
		<input type="submit" name="submit" value="Submit">
	</form>
	</div>


<?php 
	$servername = "mysql";
	$username = "root";
	$password = "root";
	$db = "1ccb8097d0e9ce9f154608be60224c7c";






//original bug
	// Create connection
//	$conn = mysqli_connect($servername,$username,$password,$db);

	// Check connection
//	if (!$conn) {
//    	die("Connection failed: " . mysqli_connect_error());
//	}
	//echo "Connected successfully";
	


//		$sql = "SELECT lastname FROM users WHERE firstname='$firstname'";//String
//		$result = mysqli_query($conn,$sql);
//
//		if (mysqli_num_rows($result) > 0) {
//        // output data of each row
//    		while($row = mysqli_fetch_assoc($result)) {
//       			echo $row["lastname"];
//       			echo "<br>";
//    		}
//		} else {
//    		echo "0 results";
//		}

if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
// fix
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $stmt = $pdo->prepare("SELECT lastname FROM users WHERE firstname=?");
        $stmt->execute([$firstname]);
        while ($row = $stmt->fetch()) {
            echo $row['lastname']."<br />\n";
        }
	}
	
 ?>
</body>
</html>
