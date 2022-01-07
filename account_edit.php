<?php 

if($_SESSION['level']!=='2'){
    header("Location:index.php");
}
?>

<?php   $username_post = isset($_POST['username_post']) ? $_POST['username_post'] : "";?>

<?php
header("Content-Type: text/html; charset=utf-8");
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (isset($_POST["action"]) && ($_POST["action"]=="update")){
    if($_POST["password"]==$_POST["re-password"]){
  $sql_query = "UPDATE account SET 
  username='".$_POST["username"]."',
  password='".md5($_POST["password"])."',
  level='".$_POST["level"]."' 
  where a_id=".$_POST["a_id"];
 mysqli_query($connection, $sql_query); 
 header("Location:index.php?do=account_mgt");
}else {
echo "<script type='text/javascript'>alert('應輸入兩個完整的密碼');</script>";
}}
$sql_db = "SELECT * FROM account WHERE a_id=".$_POST['a_id'];
$result = mysqli_query($connection, $sql_db);
$row_result = mysqli_fetch_assoc($result);






?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/js.js"></script>
</head>

<body>
	<div id="login" style="width: 80%;margin:20px  auto; border: 1px #eee solidl">
          <fieldset>  
              <legend>編輯帳號</legend>
          <!--編輯帳號-->    
              <form id="register" name="register" method="post" action="" enctype="application/x-www-form-urlencoded">
              <table style="margin: 30px auto; width: 80%;">
                  <tr>
                      <td colspan="2" s><h1>編輯帳號</h1></td>								
                   </tr> 
                   <tr>
                      <td style="width: 50%; background:#eee;  padding: 0 10px;">Step1:登入帳號 </td>
                      <td><input type="text" name="username" id="username" style="width: 200px" value="<?php echo $row_result["username"];?>">
                    </td>
                  </tr>
                  <tr>
                      <td style="width: 50%; background:#eee;  padding: 0 10px;">Step2:登入密碼 </td>
                      <td><input type="password" name="password" id="password" style="width: 200px;" /></td>
                  </tr>
                   <tr>
                      <td style="width: 50%; background:#eee;  padding: 0 10px;">Step3:再次確認密碼 </td>
                      <td><input type="password" name="re-password" id="re-password" style="width: 200px;" /></td>
                  </tr>
                  <tr>
                      <td style="width: 50%; background:#eee;  padding: 0 10px;">Step4:權限等級 </td>
                      <td>
                      	<select name='level'>
                      		<option value='0'>一般使用者</option>
                      		<option value='1'>限制管理員</option>
                      		<option value='2'>全域管理員</option>
                      	</select>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2" style="text-align: center;">   
                      <input name="a_id" type="hidden" value="<?php echo $row_result["a_id"];?>">
                      <input name="action" type="hidden" value="update">
            <?php
          echo "<input type=\"submit\" value=\"  更新  \" onclick=\"location.href='?do=account_mgt'\">"        
            ;?>
          
          
                     </td>
                  </tr>
              </table> 
             </form>
          </fieldset>
  </div>
   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="application/javascript">
 $(document).ready(function() {
 	$('#username').on('blur', function(e){
 		if($('#username').val() == ''){
			window.alert('需輸入使用者名稱');
			return false;
			}
    	})
	$('#re-password').on('blur', function(e){
		if($('#password').val() != $('#re-password').val()){
			window.alert('兩次輸入的密碼不符合');
			return false;
		}
		}); // End of submit
	});//End of ready
  </script>
</body>
</html>