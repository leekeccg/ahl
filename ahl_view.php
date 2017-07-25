<?php require_once('Connections/conn.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE ahl SET lot=%s, house_design=%s, `land size`=%s, package_price=%s, type=%s, bedroom=%s, studio=%s, house_size=%s, opal_upgrades=%s, pdf=%s, category=%s, house_area=%s, star=%s WHERE id=%s",
                       GetSQLValueString($_POST['lot'], "text"),
                       GetSQLValueString($_POST['house_design'], "text"),
                       GetSQLValueString($_POST['land_size'], "text"),
                       GetSQLValueString($_POST['package_price'], "text"),
                       GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['bedroom'], "text"),
                       GetSQLValueString($_POST['studio'], "text"),
                       GetSQLValueString($_POST['house_size'], "text"),
                       GetSQLValueString($_POST['opal_upgrades'], "text"),
                       GetSQLValueString($_POST['pdf'], "text"),
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['house_area'], "text"),
                       GetSQLValueString($_POST['star'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM ahl WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 $title="Leeke" ?>
<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $title;?></title>
<!-- InstanceEndEditable -->
<!-- inc_head -->
<?php include("inc/inc_head.php"); ?>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<!-- inc_nav -->
<?php include("inc/inc_nav.php"); ?>
<div class="container"><!-- InstanceBeginEditable name="EditRegion1" -->
  <h1>Off the plan <?php echo $row_Recordset1['bedroom']; ?> Bedroom house in Edmondson Park</h1>
  <div>Walking distance to Edmondson Park station; </div>
  <div><strong>Land Size:</strong> <?php echo $row_Recordset1['land size']; ?> Square Metre</div>
  <div><strong>House Size:</strong> <?php echo $row_Recordset1['house_area']; ?> Square Metre</div>
  <div><strong>Upgrades:</strong></div>
  <div class="" style="white-space:pre-line;"><?php echo $row_Recordset1['opal_upgrades']; ?></div>
  <div><br/><input type="text" value="<?php echo $row_Recordset1['pdf']; ?>" class="form-control"/></div>
  <br/>
 <a class="btn btn-primary" href="index.php" target="">Back</a>
  <table class="table table-bordered table-hover table-striped none">
    <tr valign="baseline">
      <td nowrap align="right">Title:</td>
      <td>Off the plan <?php echo $row_Recordset1['bedroom']; ?> Bedroom house in Edmondson Park</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Lot:</td>
      <td><?php echo $row_Recordset1['lot']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">House_design:</td>
      <td><?php echo $row_Recordset1['house_design']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Land size:</td>
      <td><?php echo $row_Recordset1['land size']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Package_price:</td>
      <td><?php echo $row_Recordset1['package_price']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Type:</td>
      <td><?php echo $row_Recordset1['type']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Bedroom:</td>
      <td><?php echo $row_Recordset1['bedroom']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Studio:</td>
      <td><?php echo $row_Recordset1['studio']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">House_size:</td>
      <td></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Opal_upgrades:</td>
      <td><?php echo $row_Recordset1['opal_upgrades']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Pdf:</td>
      <td><?php echo $row_Recordset1['pdf']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Category:</td>
      <td><?php echo $row_Recordset1['category']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">House_area:</td>
      <td><?php echo $row_Recordset1['house_area']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Star:</td>
      <td><?php echo $row_Recordset1['star']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="更新记录"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <!-- InstanceEndEditable --></div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($Recordset1);
?>
