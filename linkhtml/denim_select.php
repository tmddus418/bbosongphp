<?php
$conn = mysqli_connect('localhost', 'root', 'j00502' , 'sy');

$sql = "SELECT * FROM Wash order by WashId asc";
$sql2 = "SELECT FabricId,Fabric.CleanserId,CleanserInfo,Fabric.WashId,WashWay,WashNotice,FabricName,FabricInfo FROM Fabric LEFT JOIN Cleanser ON Fabric.CleanserId = Cleanser.CleanserId LEFT JOIN Wash ON Fabric.WashId = Wash.WashId WHERE FabricId = 1;";

$result = mysqli_query($conn,$sql);
$result2 = mysqli_query($conn,$sql2);

// while($row = mysqli_fetch_array($result)) {
// echo '<h2>'.$row['WashNotice'].'</h2>';
// echo $row['WashWay'];
// }


while($row2 = mysqli_fetch_array($result2)) {
    echo '<h1>'.$row2['FabricName'].'</h1>';
    echo '<p>'.$row2['FabricId'].'</p>'; 
    echo '<p>'.$row2['CleanserId'].'</p>';
    echo $row2['WashId'];
    echo '<p>'.$row2['FabricInfo'].'</p>';
    echo '<p>'.$row2['CleanserInfo'].'</p>';
    echo '<p>'.$row2['WashWay'].'</p>';
    echo '<p>'.$row2['WashNotice'].'</p>';
    }

?>

</br>