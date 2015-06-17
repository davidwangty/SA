<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Management</title>

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
    <style type='text/css'>
    #sidebar2 {width:40%;
               float:left;
              }
    #content2 {width:60%;
               float:left;
              }
    #content3 {width:90%;
               float:right;
              }

    </style>

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <?php
        include 'header.php';
    ?>

    <div class="container-fluid">
        <div id="sidebar2">
            <br><br><br><br><br><br><br><p align="center"><img src="img/1.jpg" width="300"></p><br><br>
        </div>
        <div id="content2">
            <?php
                include("mysql_connect.php");
                $id = @$_GET['id'];
                $str="SELECT * FROM 活動 WHERE 活動ID = $id";
                $str2 = "SELECT 瀏覽數 FROM 活動 WHERE 活動ID = $id";
                $list = mysql_query($str);
                $va = mysql_fetch_row($list);
                $list2 = mysql_query($str2);
                $va2 = mysql_fetch_row($list2);
                $va2[0] = $va2[0] + 1;
                $str2 = "UPDATE 活動 SET 瀏覽數= $va2[0] WHERE 活動ID = $id";
                $list = mysql_query($str2);
                echo '<article class="container" id="info"><br><br><br><br><br><br><br><h1>'.$va[2].'</h1></article>';
                echo '<p>'.$va[1].'</p><br><br>';
                echo '<p>日期：06/22</p>';
                echo '<p>時間：12:30-13:10</p>';
                echo '<p>地點：臺大二活蘇格拉底廳</p>';
                echo '<p>'.va[5].'</p>';
            ?>
        </div>
    </div>

    <div class="container-fluid" style="background:#ecf0f1">
        <div id="content3">
            <h1>活動資訊</h1>
            <?php
                echo '<p>'.$va[4].'</p>';
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div id="content3">
            <article class="container" id="QA">
                <h1>Q&A</h1>
                <p>...</p>
            </article>
        </div>
    </div>

    

    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
