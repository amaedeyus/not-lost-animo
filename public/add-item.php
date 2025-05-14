<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
require("../include/conn.php");

$vitemname="";
$vdescription="";
$vcolor="";
$vbrand="";
$vstatus="";

?>
    <form action="add-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
        <table border="1">    
            <tr>
                <td colspan="2" align=center>
                    <b>Insert Student</b>
                </td>
            </tr>
            <tr>
                <td>
                <label >Enter Item:</label>
                </td>
                <td>
                <input type="text" name="txtstudentnumber" id="txtstudentnumber" value="<?php echo $vitemname; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Description:</label>
                </td>
                <td>
                <input type="text" name="txtlastname" id="txtlastname" value="<?php echo $vdescription; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Color:</label>
                </td>
                <td>
                <input type="text" name="txtfirstname" id="txtfirstname" value="<?php echo $vcolor; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Brand:</label>
                </td>
                <td>
                <input type="text" name="txtmiddlename" id="txtmiddlename" value="<?php echo $vbrand; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Status:</label>
                </td>
                <td>
                <select name="txtstatus" id="program">
                    <option value="Lost">Lost</option>
                    <option value="Found">Found</option>
                </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" align=center>
                <input type="submit" value="Save Record" />
                <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='item-main.php'">Back</button>
                </td>
            </tr>
            
        </table>
    </form>
        
</body>
</html>