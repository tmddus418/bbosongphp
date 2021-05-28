<?php
$conn = mysqli_connect('localhost', 'root', 'j00502' , 'sy');
$cotton = "SELECT * FROM Fabric Where FabricId =1;";
$sql = "
    INSERT INTO FabricNotice
    (FabricId,Notice)
    VALUES(
        1,
        '{$_POST['Notice']}'
        
    )
";
$result = mysqli_query($conn,$sql);
if($result === false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요 !';
    error_log(mysqli_query($conn));
} else {
    echo '성공했습니다. <br> <a href="cotton.php">돌아가기 </a>' ;
}

?>