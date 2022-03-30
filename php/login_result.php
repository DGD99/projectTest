<?php
$con=mysqli_connect("localhost","root","TEst!234","sqldb") or die("접속실패");
        $useremail=$_POST["useremail"];
        $userpw = $_POST["userpw"];

        //echo "$useremail ,  $userpw";

        $sql="SELECT useremail, userpw FROM jointest WHERE useremail='{$useremail}'"; 

        $ret = mysqli_query($con,$sql);

	$row = mysqli_fetch_array($ret);

	//echo $row['useremail'];
	//echo $row['userpw'];
	
	/*	
	foreach($row as $key => $r){
		echo "{$key} : {$r} <br>";
	}
	*/

        echo "<h2> 로그인 처리 결과 </h2>";

        

	if($row['userpw'] === $userpw ) {
                echo "로그인  완료";
?>
	<script>
                location.href = "page-alexa.html";
	</script>
<?php
        }
        else {
                echo "로그인  실패"."<br>";
?>
	<script>
		alert("로그인 실패");
                location.href = "auth-sign-in.html";
        </script>
<?php
        }
	
        mysqli_close($con);

	
        echo "<br><a href='auth-sign-in.html'>[로그인페이지로 이동]</a>";

?>

