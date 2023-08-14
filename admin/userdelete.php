<?php
include("config.php");
$uid = $_GET['id'];

// view code//
$sql = "SELECT * FROM user where uid='$uid'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
	{
	  $img=$row["uimage"];
	}
@unlink('user/'.$img);

//end view code
$msg="";
$sql = "DELETE FROM user WHERE uid = {$uid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>utilisateur a supprimé</p>";
	header("Location:userlist.php?msg=$msg");
}
else
{
	$msg="<p class='alert alert-warning'>Utilisateur non supprimé</p>";
		header("Location:userlist.php?msg=$msg");
}

mysqli_close($con);
?>
