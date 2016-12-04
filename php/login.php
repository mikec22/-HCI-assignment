<?
session_start();
extract($_POST);
if ($studID == '150212355' && $pwd == 12345678 ) {
	$_SESSION['userName'] = 'Chan Tat Man';
	header("location:../index.html");
} else {
	$msg = "Invalid Student ID or Password. Please try again!";
	header("location:../login.html?msg=" .($msg));
}
?>