<?php
	$filename = $_REQUEST['filename'];

	$con=mysqli_connect("localhost","root","TEst!234","sqldb") or die("접속실패");

	$fileDir = "/upload";	

	$fullPath = $fileDir."/".$filename;

	header("Content-Type: application/octet-stream");

	header("Content-Disposition: attachment; filename=".iconv('utf-8','euc-kr',$filename));

	header("Content-Transfer-Encoding: binary");

	$fh = fopen($fullPath, "r");

	fpassthru($fh);

	

?>
