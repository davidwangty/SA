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

            $id = @$_POST['id'];
            $pw = @$_POST['pw'];  
            $pw2 = @$_POST['pw2'];
            $nickname = @$_POST['nickname'];
            $email = @$_POST['email'];
            $select = @$_POST['select'];

            if($id != null && $pw != null && $pw == $pw2)
            {
                if($select == 1){
                    //新增主辦者帳號
                    $sql = "insert into account_man (username, password, nickname, email) values ('$id', '$pw', '$nickname', 'email')";
                    if(mysql_query($sql))
                    {
                        echo '<h3>帳號創建成功!!...等待跳轉</h3>';
                        $_SESSION['username1'] = $id;
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';   
                    }
                    else
                    {
                        echo '<h3>帳號創建失敗!...等待跳轉</h3><br>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
                    }
                }elseif($select == 2){
                    //新增參加者帳號
                    $sql = "insert into account (username, password, nickname, email) values ('$id', '$pw', '$nickname', 'email')";
                    if(mysql_query($sql))
                    {
                        echo '<h3>帳號創建成功!!...等待跳轉</h3>';
                        $_SESSION['username2'] = $id;
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';   
                    }
                    else
                    {
                        echo '<h3>帳號創建失敗!...等待跳轉</h3>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
                    }
                }
                
            }
            elseif($pw != $pw2){
                echo '<h3>密碼不一致...等待跳轉<h3>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
            }
            else
            {
                echo '<h3>帳號密碼不可為空...等待跳轉<h3>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
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
