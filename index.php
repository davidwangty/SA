<?php 
    session_start(); 
?>
<!DOCTYPE html>

<html lang="en">

<?php
    include 'headlink.php';
?>

<body id="page-top" class="index">

    <!-- Navigation -->
    <?php
        include 'header.php';
    ?>

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
    <hr class="featurette-divider">
    <!-- Portfolio Grid Section -->

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

                $sql = "SELECT * FROM 活動 WHERE 活動ID <> 0 ORDER BY 瀏覽數 DESC";
                $list = mysql_query($sql);
                $nums=mysql_num_rows($list);
                if($nums > 3){
                    $nums = 3;
                }
                $count = 0;
                for($i=0; $i < $nums; $i++){
                    $va = mysql_fetch_row($list);
                    if($va[7] == ""){
                    $va[7] = "未命名.png";
                }
                echo '<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="img/upload/'.$va[7].'" alt="" width="300">
                        <div class="caption" style="background:#eeeeee">';
                echo '<a href="show.php?id='.$va[0].'""><h3>';
                echo htmlspecialchars($va[2], ENT_QUOTES, 'UTF-8');
                echo '</h3></a>';
                echo '<p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
                echo '<p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
                echo '<p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ';
                echo htmlspecialchars($va[5], ENT_QUOTES, 'UTF-8');
                echo '</p>';
                echo '<p> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 瀏覽人次: '.$va[8].'</p>';
                $sql2 = "SELECT COUNT(*) FROM 追蹤 WHERE 活動ID = $va[0]";
                $list2 = mysql_query($sql2);
                $va2 = mysql_fetch_row($list2);
                echo '<p> <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> 追蹤人次: '.$va2[0].'</p>';
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
    <hr class="featurette-divider">
    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>


</body>

</html>
