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
        <div class="col-md-6 column">
            <br>
            <br>
            <br>
            <br>
            <?php
                include("mysql_connect.php");
                $id = $_POST['id'];
                $pw = $_POST['pw'];
                $select = $_POST['select'];
                if($select == 1){
                    $sql = "SELECT * FROM account_man where username = '$id'";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_row($result);
                    if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw){
                        //將帳號寫入session，方便驗證使用者身份
                        $_SESSION['username1'] = $id;
                        echo '<h3>登入成功!</h3><br><br>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';   
                    }
                    else
                    {
                        echo '<h3>登入失敗!</h3><br><br>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';   
                    } 
                }elseif($select == 2){
                    $sql = "SELECT * FROM account where username = '$id'";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_row($result);
                    if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw){
                        //將帳號寫入session，方便驗證使用者身份
                        $_SESSION['username2'] = $id;
                        echo '<h3>登入成功!</h3><br><br>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';   
                    }
                    else
                    {
                        echo '<h3>登入失敗!</h3><br><br>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';   
                    } 
                }else{
                    echo "<h3>你沒有選你要哪種帳號!!!</h3><br><br>";
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>'; 
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
