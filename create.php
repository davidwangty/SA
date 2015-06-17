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

</head>

<body id="page-top" class="index">

    <!-- Navigation -->

    <?php
        include 'header.php';
    ?>

    <?php 
        if(@$_SESSION['username1'] != null){
            echo '<div class="container">
                <div class="col-md-6 column">
                    <form role="form" method="POST" action="commitact.php" Enctype="multipart/form-data">
                        <h3>
                        辦活動
                        </h3>
                        <div class="form-group">
                            <label for="exampleInputlength">活動名稱</label><input type="text" class="form-control" name="name2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputpublish">活動日期</label><input type="date" class="form-control" name="date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動時間</label><input type="time" class="form-control" name="time">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動地點</label><input type="text" class="form-control" name="site">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動資訊</label><textarea nrow="5" class="form-control" name="info"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動圖片</label><input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-default">送出</button>
                    </form>
                </div>
            </div>';
        }else{
            echo '<div class="container">
                    <div class="col-md-6 column">
                        <h3>
                        請先登入
                        </h3>
                    </div>
                  </div>';
            $_SESSION['back'] = "create.php";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';   
        }
    ?>

    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>

</body>

</html>
