<?php require_once('Connections/webalbumSQL.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['passwd'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_webalbumSQL, $webalbumSQL);
  
  $LoginRS__query=sprintf("SELECT username, passwd FROM `admin` WHERE username=%s AND passwd=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $webalbumSQL) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路相簿</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#cccccc">
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td height="124" valign="top" background="images/album_r1_c1.jpg"><div class="titleDiv"> [生活、旅行的記錄]<br />
   </div>
    <div class="menulink"><a href="index.php">[相簿首頁]</a> <a href="login.php">[相簿管理]</a></div></td>
  </tr>
  <tr>
    <td background="images/album_r2_c1.jpg"><div id="mainRegion">
      <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
        <tr>
          <td><div class="subjectDiv"> 網路相簿管理登入 </div>             
            <div class="albumdesc">
              <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
                <table border="0" align="center" cellpadding="4" cellspacing="0">
                  <tr>
                    <td><p>管理者帳號</p></td>
                    <td><p>
                      <input type="text" name="username" id="username" />
                      </p></td>
                    </tr>
                  <tr>
                    <td><p>管理者密碼</p></td>
                    <td><p>
                      <input type="password" name="passwd" id="passwd" />
                      </p></td>
                    </tr>
                  <tr>
                    <td colspan="2" align="center"><p>
                      <input type="submit" name="button" id="button" value="登入管理" />
                      <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();" />
                      </p></td>
                    </tr>
                  </table>
                </form>
              </div>
            </td>
          </tr>
        </table>
    </div></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark">&nbsp;</td>
  </tr>
  <tr>
    <td><img name="album_r4_c1" src="images/album_r4_c1.jpg" width="778" height="24" border="0" id="album_r4_c1" alt="" /></td>
  </tr>
</table>
</body>
</html>
