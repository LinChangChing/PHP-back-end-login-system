<?php include "./Connections/cnn.php" ;?>
<?php include "./Connections/nav.php" ;?>
    <!-------------左側欄位登入或未登入下列二擇一-------------------->


<?php

   
    if(isset($_SESSION["level"]) && ($_SESSION["level"]==2)){
        include "./Connections/sidebar_m.php"; 
    }   else if(isset($_SESSION["level"]) && ($_SESSION["level"]==1)){
        include "./Connections/sidebar_n.php";
    }   else   {
        include "./Connections/sidebar.php";
    }

?>
                    <!-------------主頁連結登入或未登入-------------------->
<?php
     if(isset($_SESSION["level"])) {
        include "./Connections/log.php";
      } else { 
        include "./Connections/log2.php";  
    }
?>
                    <!-------------主頁連結內容-------------------->

 <?php
if(isset($_SESSION["level"]) && ($_SESSION["level"]==2 || $_SESSION["level"]==1)){
switch (@$_GET['do']) {
    case "login":
        include "login.php";
      break;
    case "po":
        include "publish.php";
        break;
    case "account_mgt":
        include "account_mgt.php";
        break;
    case "account_add":
        include "account_add.php";
        break;
    case "account_edit":
        include "account_edit.php";
        break;
    case "index_mgt":
            include "index_mgt.php";
            break;
    default:
        include "index_mgt.php";}}
    else{
        switch (@$_GET['do']) {
            case "login":
                include "login.php";
              break;
            case "po":
                include "publish.php";
                break;
            case "account_mgt":
                include "account_mgt.php";
                break;
            case "account_add":
                include "account_add.php";
                break;
            case "account_edit":
                include "account_edit.php";
                break;
            default:
                include "publish.php";}

    }



?>


                    <!-------------End of 主頁連結內容-------------------->
            </div><!-- End of id main class=hal -->
        </div><!-- End of id mm -->
<?php include "./Connections/footer.php" ;?>


