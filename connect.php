<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/all.css" />
	<title></title>
</head>
<body><h2>
<div class="wrap">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

if(isset($_POST["id"]) && isset($_POST["pw"]))
{
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
	require("connection.php");
	$id = $_POST['id'];
	$pw = $_POST['pw'];

//搜尋資料庫資料
	$sql = "SELECT * FROM student where stu_id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
		echo "<center>";
		$name = $row[1]; 
	if($id != null && $pw != null && $row[0] == $id && $row[2] == $pw)
	{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['stu_id'] = $id;
        $_SESSION['stu_name'] = $name;

        echo 'Login Success';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=announce.php>';
	}
	else
	{
        echo 'Login Failing';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=enter.php>';
	}
	echo "</center>";
}
else
{
	echo "請先註冊會員";
}
	?>
</div>

</h2>
</body>
</html>
