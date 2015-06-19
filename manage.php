<?php session_start(); ?>
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


    <?php
    include("mysql_connect.php");
    $search = @$_POST['search'];

    $sql = 'SELECT * FROM 活動 AS A, 參加 AS B WHERE  A.活動ID = B.活動ID AND username = "'.@$_SESSION['username2'].'"';
    $list = mysql_query($sql);
    echo '  <div class="container-fluid">';
    echo '      <div class="row">';
    echo '          <div class="col-lg-12 text-center">';
    echo '              <h2>您參加的活動</h2>';
    echo '              <hr class="star-primary">';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="row">';
    $nums=mysql_num_rows($list);
    if($nums > 0){
        while($va = mysql_fetch_row($list))
        {
            if($va[4] == ""){
                $va[4] = "未命名.png";
            }
            echo '<div class="col-sm-6 col-md-4">';
            echo '    <div class="thumbnail">';
            echo '        <img src="img/upload/'.$va[7].'" alt="" height="300">';
            echo '        <div class="caption" style="background:#eeeeee">';
            echo '            <a href="show.php?id='.$va[0].'""><h3>'.$va[2].'</h3></a>';
            echo '            <p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> '.$va[5].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 瀏覽人次: '.$va[8].'</p>';
            $sql2 = "SELECT COUNT(*) FROM 追蹤 WHERE 活動ID = $va[0]";
            $list2 = mysql_query($sql2);
            $va2 = mysql_fetch_row($list2);
            $nums2 = mysql_num_rows($list2);
            if($nums2 == 0){
                $va2[0] = 0;
            }
            echo '<p> <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> 追蹤人次: '.$va2[0].'</p>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    }else{
        echo "<div class = text-center><h3>你沒有參加過活動...</h3></div>";
    }
    echo '      </div>';
    echo '  </div>';
    echo '  <div class="container-fluid">';
    echo '      <div class="row">';
    echo '          <div class="col-lg-12 text-center">';
    echo '              <h2>您追蹤的活動</h2>';
    echo '              <hr class="star-primary">';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="row">';
    $sql = 'SELECT * FROM 活動 AS A, 追蹤 AS B WHERE  A.活動ID = B.活動ID AND username = "'.@$_SESSION['username2'].'"';
    $list = mysql_query($sql);
    $nums=mysql_num_rows($list);
    if($nums > 0){
        while($va = mysql_fetch_row($list))
        {
            if($va[4] == ""){
                $va[4] = "未命名.png";
            }
            echo '<div class="col-sm-6 col-md-4">';
            echo '    <div class="thumbnail">';
            echo '        <img src="img/upload/'.$va[7].'" alt="" height="300">';
            echo '        <div class="caption" style="background:#eeeeee">';
            echo '            <a href="show.php?id='.$va[0].'""><h3>'.$va[2].'</h3></a>';
            echo '            <p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> '.$va[5].'</p>';
            echo '            <p> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 瀏覽人次: '.$va[8].'</p>';
            $sql2 = "SELECT COUNT(*) FROM 追蹤 WHERE 活動ID = $va[0]";
            $list2 = mysql_query($sql2);
            $va2 = mysql_fetch_row($list2);
            $nums2 = mysql_num_rows($list2);
            if($nums2 == 0){
                $va2[0] = 0;
            }
            echo '<p> <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> 追蹤人次: '.$va2[0].'</p>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    }else{
        echo "<div class = text-center><h3>你沒有追蹤活動...</h3></div>";
    }
    echo '      </div>';
    echo '  </div>';
    ?>

    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
