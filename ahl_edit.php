<?php
require_once('Connections/conn.php');
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
    $updateSQL = sprintf("UPDATE ahl SET lot=%s, house_design=%s, `land size`=%s, package_price=%s, type=%s, bedroom=%s, gb=%s, studio=%s, house_size=%s, opal_upgrades=%s, pdf_url=%s, pdf_name=%s, category=%s, house_area=%s, star=%s WHERE id=%s",
                       GetSQLValueString($_POST['lot'], "text"),
                       GetSQLValueString($_POST['house_design'], "text"),
                       GetSQLValueString($_POST['land_size'], "text"),
                       GetSQLValueString($_POST['package_price'], "text"),
                       GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['bedroom'], "text"),
                       GetSQLValueString($_POST['gb'], "text"),
                       GetSQLValueString($_POST['studio'], "text"),
                       GetSQLValueString($_POST['house_size'], "text"),
                       GetSQLValueString(preg_replace('/\n+/', "\n", trim($_POST['opal_upgrades'])),"text"),
                       GetSQLValueString($_POST['pdf_url'], "text"),
                       GetSQLValueString($_POST['pdf_name'], "text"),
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['house_area'], "text"),
                       GetSQLValueString($_POST['star'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

    //$updateGoTo = "index.php";
    //if (isset($_SERVER['QUERY_STRING'])) {
    //    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    //    $updateGoTo .= $_SERVER['QUERY_STRING'];
    //}
    //header(sprintf("Location: %s", $updateGoTo));
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
$title=$row_Recordset1['lot'] ?>
<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>
        <?php echo $title;?>
    </title>
    <!-- InstanceEndEditable -->
    <!-- inc_head -->
    <?php include("inc/inc_head.php"); ?>
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head>
<body>
    <!-- inc_nav -->
    <?php include("inc/inc_nav.php"); ?>
    <div class="container">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <h1>
            <?php echo $title;?>
        </h1>
        <?php
        if($row_Recordset1['pdf_name']<>""){
            echo "<div class='text_c'><img style='width:70%;' src='img/".substr($row_Recordset1['pdf_name'],0,42).".jpg' /></div>";
        }
        ?>
        </br>
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <table class="table table-bordered table-hover table-striped">
                <tr valign="baseline" class="none">
                    <td nowrap align="right">Id:</td>
                    <td>
                        <?php echo $row_Recordset1['id']; ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Lot:</td>
                    <td>
                        <input type="text" class="form-control" name="lot" value="<?php echo htmlentities($row_Recordset1['lot'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">House_design:</td>
                    <td>
                        <input type="text" class="form-control" name="house_design" value="<?php echo htmlentities($row_Recordset1['house_design'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="baseline" class="">
                    
                    <td nowrap align="right">Land size:</td>
                    <td>
                        <input type="text" class="form-control" name="land_size" value="<?php echo htmlentities($row_Recordset1['land size'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td nowrap align="right">House_area:</td>
                    <td>
                        <input type="text" class="form-control" name="house_area" value="<?php echo htmlentities($row_Recordset1['house_area'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">Package_price:</td>
                    <td>
                        <input type="text" class="form-control" name="package_price" value="<?php echo htmlentities($row_Recordset1['package_price'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">Type:</td>
                    <td>
                        <input type="text" class="form-control" name="type" value="<?php echo htmlentities($row_Recordset1['type'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">Star:</td>
                    <td>
                        <input type="text" class="form-control" name="star" value="<?php echo htmlentities($row_Recordset1['star'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Bedroom:</td>
                    <td>
                        <input type="text" class="form-control" name="bedroom" value="<?php echo htmlentities($row_Recordset1['bedroom'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td nowrap align="right">Granny Flat Bedroom:</td>
                    <td>
                        <input type="text" class="form-control" name="gb" value="<?php echo $row_Recordset1['gb']; ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">Studio:</td>
                    <td>
                        <input type="text" class="form-control" name="studio" value="<?php echo htmlentities($row_Recordset1['studio'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">House_size:</td>
                    <td>
                        <input type="text" class="form-control" name="house_size" value="<?php echo htmlentities($row_Recordset1['house_size'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr valign="baseline">
                    <td nowrap align="right">PDF Name:</td>
                    <td colspan="3">
                        <input type="text" class="form-control" name="pdf_name" value="<?php echo htmlentities($row_Recordset1['pdf_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">
                        <a target="_blank" href="file://<?php echo $row_Recordset1['pdf_url']; ?>">PDF URL:</a>
                    </td>
                    <td colspan="3">
                        <input type="text" class="form-control" name="pdf_url" value="<?php echo htmlentities($row_Recordset1['pdf_url'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">Category:</td>
                    <td colspan="3">
                        <input type="text" class="form-control" name="category" value="<?php echo htmlentities($row_Recordset1['category'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>


                <tr valign="baseline">
                    <td nowrap align="right">Opal_upgrades:</td>
                    <td colspan="3">
                        <textarea name="opal_upgrades" class="form-control" rows="8">
                            <?php echo htmlentities($row_Recordset1['opal_upgrades'], ENT_COMPAT, 'utf-8'); ?>
                        </textarea>
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td colspan="3">
                        <input type="submit" class="btn btn-primary" value="更新记录" />
                        <a class="btn btn-primary" href="index.php" target="">Back</a>
                    </td>
                    
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1" />
            <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
        </form>
        <p>&nbsp;</p>
        <!-- InstanceEndEditable -->
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($Recordset1);
?>
