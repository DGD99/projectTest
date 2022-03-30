<?php
$con=mysqli_connect("localhost","root","TEst!234","sqldb") or die("접속실패");
        $useremail=$_POST["useremail"];
        $username = $_POST["username"];
        $userpw = $_POST["userpw"];
        $userpw2 = $_POST["userpw2"];

	echo "$useremail , $username, $userpw, $userpw2";

        $sql="INSERT INTO jointest VALUES(NULL,'".$username."','".$useremail."','".$userpw."','".$userpw2."')";

        $ret = mysqli_query($con,$sql);

        echo "<h2> 가입 처리 결과 </h2>";

        if($ret) {
                echo "데이터 입력 완료";
		//echo '<script>alert("Join Complete")</script>'; //회원가입 완료 알림 기능 .. XXXXX
?>
	<script>
        	alert("회원가입이 완료되었습니다");
        	location.href = "auth-sign-in.html";
	</script>
<?php
        }
        else {
                echo "데이터 입력 실패"."<br>";
                echo "실패원인 : ".mysqli_error($con);
?>
	<script>
		alert("회원가입 실패");
		location.href = "auth-sign-up.html";
	</script>
<?php
        }
        mysqli_close($con);

        echo "<br><a href='auth-sign-up.html'>[가입페이지로 이동]</a>";

	//sleep(2);

	//header("Location: auth-sign-in.html");
?>
