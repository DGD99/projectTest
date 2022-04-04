<?php
	echo "파일 업로드 테스트";

	$con=mysqli_connect("localhost","root","TEst!234","sqldb") or die("접속실패");

	session_start();

	$username=$_SESSION["username"];

	echo $username;

	if (isset($_FILES)) {
    		$file = $_FILES["file"];
    		$error = $file["error"];
    		$name = $file["name"];
    		$type = $file["type"];
    		$size = $file["size"];
    		$tmp_name = $file["tmp_name"];
   
    		if ( $error > 0 ) {
        	echo "Error: " . $error . "<br>";
    		}
    		else {
        		$temp = explode(".", $name);
        		$extension = end($temp);
       
            		echo "Upload: " . $name . "<br>";
            		echo "Type: " . $type . "<br>";
            		echo "Size: " . (int)($size / 1024 / 1024) . " Mb<br>";
            		echo "Stored in: " . $tmp_name;
            		if (file_exists( "/" . $username . "/upload/" . $name)) {
                		echo $name . " already exists. ";
            		}	
            		else {
                		move_uploaded_file($tmp_name, "/" . $username . "/upload/" . $name);
                		echo "Stored in: " . "/upload/" . $name;
				$sql="INSERT INTO filetbl VALUES(NULL,'".$name."','".$size."')";
		
				$ret = mysqli_query($con,$sql);            
				if($ret) {
                			echo "데이터 입력 완료";
				}
				else {
                			echo "데이터 입력 실패"."<br>";
                			echo "실패원인 : ".mysqli_error($con);
	    			}
	   		}
?>
	<!--
	<script>
		alert('업로드 성공');
                location.href = "page-alexa.php";
	</script>
	--!>
<?php
    	  }
	}
	else {
    		echo "File is not selected";

?>
	<script>
		alet('업로드 실패');
                location.href = "page-alexa.php";
	</script>
<?php
	
	}	
	
	mysqli_close($con);


?>
