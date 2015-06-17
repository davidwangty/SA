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
    <br>
    <br>
    <br>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
            <p align="middle">
                <img alt="Scenary" src="img/1.jpg" width="500">
            </p>
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="style1">
                        <span lang="zh-tw">
                            <strong>
                                <span>天天握手會</span>
                            </strong>
                        </span>
                    </h1>
                    <p><span lang="zh-tw"><span class="style2">即日起開放報名！</span></span></p>
                </div>
            </div>
        </div>
        <div class="item">
          <p align="middle">
                <img alt="Scenary" src="img/1.jpg" width="500">
          </p>
          <div class="container">
            <div class="carousel-caption">
              <h1 class="style1">cute!cute!cute!</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <p align="middle">
                <img alt="Scenary" src="img/3.jpg" width="500">
          </p>
          <div class="container">
            <div class="carousel-caption">
              <h1><span class="style2">cute!cute!</span></h1>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <!-- /.carousel -->

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>熱門活動</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php
                    include("mysql_connect.php");
                    $search = @$_POST['search'];

                    $sql = "SELECT * FROM 活動  ORDER BY 瀏覽數 DESC";
                    $list = mysql_query($sql);
                    $count = 0;
                    for($i=0; $i < 3; $i++){
                        $va = mysql_fetch_row($list);
                        if($va[5] == ""){
                            $va[5] = "未命名.png";
                        }
                        echo '<div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="img/upload/'.$va[5].'" alt="" height="300">
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
                ?>
            </div>
        </div>
        <div class = container>
            <a href = "search.php?"><h4>看更多活動</h4></a>
        </div>
    </section>
    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>


</body>

</html>
