<?php
include("config.php");
$pid = $_GET['id'];
$sql = "DELETE FROM property WHERE pid = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Propriété supprimée</p>";
	header("Location:propertyview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Propriété non supprimée</p>";
	header("Location:propertyview.php?msg=$msg");
}
mysqli_close($con);
?>