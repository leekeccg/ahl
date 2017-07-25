<?php require_once('Connections/conn.php'); ?>
<?php
mysql_select_db($database_conn, $conn);
$query_rs = "SELECT * FROM ahl where opal_upgrades<>''";
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
$title="Filter" ?>
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
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>id</td>
                <td></td>
                <td>lot</td>
                <td class="none">house_design</td>
                <td>land size</td>
                <td class="none">package_price</td>
                <td class="none">type</td>
                <td>bedroom</td>
                <td class="none">studio</td>
                <td class="none">house_size</td>
                <td>House Area</td>
                <td>opal_upgrades</td>
                <td>GB</td>
                <td>pdf</td>
                <td class="none">category</td>
            </tr>
            <?php do { ?>
            <tr class="<?php echo $row_rs['star'];?>">
                <td>
                    <?php echo $row_rs['id']; ?>
                </td>
                <td>
                    <?php
                      if($row_rs['pdf_name']<>""){
                          echo "<img style='height:40px;' src='img/".substr($row_rs['pdf_name'],0,42).".jpg' />";
                      }
                    ?>
                </td>
                <td>
                    <a href="ahl_edit.php?id=<?php echo $row_rs['id']; ?>">
                        <?php echo $row_rs['lot']; ?>
                    </a>
                    <a href="ahl_view.php?id=<?php echo $row_rs['id']; ?>" target="_blank">View</a>
                </td>
                <td class="none">
                    <?php echo $row_rs['house_design']; ?>
                </td>
                <td>
                    <?php echo $row_rs['land size']; ?>
                </td>
                <td class="none">
                    <?php echo $row_rs['package_price']; ?>
                </td>
                <td class="none">
                    <?php echo $row_rs['type']; ?>
                </td>
                <td>
                    <?php echo $row_rs['bedroom']; ?>
                </td>
                <td class="none">
                    <?php echo $row_rs['studio']; ?>
                </td>
                <td class="none">
                    <?php echo $row_rs['house_size']; ?>
                </td>
                <td>
                    <?php echo $row_rs['house_area']; ?>
                </td>
                <td>
                    <?php if($row_rs['opal_upgrades']<>""){ echo "True";}; ?>
                </td>
                <td>
                    <?php echo $row_rs['gb'];?>
                </td>
                <td>
                    <a href="<?php echo "file://".$row_rs['pdf_name']; ?>" target="_blank">PDF</a>
                </td>

                <td class="none">
                    <?php echo $row_rs['category']; ?>
                </td>
            </tr>
            <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
        </table>
        <!-- InstanceEndEditable -->
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($rs);
?>
