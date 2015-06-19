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

    <div class="container">
        <div class="col-md-6 column">
            <?php
            include("mysql_connect.php");
            $search = @$_POST['search'];

            $sql = "SELECT * FROM 活動 WHERE (活動ID = '%$search%' OR 使用者名稱 LIKE '%$search%' OR 活動名稱 LIKE '%$search%') ORDER BY 活動日期";
            $list = mysql_query($sql);
            echo '<section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>搜尋結果</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">';
            $nums=mysql_num_rows($list);
            if($nums > 0){
                while($va = mysql_fetch_row($list))
                {
                    if($va[7] == ""){
                        $va[7] = "未命名.png";
                    }
                    echo '<div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="img/upload/'.$va[7].'" alt="" width="300">
                            <div class="caption" style="background:#eeeeee">';
                    echo '<a href="show.php?id='.$va[0].'""><h3>'.$va[2].'</h3></a>';
                    echo '<p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
                    echo '<p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
                    echo '<p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> '.$va[5].'</p>';
                    echo '<p> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 瀏覽人次: '.$va[8].'</p>';
                    $sql2 = "SELECT COUNT(*) FROM 追蹤 WHERE 活動ID = $va[0]";
                    $list2 = mysql_query($sql2);
                    $va2 = mysql_fetch_row($list2);
                    $nums2 = mysql_num_rows($list2);
                    if($nums2 == 0){
                        $va2[0] = 0;
                    }
                    echo '<p> <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> 追蹤人次: '.$va2[0].'</p>';
                    echo '</div>
                        </div>
                    </div>';
                }
            }else{
                echo "<div class = text-center><h3>SOR..沒有符合的活動...</h3></div>";

            }
            echo '</div>
        </div>
    </section>';
            ?>


        </div>
    </div>

    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
    
</body>

</html>
