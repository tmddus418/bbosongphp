<?php
$conn = mysqli_connect('localhost', 'root', 'j00502' , 'sy');
$joinfabric = "SELECT FabricId,Fabric.CleanserId,CleanserInfo,Fabric.WashId,WashWay,FabricName,FabricInfo FROM Fabric LEFT JOIN Cleanser ON Fabric.CleanserId = Cleanser.CleanserId LEFT JOIN Wash ON Fabric.WashId = Wash.WashId WHERE FabricId = 5;";
$notice_danim = "SELECT * FROM FabricNotice Where FabricId =5;";
$danim = "SELECT * FROM Fabric Where FabricId =5;";

$joinfabric_result = mysqli_query($conn,$joinfabric);
$notice_danim_result = mysqli_query($conn,$notice_danim);
$danim_result = mysqli_query($conn,$danim);
$joinfabricInfo_result = mysqli_query($conn,$joinfabric);
$cleanserInfo_result = mysqli_query($conn,$joinfabric);

$Fabricname = '';
while($row = mysqli_fetch_array($danim_result)) {
    $Fabricname = $Fabricname."{$row['FabricName']}";
}

$WashWay = '';
while($row = mysqli_fetch_array($joinfabric_result)) {
    $WashWay = $WashWay."{$row['WashWay']}";
}

$noticelist = '';
while($row = mysqli_fetch_array($notice_danim_result)) {
    $noticelist = $noticelist."<li><a 
    href=\"denim.php?id={$row['NoticeId']}\">{$row['Notice']}</a></li>";
}

$FabricInfo = '';
while($row = mysqli_fetch_array($joinfabricInfo_result)) {
    $FabricInfo = $FabricInfo."{$row['FabricInfo']}";
}

$CleanserInfo = '';
while($row = mysqli_fetch_array($cleanserInfo_result)) {
    $CleanserInfo = $CleanserInfo."{$row['CleanserInfo']}";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Denim </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Web UI Testing">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <!-- HW UI CSS 파일-->
        <link rel="stylesheet" href="HW.css">
        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
    <div class="container">
            <!-- 소재명-->
            <div class="fabric">
                <article id="fabricQuery">
                    <h4><b><?=$Fabricname?></b></h4>
                </article>
            </div>
            <!-- 소재정보-->
            <div class="fabricInfo">
                <article id="fabricInfoQuery">
                    <h4><b>소재정보</b></h4>
                    <?=$FabricInfo?>
                </article>
            </div>
            <!--세탁 유의사항-->
            <div class="washInst">
                <article id="washInstQuery">
                    <h4><b>세탁 유의사항</b></h4>
                    <ol>
                         <?=$noticelist?> 
                    </ol>
                </article>
                <?=$update?>
            </div>
            <!--나만의 팁 추가하기-->
            <div class="tips">
                <h4><b>나만의 팁 추가하기</b></h4>
                    <div class="textBox">
                        <p><form action="denim_process_create.php" method = "post" class="submit"></p>
                        <p><textarea name="Notice" placeholder = "나만의 꿀팁을 적어주세요 !"></textarea></p>
                        <p><input type = "submit"></p>
                </form>   
            </div>           
            </div>
            <!--세탁방법-->
            <div class="washMeth">
                <h4><b>세탁방법</b></h4>
                <article id="washMethQuery">
                     <?=$WashWay?> 
                </article>
            </div>
            <!--세탁 정보-->
            <div class="detInfo">
                <h4><b>세탁정보</b></h4>
                <article id="detInfoQuery">
                <?=$CleanserInfo?>
            </article>
            </div>
        </div>
        <footer style="background-color:white;">
            <div class="container-fluid">
                <div class="col-md-12">
                    <p style="color:black; background-color:white; font-size: 15px;padding-bottom: 20px;">Copyright &copy; 2021 | GNU CS BBOSONG </p>
                </div>
            </div>
        </footer>
    </body>
</html>