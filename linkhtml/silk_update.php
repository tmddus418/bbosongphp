<?php
$conn = mysqli_connect('localhost', 'root', 'j00502' , 'sy');
$joinfabric = "SELECT FabricId,Fabric.CleanserId,CleanserInfo,Fabric.WashId,WashWay,FabricName,FabricInfo FROM Fabric LEFT JOIN Cleanser ON Fabric.CleanserId = Cleanser.CleanserId LEFT JOIN Wash ON Fabric.WashId = Wash.WashId WHERE FabricId = 6;";
$notice_silk = "SELECT * FROM FabricNotice Where FabricId =6;";
$silk = "SELECT * FROM Fabric Where FabricId =6;";

$joinfabric_result = mysqli_query($conn,$joinfabric);
$notice_silk_result = mysqli_query($conn,$notice_silk);
$silk_result = mysqli_query($conn,$silk);
$joinfabricInfo_result = mysqli_query($conn,$joinfabric);
$cleanserInfo_result = mysqli_query($conn,$joinfabric);

$Fabricname = '';
while($row = mysqli_fetch_array($silk_result)) {
    $Fabricname = $Fabricname."{$row['FabricName']}";
}

$WashWay = '';
while($row = mysqli_fetch_array($joinfabric_result)) {
    $WashWay = $WashWay."{$row['WashWay']}";
}

$noticelist = '';
while($row = mysqli_fetch_array($notice_silk_result)) {
    $noticelist = $noticelist."<li><a 
    href=\"silk.php?id={$row['NoticeId']}\">{$row['Notice']}</a></li>";
}

$FabricInfo = '';
while($row = mysqli_fetch_array($joinfabricInfo_result)) {
    $FabricInfo = $FabricInfo."{$row['FabricInfo']}";
}

$CleanserInfo = '';
while($row = mysqli_fetch_array($cleanserInfo_result)) {
    $CleanserInfo = $CleanserInfo."{$row['CleanserInfo']}";
}
$update = '';
if(isset($_GET['id'])) {
    $filter= mysqli_real_escape_string($conn,$_GET['id']);
    $sql = "SELECT * FROM FabricNotice Where NoticeId={$filter}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $article['Notice'] = htmlspecialchars($row['Notice']);

    $update= '<a href="silk_update.php?id='.$_GET['id'].'"> update</a>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Silk </title>
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
        <!-- HW UI CSS ??????-->
        <link rel="stylesheet" href="HW.css">
        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <div class="container">
            <!-- ?????????-->
            <div class="fabric">
                <div class="fabricQuery">
                    <p class="h1_text"><b><?=$Fabricname?></b> Silk</p>
                </div>
            </div>
            <div class="atag">
                    <a class="home" href = "http://127.0.0.1:8080/"> HOME</a>
            </div>
            <!-- ????????????-->
            <div class="fabricInfo">
                <article id="fabricInfoQuery">
                    <h2><b>????????????</b></h2>
                </article>
                <div class="infotext">
                        <?=$FabricInfo?>
                </div>
            </div>
            <!--?????? ????????????-->
            <div class="washInst">
                <article class="washInstQuery">
                    <h2><b>?????? ????????????</b></h2>
                    <ol class = "list">
                         <?=$noticelist?> 
                    </ol>
                </article>

            </div>
            <!--????????? ??? ????????????-->
            <div class="tips">
                <h4><b>????????? ??? ????????????</b></h4>
                    <div class="textBox">
                        <p><form action="silk_process_update.php" method = "post" class="submit"></p>
                        <input type="hidden" name="id"value ="<?=$_GET['id']?>">
                        <p><textarea name="Notice" placeholder = "????????? ????????? ??????????????? !"><?=$article['Notice']?></textarea></p>
                        <p><input type = "submit"></p>
                </form>   
            </div>           
            </div>
            <!--????????????-->
            <div class="washMeth">
                <h2><b>????????????</b></h2>
                <div class="infotext">
                     <?=$WashWay?> 
                </div>
            </div>
            <!--?????? ??????-->
            <div class="detInfo">
                <h2><b>????????????</b></h2>
                <div class="infotext">
                <?=$CleanserInfo?>
                </div>
            </div>
        </div>
        <footer>
            <div class="container-fluid">
                <div class="col-md-12">
                    <p style="color:black; background-color:#eff1e7; font-size: 15px;padding-bottom: 20px; text-align: center;">Copyright &copy; 2021 | GNU CS BBOSONG </p>
                </div>
            </div>
        </footer>
    </body>
</html>