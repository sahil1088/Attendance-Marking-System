<?php
session_start();
if(!isset($_SESSION['user']))
die("Please Login First");
echo '<h1 style="font-size:30px;">Welcome '.$_SESSION['user'].'</pre>';
if(isset($_POST['logout']))
header("Location:logout.php");
?>
<html>
<title>Welcome</title>
<body>
<?php
if(isset($_SESSION['mess'])){
	echo '<pre>'. $_SESSION['mess'] .'</pre>';
	unset($_SESSION['mess']);
}
?>
<form method="post">
  <p><input type="submit" value="Logout" name="logout">
  </p>
</form>
</body>
</html>
