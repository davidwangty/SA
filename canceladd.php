<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

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
                if(@$_SESSION['username2'] != null){
                    $sql = 'DELETE FROM 參加 WHERE username = '.@$_SESSION['username2'].' AND 活動ID = '.@$_GET['id'];  
                    if(mysql_query($sql)){
                        echo '<h3>取消參加!!</h3>';
                    }
                    else
                    {
                        echo '<h3>取消失敗...</h3><br>';
                    }
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=show.php?id='.@$_GET['id'].'>'; 
                }else{
                    echo '<h3>請先登入</h3>';
                    $_SESSION['back'] = 'show.php?id='.@$_GET['id'];
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';   
                }
            ?>
        </div>
    </div>


    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
