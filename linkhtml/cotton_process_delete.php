<?php
$conn = mysqli_connect('localhost', 'root', 'j00502' , 'sy');
settype($_POST['id'],'integer');
$filltered = array (
    'NoticeId'=> mysqli_real_escape_string($conn,$_POST['id']),
    
);
$cotton = "SELECT * FROM Fabric Where FabricId =1;";
$sql = "
    DELETE 
    FROM FabricNotice
    WHERE
        NoticeId =  '{$filltered['NoticeId']}'
    
";
$result = mysqli_query($conn,$sql);
if($result === false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요 !';
    error_log(mysqli_query($conn));
} else {
    echo '삭제했습니다. <br> <a href="cotton.php">돌아가기 </a>' ;
}

?>