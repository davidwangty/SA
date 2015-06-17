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
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="index.php">
                        <!-- <img alt="Brand" src="..."> -->
                        Group 6
                      </a>
                    </div>
                </div>
            </div>

            <form class="navbar-form navbar-left" role="search" method="POST" action="search.php">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="找活動囉~" name = "search">
                </div>
                <button type="submit" class="btn btn-default">搜尋</button>
            </form>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if(@$_SESSION['username1'] != null){
                            echo '<li>
                                     <a href="create.php">辦活動</a>
                                  </li>';
                            echo '<li><a href = "manage.php">'.@$_SESSION['username1'].'</a><li><a href = "logout.php">登出</a>';
                        }elseif(@$_SESSION['username2'] != null){
                            echo '<li><a href = "manage.php">'.@$_SESSION['username2'].'</a><li><a href = "logout.php">登出</a>';
                        }
                        else{
                            echo '<li><a href="register.php">註冊</a></li><li><a href="login.php">登入</a></li>';
                        }
                    ?>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
        <div class="container-fluid" style="background:#eeeeee">
        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#info" style="color:darkblue">活動資訊</a></li>
                    <li><a href="#QA" style="color:darkblue">Q&A </a></li>
                </ul>
                <?php
                    if(@$_SESSION['username2'] != null){
                        echo '<ul class="nav navbar-nav navbar-right">';
                        $id = @$_GET['id'];
                        echo '<li><a href = "add.php?id='.$id.'" style="color:darkblue">追蹤</a></li>';
                        echo '<li><a href = "add.php?id='.$id.'" style="color:darkblue">參加</a></li></ul>';
                    }
                ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        <!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
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
                if($va[5] == ""){
                    $va[5] = "未命名.png";
                }
                echo '<div id="sidebar2">
                          <br><br><br><br><br><br><br><p align="center"><img src="img/upload/'.$va[5].'" width="300"></p><br><br>
                      </div>';
                echo '<div id="content2">';
                echo '<article class="container" id="info"><br><br><br><br><br><br><br><h1>'.$va[2].'</h1></article>';
                echo '<p>'.$va[1].'</p><br><br>';
                echo '<p>日期：06/22</p>';
                echo '<p>時間：12:30-13:10</p>';
                echo '<p>地點：臺大二活蘇格拉底廳</p>';
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
