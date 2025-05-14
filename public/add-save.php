<?php
require("../include/conn.php");

$vitemname=$_POST['txtstudentnumber'];
$vdescription=$_POST['txtlastname'];
$vcolor=$_POST['txtfirstname'];
$vbrand=$_POST['txtmiddlename'];
$vstatus=$_POST['txtstatus'];

$vindex=0;

$sql = "SELECT * FROM item_description ORDER BY item_index";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vindex=$row['item_index'];			
                
            }
        }
        $vindex=$vindex+1;

$sql="INSERT INTO item_description (name, description, color, brand, image_path, status) VALUES ('$vitemname', '$vdescription', '$vcolor', '$vbrand', '$vimage_path', '$vstatus')";
if ($conn->query($sql) === TRUE) 
{
} 
else 
{            
} 

?>
<script>
    alert("Item Saved.");								
</script>
<meta  http-equiv="refresh" content=".000001;url=item-main.php" />