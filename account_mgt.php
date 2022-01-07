<?php 

if($_SESSION['level']!=='2'){
    header("Location:index.php");
}
?>



<?php 
	header("Content-Type: text/html; charset=utf-8");
  $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $pageRow_records = 2;  //預設每筆頁數
  $num_pages = 1; //預設頁數
  if(isset($_GET['page'])){    //有翻頁就把頁數更新
    $num_pages = $_GET['page'];
  }
  $startRow_records = ($num_pages - 1 ) * $pageRow_records; //這頁的首筆
  $sql_query = "SELECT * FROM account";  //顯示筆數
  $sql_query_limit = $sql_query." LIMIT ".$startRow_records.", ".$pageRow_records;
  $result = mysqli_query($connection, $sql_query_limit);
  $all_result = mysqli_query($connection, $sql_query); 
  $total_records = mysqli_num_rows($all_result);
  $total_pages = ceil($total_records/$pageRow_records);
?>

<?php
if(isset($_POST["a_id"])){
  $sql_query = "DELETE FROM account WHERE a_id='".$_POST["a_id"]."'";
  mysqli_query($connection, $sql_query);
  header("Location:index.php?do=account_mgt");
}
?>




<!--*******帳號管理畫面****** -->
 <div id="login" style="width: 80%;margin:20px  auto; border: 1px #eee solidl">
          <fieldset>  
              <legend>帳號管理</legend>
              <a href='?do=account_add'><input type='button' value='新增帳號' /></a>   
              <!--更新及刪除帳號-->                	
              <form id="account" name="account" method="post"  action="?do=account_edit" enctype="application/x-www-form-urlencoded">
              <table style="margin: 30px auto; width: 80%; text-align:center ">
                   <tr>
                      <th style="width: 40%; background:#eee;  padding: 0 10px;">帳號</th>
                      <th style="width: 30%; background:#eee;  padding: 0 10px;">身份權限</th>
                      <th style="width: 30%; background:#eee;  padding: 0 10px;">動作</th>
                  </tr>
                  
                      <?php 
                $query_mgt ="select * from account";
                $select_query_mgt = mysqli_query($connection,$query_mgt);
                while($row_mgt = mysqli_fetch_assoc($result)){
                   switch ($row_mgt['level']) {
                    case 0: $level_name="一般使用者";
                      break;
                    case 1: $level_name="限制管理員";
                      break;
                    case 2: $level_name="全域管理員";
                      break;}
  
                  echo "<tr>";
                  echo "<td style=\"width: 40%;  padding: 0 10px;\">".$row_mgt['username']."</td>";
                  echo "<td style=\"width: 30%;  padding: 0 10px;\">".$level_name."</td>";
                  echo "<td style=\"width: 30%;  padding: 0 10px;\">".
"<form style=\"display: inline\" method=\"post\"  action=\"?do=account_edit\">".
"<input type=\"hidden\" name=\"a_id\" value=\"".$row_mgt['a_id']."\"\>".
"<input type=\"submit\" value=\"更新\" onclick=\"location.href='?do=account_edit'\"> ".
"</form>".
"<form style=\"display: inline\" method=\"post\"  action=\"\">".
"<input style=\"display: inline\" type=\"submit\" value=\"刪除\" onclick=\"javascript:return del()\">".
"<input type=\"hidden\" name=\"a_id\" value=\"".$row_mgt['a_id']."\"\>".
"</form></td>";
                  echo "</tr>";  
                           }





                 ?>
                   <tr >
                      <td colspan="3" style="background: #FFF;">
                        </td>
                   </tr>
              </table> 
<table border="0" align="center">
  <tr>
    <?php if ($num_pages > 1) { //若不是第一頁則顯示 ?>
      
      <td><a href="index.php?do=account_mgt&page=<?php echo $num_pages-1;?>"><</a></td>
      <?php } ?>
      <?php if ($num_pages < $total_pages) {//若不是最後一頁則顯示} ?>
      <td>
     <?php
      for($i=1;$i<=$total_pages;$i++){
          if($i==$num_pages){
              echo "  <span style=\"font-size:25px\">".$i."  </span>";
          } else {
                echo "<a  href=\"index.php?do=account_mgt&page=$i\">$i</a>";
          }
      }
      ?>
    </td>
      <td><a href="index.php?do=account_mgt&page=<?php echo $num_pages+1;?>">></a></td>
      <!--  -->
      <?php } ?>
  </tr>
</table>

             </form>
          </fieldset>
  </div>   


  
<!--*******帳號管理畫面結束****** --
?>