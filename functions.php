
	<?php
	//<!-- 사이트 전역에서 사용되는 함수들 모음 -->

	// 서버에 연결
	function connectServer(){
		$conn = mysqli_connect("localhost","capstonedefault","password1!","capstonedefault");
		if(mysqli_connect_errno()){
			echo "<script>alert('";
			echo 'Connection ERROR' . mysqli_connect_error();
			echo "')</script>";
			exit;
		}
		else{
			mysqli_set_charset($conn,"utf8");
		}
		return $conn;
	}

	// experiment ID를 입력해 정보를 가져 오는 함수
	function getExpData(){
		$conn = connectServer();
		$sql = "SELECT * FROM Experiment WHERE expID = 1";
		$data = array();
		if($result = mysqli_query($conn,$sql)){
			$row = mysqli_fetch_array($result);
			$data = array($row['expNum'],$row['caseNum']);
			mysqli_close($conn);
		}
		else{
			echo "<script>alert('";
			echo 'ERROR: ' . mysqli_error($conn);
			echo "')</script>";
			exit;
		}
		return $data;
	}

	// update Experiment Data
	function updateExp($expNum,$caseNum){
		$conn = connectServer();
		$sql = "UPDATE Experiment SET caseNum = '".$caseNum."' WHERE expID = 1";
		takeQ( $conn, $sql );
		$sql = "UPDATE Experiment SET expNum = '".$expNum."' WHERE expID = 1";
		takeQ( $conn, $sql );
	}	

	// 쿼리문 던지기
	function takeQ( $conn, $sql ){
		if (mysqli_query($conn,$sql)){
			echo "success";
		}
		else{
			echo "fail";
		}
	}
	
?>