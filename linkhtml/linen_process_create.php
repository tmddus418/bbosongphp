<?php
$conn = mysqli_connect('localhost', 'root', 'j00502' , 'sy');
$filltered = array (
    'Notice' => mysqli_real_escape_string($conn,$_POST['Notice'])
);
$linen = "SELECT * FROM Fabric Where FabricId =3;";
$sql = "
    INSERT INTO FabricNotice
    (FabricId,Notice)
    VALUES(
        3,
        '{$filltered['Notice']}'
        
    )
";
$result = mysqli_query($conn,$sql);
if($result === false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요 !';
    error_log(mysqli_query($conn));
} else {
    echo '성공했습니다. <br> <a href="linen.php">돌아가기 </a>' ;
}

?>