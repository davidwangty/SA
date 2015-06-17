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

    <div class="container">
        <div class="col-md-6 column">
            <?php
            include("mysql_connect.php");
            $search = @$_POST['search'];

            $sql = "SELECT 活動ID, 使用者名稱, 活動名稱, 活動日期, 圖片, 圖片格式, 瀏覽數 FROM 活動 WHERE (活動ID = '%$search%' OR 使用者名稱 LIKE '%$search%' OR 活動名稱 LIKE '%$search%') ORDER BY 活動日期";
            $list = mysql_query($sql);
            echo '<section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>搜尋結果</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">';
            while($va = mysql_fetch_row($list))
            {
                echo '<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="img/1.jpg" alt="">
                        <div class="caption" style="background:#eeeeee">';
                echo '<a href="show.php?id='.$va[0].'""><h3>'.$va[2].'</h3></a>';
                echo '<p>'.$va[3].'</p>';
                echo '<p>12:30p.m.</p>';
                echo '<p>臺大二活蘇格拉底廳</p>';
                echo '<p>瀏覽人次: '.$va[6].'</p>';
                echo '</div>
                    </div>
                </div>';
            }
            echo '</div>
        </div>
    </section>';
            ?>


        </div>
    </div>

    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
    
</body>

</html>
