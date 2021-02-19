<?php
session_start();
require_once "pdo.php";
if(isset($_POST['user'])&&isset($_POST['pass'])&&isset($_POST['rel'])){
if($_POST['rel']=="1")
$_POST['rel']="School";
else
$_POST['rel']="College";
$sql="INSERT INTO USERS (name,password) VALUES(:name,:p)";
$stmt=$pdo->prepare($sql);
$stmt->execute(array(':name'=>$_POST['user'],
                    ':p'=>$_POST['pass']
));
$_SESSION['msg']="You are in!..Now Please Log in";
header("Location:index.php");
}

?>

<html>
<title>Sahil's Login Page</title>
<body>
  <h1 style="font-size:30px;">Fill up the details</h1>
  <?php
  if(isset($_SESSION["mess"])){
    echo '<p style="color: red;">'.$_SESSION["mess"].'</p>';
    unset($_SESSION["mess"]);
  }
  ?>
  <form method="post">
    <p><label for="nam">Full Name</label>
      <input type="text" name="user" id="nam"></p>
      <p><label for="na">School mate or college?</label>
        <select name="rel" id="na">
          <option value="0">__Please select__</option>
          <option value="1">School</option>
          <option value="2">College</option>
        </select></p>
      <p><label for="p">Create Password</label>
        <input type="password" name="pass" id="p"></p>
        <input type="submit">
      </form>
    </body>
