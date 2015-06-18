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


    <!-- Insert into database -->
    <div class="container">
        <div class="col-md-12 column">
            <?php
            include("mysql_connect.php");

            $name1 = @$_SESSION['username1'];
            $name2 = @$_POST['name2'];
            $date = @$_POST['date'];
            $time = @$_POST['time'];
            $site = @$_POST['site'];
            $info = @$_POST['info'];
            $fileContents = "";
            $filetype = "";
            if (@$_FILES['image']['size'] > 0){
                $filename = @$_FILES['image']['name'];
                $tmpname = @$_FILES['image']['tmp_name'];
                $filetype = @$_FILES['image']['type'];
                $filesize = @$_FILES['image']['size'];
                move_uploaded_file($_FILES["image"]["tmp_name"],"img/upload/".$_FILES["image"]["name"]);
            }
            
                    
            

            if($name1 != null && $name2 != null && $date != null)
            {
                    //新增資料進資料庫語法
                    $str="SELECT 活動ID FROM 活動";
                    $list = mysql_query($str);
                    $n = mysql_num_rows($list);
                    $n = $n + 1;
                    $sql = "insert into 活動 (活動ID, 使用者名稱, 活動名稱, 活動日期, 活動時間, 活動地點, 活動資訊, 圖片名稱) values ('$n', '$name1', '$name2', '$date', '$time', '$site', '$info', '".$filename. "')";
                    if(mysql_query($sql))
                    {
                            echo '<h3>活動創辦成功!!</h3>';
                    }
                    else
                    {
                            echo '活動創辦失敗!<br>';
                    }
            }
            else
            {
                    echo '<h3>活動名稱和日期不可為空<h3>';
            }
            ?>

            <br>
            <a href="index.php" class="btn" type="button">回首頁</a>
            <a href="create.php" class="btn" type="button">再辦活動</a>
        </div>
    </div>


    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
