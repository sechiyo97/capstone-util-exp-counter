<!DOCTYPE html>
<head>
	<meta charset = "utf-8">
	<title>DB Function</title>
</head>
<body>
	<?php

	$cnt = 0;

	function takeQ( $sql ){
		global $conn;
		global $cnt;
		$cnt = $cnt + 1;
		if (mysqli_query($conn,$sql)){
			echo 'Query '.$cnt.' [Success] =? '.$sql.'<br/>';
		}
		else{
			echo 'Query '.$cnt.' [Error] =? '.$sql.'<br/>Errormsg : '.mysqli_error($conn).'<br/>';	
		}
	}

	function createExperimentTable(){
		$sql = "CREATE TABLE Experiment(
			expID INT AUTO_INCREMENT,
            expNum INT NOT NULL,
			caseNum INT NOT NULL,
			PRIMARY KEY(expID)
		)";

		takeQ( $sql );
		echo "table created";
	}

	function insertFirst(){
		$sql = "INSERT INTO Experiment VALUES(0, 0, 0)";
		takeQ( $sql );
    }
    

	function updateExp($expID, $expNum,$caseNum){
		$sql = "UPDATE Experiment SET expNum = '".$expNum."' WHERE expID = ".$expID;
		$sql = "UPDATE Experiment SET caseNum = '".$caseNum."' WHERE expID = ".$expID;
		takeQ( $sql );
	}	
	function showExperimentTable(){
		global $conn;
		$sql = "SELECT * FROM Experiment";
		if ($result = mysqli_query($conn,$sql)){
			echo "<table border='1' cellpadding='7'> <tr nowrap='' bgcolor='#e0e0e0'> 
			<th>expID</th> 
			<th>expNum</th> 
			<th>caseNum</th> 
			</tr>";

			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td nowrap=''>" . $row['expID'] . "</td>";
				echo "<td nowrap='' bgcolor='#f4f0fa'>" . $row['expNum'] . "</td>";
				echo "<td nowrap=''>" . $row['caseNum'] . "</td>";
				echo "</tr>";
			} 
			echo "</table>";
		} 
		else {
			echo "Table show ERROR: " . mysqli_error($conn);
		}
		
	}


	// ================== //
	//	main start here!  //
	// ================== //

	// connect to DB
	$conn = mysqli_connect("localhost","capstonedefault","password1!","capstonedefault");
	if(mysqli_connect_errno()){
		echo 'Connection ERROR' . mysqli_connect_error();
		exit;
	}
	else{
		echo 'DB Connection Success<br/>';
	}

	mysqli_set_charset($conn,"utf8");

    showExperimentTable();
	?>
</body>