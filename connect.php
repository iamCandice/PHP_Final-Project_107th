<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/all.css" />
	<title></title>
</head>
<body>
<div class="wrap">
<?php

if(isset($_POST["id"]) && isset($_POST["pw"]))
{
//�s����Ʈw
//�u�n�������W���Ψ�s��MySQL�N�ninclude��
	require("connection.php");
	$id = $_POST['id'];
	$pw = $_POST['pw'];

//�j�M��Ʈw���
	$sql = "SELECT * FROM student where stu_id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
//�P�_�b���P�K�X�O�_���ť�
//�H��MySQL��Ʈw�̬O�_���o�ӷ|��
		echo "<center>";
		$name = $row[1]; 
	if($id != null && $pw != null && $row[0] == $id && $row[2] == $pw)
	{
        //�N�b���g�Jsession�A��K���ҨϥΪ̨���
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
	echo "�Х����U�|��";
}
	?>
</div>
</body>
</html>