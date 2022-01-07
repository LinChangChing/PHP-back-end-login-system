<?php include "./Connections/cnn.php" ;?>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
//$_SESSION['auth']='false'; //直接進入

$username=$_POST["username"];
$password=$_POST["password"];




if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $all_id ="SELECT username FROM account";
    $result_id = mysqli_query($connection,$all_id);
    foreach ($result_id as $row) {                  //使用foreach，把要的資訊給印出來
      if(row['username']!=$username) {header("Location:index.php?do=login&errMsg=2");}
         
    }
    // $sql = "SELECT * FROM account WHERE username ='kairi'";
    $sql = "SELECT * FROM account WHERE username ='".$username."'";
    $result=mysqli_query($connection,$sql);
    $check=mysqli_fetch_assoc($result);
       
    
    if(mysqli_num_rows($result)==1 && md5($password)==$check['password']){
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $check["a_id"];
        $_SESSION["username"] = $check["username"];
        $_SESSION["level"] = $check["level"];
        $_SESSION['auth']='ValidUser';
        header("Location:index.php");
    }else if(mysqli_num_rows($result)==1 && md5($password)!==$check['password'])
    {header("Location:index.php?do=login&errMsg=3");}




}
    else{
        header("Location:index.php?do=login&errMsg=1");
    }







?>
