<?php
session_start();
require_once "pdo.php";
if(isset($_POST['user'])&&isset($_POST['pass'])){
$sql="SELECT * from USERS where name=:n AND password=:p";
$stmt=$pdo->prepare($sql);
$stmt->execute(array(':n'=>$_POST['user'],
                    ':p'=>$_POST['pass']
));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($row==false)
$_SESSION['msg']='Incorrect details';
else{
  $_SESSION['mess']='Successfully logged in';
  $_SESSION['user']=$_POST['user'];
  $_SESSION['Time1']=date("h:i:sa");
  header("Location:welcome.php");
}

}

?>

<html>
<title>Sahil's Login Page</title>
<body>
  <h1 style="font-size:30px;">Enter your details</h1>
  <?php
  if(isset($_SESSION["msg"])){
    echo '<p style="color: red;">'.$_SESSION["msg"].'</p>';
    unset($_SESSION["msg"]);
  }
  ?>
  <form method="post">
    <p><label for="nam">Username</label>
      <input type="text" name="user" id="nam"></p>
      <p><label for="p">Password</label>
        <input type="password" name="pass" id="p"></p>
        <input type="submit">
      </form>
    </body>
  </html>
