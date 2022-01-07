<div style="text-align:center">
<?php

if(isset($_GET['errMsg']) && $_GET['errMsg']==1) { 
    echo "<p>帳號有誤或沒有經過登入程序</p>";
   }else if(isset($_GET['errMsg']) && $_GET['errMsg']==2) { 
    $message = "查無帳號";
    echo "<script type='text/javascript'>alert('$message');</script>";
 
   }else if(isset($_GET['errMsg']) && $_GET['errMsg']==3) { 
    $message = "密碼錯誤";
    echo "<script type='text/javascript'>alert('$message');</script>";
 
   }else{
    }
?>
</div>



<?php
 if(isset($_SESSION['auth']) && $_SESSION['auth']=='ValidUser'){
    // unset($_SESSION['auth']);
    header("Location:index.php?do=index_mgt"); 
    } else{ ;?>



                <div id="login" style="width: 400px;margin:20px  auto; clear:both; ">
                    <form  method="post" action="auth.php" enctype="application/x-www-form-urlencoded">
                    	<fieldset>
                        	<legend> 登入 </legend>
                            <table>
                                <tr>
                                	<td style="width: 45%; background:#eee;  padding: 0 10px;">帳號 </td>
                                    <td><input type="text" name="username" style="width: 150px;" /></td>
                                </tr>
                                <tr>
                                	<td style="width: 45%; background:#eee;  padding: 0 10px;">密碼 </td>
                                    <td><input type="password" name="password" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                    	<span >
                                        	<input type="submit" name="Submit" value="  登入  " /> &nbsp;
                                            <input type="reset" name="reset" value="  清除  " />
                                            <input type="hidden" name="auth" id="hiddenField" value="true" />
                                         </span>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
				</div>








                <?php 
	};?>



