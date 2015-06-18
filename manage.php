<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <?php
        include 'header.php';
    ?>


    <?php
    include("mysql_connect.php");
    $search = @$_POST['search'];

    $sql = 'SELECT * FROM 活動 AS A, 參加 AS B WHERE  A.活動ID = B.活動ID AND username = "'.@$_SESSION['username2'].'"';
    $list = mysql_query($sql);
    echo '  <div class="container-fluid">';
    echo '      <div class="row">';
    echo '          <div class="col-lg-12 text-center">';
    echo '              <h2>您參加的活動</h2>';
    echo '              <hr class="star-primary">';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="row">';
    $nums=mysql_num_rows($list);
    if($nums > 0){
        while($va = mysql_fetch_row($list))
        {
            if($va[4] == ""){
                $va[4] = "未命名.png";
            }
            echo '<div class="col-sm-6 col-md-4">';
            echo '    <div class="thumbnail">';
            echo '        <img src="img/upload/'.$va[7].'" alt="" height="300">';
            echo '        <div class="caption" style="background:#eeeeee">';
            echo '            <a href="show.php?id='.$va[0].'""><h3>'.$va[2].'</h3></a>';
            echo '            <p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> '.$va[5].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 瀏覽人次: '.$va[8].'</p>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    }else{
        echo "<div class = text-center><h3>你沒有參加過活動...</h3></div>";
    }
    echo '      </div>';
    echo '  </div>';
    echo '  <div class="container-fluid">';
    echo '      <div class="row">';
    echo '          <div class="col-lg-12 text-center">';
    echo '              <h2>您追蹤的活動</h2>';
    echo '              <hr class="star-primary">';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="row">';
    $sql = 'SELECT * FROM 活動 AS A, 追蹤 AS B WHERE  A.活動ID = B.活動ID AND username = "'.@$_SESSION['username2'].'"';
    $list = mysql_query($sql);
    $nums=mysql_num_rows($list);
    if($nums > 0){
        while($va = mysql_fetch_row($list))
        {
            if($va[4] == ""){
                $va[4] = "未命名.png";
            }
            echo '<div class="col-sm-6 col-md-4">';
            echo '    <div class="thumbnail">';
            echo '        <img src="img/upload/'.$va[7].'" alt="" height="300">';
            echo '        <div class="caption" style="background:#eeeeee">';
            echo '            <a href="show.php?id='.$va[0].'""><h3>'.$va[2].'</h3></a>';
            echo '            <p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> '.$va[5].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 瀏覽人次: '.$va[8].'</p>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    }else{
        echo "<div class = text-center><h3>你沒有追蹤活動...</h3></div>";
    }
    echo '      </div>';
    echo '  </div>';
    ?>

    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
