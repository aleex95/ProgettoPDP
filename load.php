<!DOCTYPE html>
<html>
<head>
	<title>Carica</title>
</head>
<body>
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pdp_alunni";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM alunno";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<form action=process.php method=POST>";
	    echo "<select name=carica><optgroup>";
        while($row = $result->fetch_assoc()) {
        	echo "<p>$row[ID_ALUNNO]</p>";
        	echo "ciao";
            echo "<option value=$row[ID_ALUNNO]>$row[Cognome] $row[Nome]</option>";
	   	}
        echo "</optgroup></select>";
	    echo "<button name=alunnoscelto value=scelto>Invia</button>";
        echo "</form>";
	} else {
	    echo "0 results";
	}
	echo "$row[ID_ALUNNO]";
	$conn->close();
?>
</body>
</html>